using System;
using System.Collections;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Xml;

namespace Nuty
{
    public partial class Nuty : Form
    {
        private List<WysokoscNuty> _wysokosciNut = new List<WysokoscNuty>();
        private List<ZnakPieciolini> _song = new List<ZnakPieciolini>();
        private ZnakPieciolini _znak = new ZnakPieciolini();
        private Hashtable _noteLengths = new Hashtable();
        private EditType _edit = EditType.stos;
        private string pauses = "7890";
        private bool _editing = false;
        private int _editIndex = 0;

        public Nuty()
        {
            InitializeComponent();

            _wysokosciNut.Add(new WysokoscNuty()
            {
                index = 0,
                code = NoteCode.C4,
                frequency = 261,
                letters = "rl%{"
            });
            _wysokosciNut.Add(new WysokoscNuty()
            {
                index = 1,
                code = NoteCode.D5,
                frequency = 293,
                letters = "t;^}"
            });
            _wysokosciNut.Add(new WysokoscNuty()
            {
                index = 2,
                code = NoteCode.E5,
                frequency = 329,
                letters = "y'&|"
            });
            _wysokosciNut.Add(new WysokoscNuty()
            {
                index = 3,
                code = NoteCode.F5,
                frequency = 349,
                letters = "uz*A"
            });
            _wysokosciNut.Add(new WysokoscNuty()
            {
                index = 4,
                code = NoteCode.G5,
                frequency = 391,
                letters = "ix(S"
            });
            _wysokosciNut.Add(new WysokoscNuty()
            {
                index = 5,
                code = NoteCode.A5,
                frequency = 440,
                letters = "oc)D"
            });
            _wysokosciNut.Add(new WysokoscNuty()
            {
                index = 6,
                code = NoteCode.B5,
                frequency = 493,
                letters = "pv_F"
            });
            _wysokosciNut.Add(new WysokoscNuty()
            {
                index = 7,
                code = NoteCode.C5,
                frequency = 523,
                letters = "[b+G"
            });

            _noteLengths.Add(NoteLength.eight, 200);
            _noteLengths.Add(NoteLength.quarter, 400);
            _noteLengths.Add(NoteLength.half, 800);
            _noteLengths.Add(NoteLength.full, 1600);


            _znak.noteLength = NoteLength.quarter;
            _znak.noteType = NoteType.note;
            _znak.nutka = NoteCode.C4;

            noteType.SelectedIndex = 0;
        }

        private void noteUp_Click(object sender, EventArgs e)
        {
            int id = _wysokosciNut.Find(delegate (WysokoscNuty n) { return n.code == _znak.nutka; }).index + 1;
            if (id > 6)
            {
                noteUp.Enabled = false;
            }
            else
            {
                noteDown.Enabled = true;
            };

            _znak.nutka = _wysokosciNut.Find(delegate (WysokoscNuty n) { return n.index == id; }).code;


            int l = 0;
            switch (_znak.noteLength)
            {
                case NoteLength.eight: l = 3; break;
                case NoteLength.quarter: l = 2; break;
                case NoteLength.half: l = 1; break;
                case NoteLength.full: l = 0; break;
            }
            noteBox.Text = _wysokosciNut.Find(delegate (WysokoscNuty n) { return n.code == _znak.nutka; }).letters.Substring(l, 1);
        }
        private void noteDown_Click(object sender, EventArgs e)
        {
            int id = _wysokosciNut.Find(delegate (WysokoscNuty n) { return n.code == _znak.nutka; }).index - 1;
            _znak.nutka = _wysokosciNut.Find(delegate (WysokoscNuty n) { return n.index == id; }).code;

            if (id < 1)
            {
                noteDown.Enabled = false;
            }
            else
            {
                noteUp.Enabled = true;
            };

            int l = 0;
            switch (_znak.noteLength)
            {
                case NoteLength.eight: l = 3; break;
                case NoteLength.quarter: l = 2; break;
                case NoteLength.half: l = 1; break;
                case NoteLength.full: l = 0; break;
            }
            noteBox.Text = _wysokosciNut.Find(delegate (WysokoscNuty n) { return n.code == _znak.nutka; }).letters.Substring(l, 1);
        }

        private void openButton_Click(object sender, EventArgs e)
        {
            OpenFileDialog openFile = new OpenFileDialog
            {
                Title = "Wybierz plik",
                CheckFileExists = true,
                CheckPathExists = true,
                DefaultExt = "xml",
                Filter = "Xml files (*.xml)|*.xml",
            };

            if (openFile.ShowDialog() != DialogResult.OK) return;
            string path = openFile.FileName;
            StreamReader reader = new StreamReader(path);
            string content = reader.ReadToEnd();
            reader.Close();

            try
            {
                XmlDocument xmlDoc = new XmlDocument();
                xmlDoc.LoadXml(content);
                XmlNodeList nutyXml = xmlDoc.ChildNodes[1].ChildNodes;

                _song.Clear();
                songBox.Clear();

                for (int i = 0; i < nutyXml.Count; i++)
                {
                    XmlNode nutaXml = nutyXml[i];
                    ZnakPieciolini nuta = new ZnakPieciolini();
                    string znaczek = null;
                    int l = 0;
                    switch (nutaXml.ChildNodes[1].InnerText)
                    {
                        case "nuta": nuta.noteLength = NoteLength.full; l = 0; break;
                        case "polnuta": nuta.noteLength = NoteLength.half; l = 1; break;
                        case "cwiercnuta": nuta.noteLength = NoteLength.quarter; l = 2; break;
                        case "osemka": nuta.noteLength = NoteLength.eight; l = 3; break;
                    }
                    switch (nutaXml.ChildNodes[0].InnerText)
                    {
                        case "nuta":
                            nuta.noteType = NoteType.note;
                            switch (nutaXml.ChildNodes[2].InnerText)
                            {
                                case "C4": nuta.nutka = NoteCode.C4; break;
                                case "D5": nuta.nutka = NoteCode.D5; break;
                                case "E5": nuta.nutka = NoteCode.E5; break;
                                case "F5": nuta.nutka = NoteCode.F5; break;
                                case "G5": nuta.nutka = NoteCode.G5; break;
                                case "A5": nuta.nutka = NoteCode.A5; break;
                                case "B5": nuta.nutka = NoteCode.B5; break;
                                case "C5": nuta.nutka = NoteCode.C5; break;
                            }
                            znaczek = _wysokosciNut.Find(delegate (WysokoscNuty n) { return n.code == nuta.nutka; }).letters.Substring(l, 1);
                            break;
                        case "pauza":
                            nuta.noteType = NoteType.pause;
                            znaczek = pauses.Substring(l, 1);
                            break;
                    }
                    _song.Add(nuta);
                    songBox.Text += znaczek;
                }
            }
            catch {
                MessageBox.Show("Niepoprawny zapis XML");
            };
        }

        private void saveButton_Click(object sender, EventArgs e)
        {
            SaveFileDialog saveFile = new SaveFileDialog
            {
                Title = "Wybierz plik",
                CheckPathExists = true,
                DefaultExt = "xml",
                Filter = "Xml files (*.xml)|*.xml",
            };

            if (saveFile.ShowDialog() != DialogResult.OK) return;
            string path = saveFile.FileName;

            XmlWriterSettings settings = new XmlWriterSettings()
            {
                Indent = true,
            };
            XmlWriter xmlWriter = XmlWriter.Create(path, settings);

            xmlWriter.WriteStartDocument();
            xmlWriter.WriteStartElement("utwor");
            for (int i = 0; i < _song.Count; i++)
            {
                ZnakPieciolini nuta = _song[i];

                xmlWriter.WriteStartElement("znakPiecolinii");
                xmlWriter.WriteStartElement("typZnaku");
                switch (nuta.noteType)
                {
                    case NoteType.note: xmlWriter.WriteString("nuta"); break;
                    case NoteType.pause: xmlWriter.WriteString("pauza"); break;
                }
                xmlWriter.WriteEndElement();
                xmlWriter.WriteStartElement("dlugosc");
                switch (nuta.noteLength)
                {
                    case NoteLength.eight: xmlWriter.WriteString("osemka"); break;
                    case NoteLength.quarter: xmlWriter.WriteString("cwiercnuta"); break;
                    case NoteLength.half: xmlWriter.WriteString("polnuta"); break;
                    case NoteLength.full: xmlWriter.WriteString("nuta"); break;
                }
                xmlWriter.WriteEndElement();
                if (nuta.noteType == NoteType.note)
                {
                    xmlWriter.WriteStartElement("wysokosc");
                    xmlWriter.WriteString(nuta.nutka.ToString());
                    xmlWriter.WriteEndElement();
                }
                xmlWriter.WriteEndElement();
            }
            xmlWriter.WriteEndElement();
            xmlWriter.WriteEndDocument();
            xmlWriter.Close();
        }

        private void editButton_Click(object sender, EventArgs e)
        {
            _editing = !_editing;
            noteBox.Enabled = _editing;
            noteType.Enabled = _editing;
            leftButton.Enabled = _editing;
            rightButton.Enabled = _editing;
            removeButton.Enabled = _editing;
            stosButton.Enabled = _editing;
            kolejkaButton.Enabled = _editing;
            listaButton.Enabled = _editing;
            addButton.Enabled = _editing;
            moveLeft.Enabled = _editing;
            moveRight.Enabled = _editing;


            if (noteType.SelectedIndex == 0)
            {
                noteUp.Enabled = _editing;
                noteDown.Enabled = _editing;
            }
            int id = _wysokosciNut.Find(delegate (WysokoscNuty n) { return n.code == _znak.nutka; }).index;

            if (id < 1) noteDown.Enabled = false;
            if (id > 6) noteUp.Enabled = false;

            switch (_znak.noteLength)
            {
                case NoteLength.full:
                    rightButton.Enabled = false;
                    leftButton.Enabled = _editing;
                    break;
                case NoteLength.eight:
                    leftButton.Enabled = false;
                    rightButton.Enabled = _editing;
                    break;

            }

            if (_editing == false)
            {
                noteBox.Text = "";
            }
            else
            {
                int l = 0;
                switch (_znak.noteLength)
                {
                    case NoteLength.eight: l = 3; break;
                    case NoteLength.quarter: l = 2; break;
                    case NoteLength.half: l = 1; break;
                    case NoteLength.full: l = 0; break;
                }
                noteBox.Text = _wysokosciNut.Find(delegate (WysokoscNuty n) { return n.code == _znak.nutka; }).letters.Substring(l, 1);
            }
        }

        private void playButton_Click(object sender, EventArgs e)
        {
            _editing = false;
            noteBox.Enabled = _editing;
            noteType.Enabled = _editing;
            leftButton.Enabled = _editing;
            rightButton.Enabled = _editing;
            moveLeft.Enabled = _editing;
            moveRight.Enabled = _editing;
            removeButton.Enabled = _editing;
            stosButton.Enabled = _editing;
            kolejkaButton.Enabled = _editing;
            listaButton.Enabled = _editing;
            addButton.Enabled = _editing;
            noteDown.Enabled = _editing;
            noteUp.Enabled = _editing;
            leftButton.Enabled = _editing;
            rightButton.Enabled = _editing;

            for (int i = 0; i < _song.Count; i++)
            {
                ZnakPieciolini nuta = _song[i];
                if (nuta.noteType == NoteType.note)
                {
                    int frequency = _wysokosciNut.Find(delegate (WysokoscNuty n) { return n.code == nuta.nutka; }).frequency;
                    int length = (int)_noteLengths[nuta.noteLength];
                    Console.Beep(frequency, length);
                }
            }
        }


        private void leftButton_Click(object sender, EventArgs e)
        {
            switch (_znak.noteLength)
            {
                case NoteLength.full:
                    {
                        _znak.noteLength = NoteLength.half;
                        rightButton.Enabled = true;
                        break;
                    }
                case NoteLength.half:
                    {
                        _znak.noteLength = NoteLength.quarter;
                        break;
                    }
                case NoteLength.quarter:
                    {
                        _znak.noteLength = NoteLength.eight;
                        leftButton.Enabled = false;
                        break;
                    }
            }

            int l = 0;
            switch (_znak.noteLength)
            {
                case NoteLength.eight: l = 3; break;
                case NoteLength.quarter: l = 2; break;
                case NoteLength.half: l = 1; break;
                case NoteLength.full: l = 0; break;
            }

            if (noteType.SelectedIndex == 0)
            {
                noteBox.Text = _wysokosciNut.Find(delegate (WysokoscNuty n) { return n.code == _znak.nutka; }).letters.Substring(l, 1);
            }
            else
            {
                noteBox.Text = pauses.Substring(l, 1);
            };
        }

        private void rightButton_Click(object sender, EventArgs e)
        {
            switch (_znak.noteLength)
            {
                case NoteLength.eight:
                    {
                        _znak.noteLength = NoteLength.quarter;
                        leftButton.Enabled = true;
                        break;
                    }
                case NoteLength.quarter:
                    {
                        _znak.noteLength = NoteLength.half;
                        break;
                    }
                case NoteLength.half:
                    {
                        _znak.noteLength = NoteLength.full;
                        rightButton.Enabled = false;
                        break;
                    }
            }

            int l = 0;
            switch (_znak.noteLength)
            {
                case NoteLength.eight: l = 3; break;
                case NoteLength.quarter: l = 2; break;
                case NoteLength.half: l = 1; break;
                case NoteLength.full: l = 0; break;
            }

            if (noteType.SelectedIndex == 0)
            {
                noteBox.Text = _wysokosciNut.Find(delegate (WysokoscNuty n) { return n.code == _znak.nutka; }).letters.Substring(l, 1);
            }
            else
            {
                noteBox.Text = pauses.Substring(l, 1);
            };
        }

        private void addButton_Click(object sender, EventArgs e)
        {
            string znaczek = null;
            int l = 0;
            switch (_znak.noteLength)
            {
                case NoteLength.eight: l = 3; break;
                case NoteLength.quarter: l = 2; break;
                case NoteLength.half: l = 1; break;
                case NoteLength.full: l = 0; break;
            }

            if (_znak.noteType == NoteType.note)
            {
                znaczek = _wysokosciNut.Find(delegate (WysokoscNuty n) { return n.code == _znak.nutka; }).letters.Substring(l, 1);
            }
            else
            {
                znaczek = pauses.Substring(l, 1);
            }

            switch (_edit)
            {
                case EditType.stos:
                case EditType.kolejka:
                    _song.Add(_znak);
                    songBox.Text += znaczek;
                    break;
                case EditType.lista:
                    _song.Insert(_editIndex, _znak);
                    songBox.Text = songBox.Text.Substring(0, _editIndex) + znaczek + songBox.Text.Substring(_editIndex);
                    songBox.Focus();
                    songBox.SelectionStart = _editIndex;
                    songBox.SelectionLength = 1;
                    break;
            }

            _znak = new ZnakPieciolini()
            {
                noteLength = _znak.noteLength,
                noteType = _znak.noteType,
                nutka = _znak.nutka
            };

        }

        private void moveLeft_Click(object sender, EventArgs e)
        {
            if (_editIndex > 0)
            {
                _editIndex--;
                songBox.Focus();
                songBox.SelectionStart = _editIndex;
                songBox.SelectionLength = 1;
            }
        }

        private void moveRight_Click(object sender, EventArgs e)
        {
            if (_editIndex < _song.Count) _editIndex++;
            songBox.Focus();
            songBox.SelectionStart = _editIndex;
            songBox.SelectionLength = 1;
        }

        private void removeButton_Click(object sender, EventArgs e)
        {
            if (!_song.Any()) return;
            switch (_edit)
            {
                case EditType.stos:
                    _song.RemoveAt(_song.Count - 1);
                    songBox.Text = songBox.Text.Substring(0, songBox.Text.Length - 1);
                    break;
                case EditType.kolejka:
                    _song.RemoveAt(0);
                    songBox.Text = songBox.Text.Substring(1);
                    break;
                case EditType.lista:
                    if (_editIndex >= _song.Count) return;
                    _song.RemoveAt(_editIndex);
                    songBox.Text = songBox.Text.Remove(_editIndex, 1);
                    songBox.Focus();
                    songBox.SelectionStart = _editIndex;
                    songBox.SelectionLength = 1;
                    break;
            }
        }

        private void noteType_SelectedIndexChanged(object sender, EventArgs e)
        {
            int l = 0;
            switch (_znak.noteLength)
            {
                case NoteLength.eight: l = 3; break;
                case NoteLength.quarter: l = 2; break;
                case NoteLength.half: l = 1; break;
                case NoteLength.full: l = 0; break;
            }

            if (noteType.SelectedIndex == 0)
            {
                _znak.noteType = NoteType.note;

                int id = _wysokosciNut.Find(delegate (WysokoscNuty n) { return n.code == _znak.nutka; }).index;

                if (id > 0 && _editing) noteDown.Enabled = true;
                if (id < 7 && _editing) noteUp.Enabled = true;

                noteBox.Text = _wysokosciNut.Find(delegate (WysokoscNuty n) { return n.code == _znak.nutka; }).letters.Substring(l, 1);
            }
            else if (noteType.SelectedIndex == 1)
            {
                _znak.noteType = NoteType.pause;
                noteUp.Enabled = false;
                noteDown.Enabled = false;

                noteBox.Text = pauses.Substring(l, 1);
            }

        }
        private void stosButton_CheckedChanged(object sender, EventArgs e)
        {
            _edit = EditType.stos;
            songBox.SelectionLength = 0;
        }

        private void kolejkaButton_CheckedChanged(object sender, EventArgs e)
        {
            _edit = EditType.kolejka;
            songBox.SelectionLength = 0;
        }

        private void listaButton_CheckedChanged(object sender, EventArgs e)
        {
            _edit = EditType.lista;
            songBox.Focus();
            songBox.SelectionStart = _editIndex;
            songBox.SelectionLength = 1;
        }

    }
};