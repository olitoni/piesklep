namespace Nuty
{
    partial class Nuty
    {
        /// <summary>
        /// Wymagana zmienna projektanta.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Wyczyść wszystkie używane zasoby.
        /// </summary>
        /// <param name="disposing">prawda, jeżeli zarządzane zasoby powinny zostać zlikwidowane; Fałsz w przeciwnym wypadku.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Kod generowany przez Projektanta formularzy systemu Windows

        /// <summary>
        /// Metoda wymagana do obsługi projektanta — nie należy modyfikować
        /// jej zawartości w edytorze kodu.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(Nuty));
            this.songBox = new System.Windows.Forms.TextBox();
            this.editButton = new System.Windows.Forms.Button();
            this.openButton = new System.Windows.Forms.Button();
            this.saveButton = new System.Windows.Forms.Button();
            this.playButton = new System.Windows.Forms.Button();
            this.noteBox = new System.Windows.Forms.TextBox();
            this.Dodawanie = new System.Windows.Forms.Label();
            this.noteType = new System.Windows.Forms.ComboBox();
            this.noteUp = new System.Windows.Forms.Button();
            this.noteDown = new System.Windows.Forms.Button();
            this.fileSystemWatcher1 = new System.IO.FileSystemWatcher();
            this.Edycja = new System.Windows.Forms.Label();
            this.leftButton = new System.Windows.Forms.Button();
            this.rightButton = new System.Windows.Forms.Button();
            this.addButton = new System.Windows.Forms.Button();
            this.stosButton = new System.Windows.Forms.RadioButton();
            this.kolejkaButton = new System.Windows.Forms.RadioButton();
            this.listaButton = new System.Windows.Forms.RadioButton();
            this.moveRight = new System.Windows.Forms.Button();
            this.moveLeft = new System.Windows.Forms.Button();
            this.removeButton = new System.Windows.Forms.Button();
            this.pictureBox1 = new System.Windows.Forms.PictureBox();
            ((System.ComponentModel.ISupportInitialize)(this.fileSystemWatcher1)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).BeginInit();
            this.SuspendLayout();
            // 
            // songBox
            // 
            this.songBox.Font = new System.Drawing.Font("Lassus", 72F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(238)));
            this.songBox.Location = new System.Drawing.Point(12, 41);
            this.songBox.Name = "songBox";
            this.songBox.ScrollBars = System.Windows.Forms.ScrollBars.Horizontal;
            this.songBox.Size = new System.Drawing.Size(683, 111);
            this.songBox.TabIndex = 0;
            // 
            // editButton
            // 
            this.editButton.Location = new System.Drawing.Point(175, 12);
            this.editButton.Name = "editButton";
            this.editButton.Size = new System.Drawing.Size(75, 23);
            this.editButton.TabIndex = 1;
            this.editButton.Text = "Edit";
            this.editButton.UseVisualStyleBackColor = true;
            this.editButton.Click += new System.EventHandler(this.editButton_Click);
            // 
            // openButton
            // 
            this.openButton.Location = new System.Drawing.Point(12, 12);
            this.openButton.Name = "openButton";
            this.openButton.Size = new System.Drawing.Size(75, 23);
            this.openButton.TabIndex = 2;
            this.openButton.Text = "Open";
            this.openButton.UseVisualStyleBackColor = true;
            this.openButton.Click += new System.EventHandler(this.openButton_Click);
            // 
            // saveButton
            // 
            this.saveButton.Location = new System.Drawing.Point(94, 12);
            this.saveButton.Name = "saveButton";
            this.saveButton.Size = new System.Drawing.Size(75, 23);
            this.saveButton.TabIndex = 3;
            this.saveButton.Text = "Save";
            this.saveButton.UseVisualStyleBackColor = true;
            this.saveButton.Click += new System.EventHandler(this.saveButton_Click);
            // 
            // playButton
            // 
            this.playButton.Location = new System.Drawing.Point(257, 12);
            this.playButton.Name = "playButton";
            this.playButton.Size = new System.Drawing.Size(75, 23);
            this.playButton.TabIndex = 4;
            this.playButton.Text = "Play";
            this.playButton.UseVisualStyleBackColor = true;
            this.playButton.Click += new System.EventHandler(this.playButton_Click);
            // 
            // noteBox
            // 
            this.noteBox.Enabled = false;
            this.noteBox.Font = new System.Drawing.Font("Lassus", 47.99999F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(238)));
            this.noteBox.Location = new System.Drawing.Point(58, 181);
            this.noteBox.Name = "noteBox";
            this.noteBox.ReadOnly = true;
            this.noteBox.Size = new System.Drawing.Size(100, 76);
            this.noteBox.TabIndex = 5;
            this.noteBox.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // Dodawanie
            // 
            this.Dodawanie.AutoSize = true;
            this.Dodawanie.Location = new System.Drawing.Point(9, 165);
            this.Dodawanie.Name = "Dodawanie";
            this.Dodawanie.Size = new System.Drawing.Size(61, 13);
            this.Dodawanie.TabIndex = 6;
            this.Dodawanie.Text = "Dodawanie";
            // 
            // noteType
            // 
            this.noteType.Enabled = false;
            this.noteType.FormattingEnabled = true;
            this.noteType.Items.AddRange(new object[] {
            "Nuta",
            "Pauza"});
            this.noteType.Location = new System.Drawing.Point(164, 181);
            this.noteType.Name = "noteType";
            this.noteType.Size = new System.Drawing.Size(86, 21);
            this.noteType.TabIndex = 7;
            this.noteType.SelectedIndexChanged += new System.EventHandler(this.noteType_SelectedIndexChanged);
            // 
            // noteUp
            // 
            this.noteUp.Enabled = false;
            this.noteUp.Font = new System.Drawing.Font("Arial", 15.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(238)));
            this.noteUp.Location = new System.Drawing.Point(12, 181);
            this.noteUp.Name = "noteUp";
            this.noteUp.Size = new System.Drawing.Size(40, 35);
            this.noteUp.TabIndex = 8;
            this.noteUp.Text = "🡩";
            this.noteUp.UseVisualStyleBackColor = true;
            this.noteUp.Click += new System.EventHandler(this.noteUp_Click);
            // 
            // noteDown
            // 
            this.noteDown.Enabled = false;
            this.noteDown.Font = new System.Drawing.Font("Arial", 15.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(238)));
            this.noteDown.Location = new System.Drawing.Point(12, 222);
            this.noteDown.Name = "noteDown";
            this.noteDown.Size = new System.Drawing.Size(40, 35);
            this.noteDown.TabIndex = 9;
            this.noteDown.Text = "🡫";
            this.noteDown.UseVisualStyleBackColor = true;
            this.noteDown.Click += new System.EventHandler(this.noteDown_Click);
            // 
            // fileSystemWatcher1
            // 
            this.fileSystemWatcher1.EnableRaisingEvents = true;
            this.fileSystemWatcher1.SynchronizingObject = this;
            // 
            // Edycja
            // 
            this.Edycja.AutoSize = true;
            this.Edycja.Location = new System.Drawing.Point(483, 165);
            this.Edycja.Name = "Edycja";
            this.Edycja.Size = new System.Drawing.Size(39, 13);
            this.Edycja.TabIndex = 10;
            this.Edycja.Text = "Edycja";
            // 
            // leftButton
            // 
            this.leftButton.Enabled = false;
            this.leftButton.Font = new System.Drawing.Font("Arial", 15.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(238)));
            this.leftButton.Location = new System.Drawing.Point(164, 208);
            this.leftButton.Name = "leftButton";
            this.leftButton.Size = new System.Drawing.Size(40, 48);
            this.leftButton.TabIndex = 11;
            this.leftButton.Text = "🡨";
            this.leftButton.UseVisualStyleBackColor = true;
            this.leftButton.Click += new System.EventHandler(this.leftButton_Click);
            // 
            // rightButton
            // 
            this.rightButton.Enabled = false;
            this.rightButton.Font = new System.Drawing.Font("Arial", 15.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(238)));
            this.rightButton.Location = new System.Drawing.Point(210, 208);
            this.rightButton.Name = "rightButton";
            this.rightButton.Size = new System.Drawing.Size(40, 48);
            this.rightButton.TabIndex = 12;
            this.rightButton.Text = "🡪";
            this.rightButton.UseVisualStyleBackColor = true;
            this.rightButton.Click += new System.EventHandler(this.rightButton_Click);
            // 
            // addButton
            // 
            this.addButton.Enabled = false;
            this.addButton.Font = new System.Drawing.Font("Microsoft Sans Serif", 26.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(238)));
            this.addButton.Location = new System.Drawing.Point(257, 178);
            this.addButton.Name = "addButton";
            this.addButton.Size = new System.Drawing.Size(46, 78);
            this.addButton.TabIndex = 13;
            this.addButton.Text = "🞣";
            this.addButton.UseVisualStyleBackColor = true;
            this.addButton.Click += new System.EventHandler(this.addButton_Click);
            // 
            // stosButton
            // 
            this.stosButton.AutoSize = true;
            this.stosButton.Checked = true;
            this.stosButton.Enabled = false;
            this.stosButton.Location = new System.Drawing.Point(636, 188);
            this.stosButton.Name = "stosButton";
            this.stosButton.Size = new System.Drawing.Size(46, 17);
            this.stosButton.TabIndex = 14;
            this.stosButton.TabStop = true;
            this.stosButton.Text = "Stos";
            this.stosButton.UseVisualStyleBackColor = true;
            this.stosButton.CheckedChanged += new System.EventHandler(this.stosButton_CheckedChanged);
            // 
            // kolejkaButton
            // 
            this.kolejkaButton.AutoSize = true;
            this.kolejkaButton.Enabled = false;
            this.kolejkaButton.Location = new System.Drawing.Point(636, 211);
            this.kolejkaButton.Name = "kolejkaButton";
            this.kolejkaButton.Size = new System.Drawing.Size(60, 17);
            this.kolejkaButton.TabIndex = 15;
            this.kolejkaButton.Text = "Kolejka";
            this.kolejkaButton.UseVisualStyleBackColor = true;
            this.kolejkaButton.CheckedChanged += new System.EventHandler(this.kolejkaButton_CheckedChanged);
            // 
            // listaButton
            // 
            this.listaButton.AutoSize = true;
            this.listaButton.Enabled = false;
            this.listaButton.Location = new System.Drawing.Point(636, 234);
            this.listaButton.Name = "listaButton";
            this.listaButton.Size = new System.Drawing.Size(47, 17);
            this.listaButton.TabIndex = 16;
            this.listaButton.Text = "Lista";
            this.listaButton.UseVisualStyleBackColor = true;
            this.listaButton.CheckedChanged += new System.EventHandler(this.listaButton_CheckedChanged);
            // 
            // moveRight
            // 
            this.moveRight.Enabled = false;
            this.moveRight.Font = new System.Drawing.Font("Arial", 15.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(238)));
            this.moveRight.Location = new System.Drawing.Point(536, 181);
            this.moveRight.Name = "moveRight";
            this.moveRight.Size = new System.Drawing.Size(44, 78);
            this.moveRight.TabIndex = 18;
            this.moveRight.Text = "🡪";
            this.moveRight.UseVisualStyleBackColor = true;
            this.moveRight.Click += new System.EventHandler(this.moveRight_Click);
            // 
            // moveLeft
            // 
            this.moveLeft.Enabled = false;
            this.moveLeft.Font = new System.Drawing.Font("Arial", 15.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(238)));
            this.moveLeft.Location = new System.Drawing.Point(486, 181);
            this.moveLeft.Name = "moveLeft";
            this.moveLeft.Size = new System.Drawing.Size(44, 78);
            this.moveLeft.TabIndex = 17;
            this.moveLeft.Text = "🡨";
            this.moveLeft.UseVisualStyleBackColor = true;
            this.moveLeft.Click += new System.EventHandler(this.moveLeft_Click);
            // 
            // removeButton
            // 
            this.removeButton.Enabled = false;
            this.removeButton.Font = new System.Drawing.Font("Arial", 26.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(238)));
            this.removeButton.Location = new System.Drawing.Point(586, 181);
            this.removeButton.Name = "removeButton";
            this.removeButton.Size = new System.Drawing.Size(44, 78);
            this.removeButton.TabIndex = 19;
            this.removeButton.Text = "🞪";
            this.removeButton.UseVisualStyleBackColor = true;
            this.removeButton.Click += new System.EventHandler(this.removeButton_Click);
            // 
            // pictureBox1
            // 
            this.pictureBox1.Image = ((System.Drawing.Image)(resources.GetObject("pictureBox1.Image")));
            this.pictureBox1.Location = new System.Drawing.Point(309, 178);
            this.pictureBox1.Name = "pictureBox1";
            this.pictureBox1.Size = new System.Drawing.Size(168, 81);
            this.pictureBox1.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.pictureBox1.TabIndex = 20;
            this.pictureBox1.TabStop = false;
            // 
            // Nuty
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(707, 269);
            this.Controls.Add(this.pictureBox1);
            this.Controls.Add(this.removeButton);
            this.Controls.Add(this.moveRight);
            this.Controls.Add(this.moveLeft);
            this.Controls.Add(this.listaButton);
            this.Controls.Add(this.kolejkaButton);
            this.Controls.Add(this.stosButton);
            this.Controls.Add(this.addButton);
            this.Controls.Add(this.rightButton);
            this.Controls.Add(this.leftButton);
            this.Controls.Add(this.Edycja);
            this.Controls.Add(this.noteDown);
            this.Controls.Add(this.noteUp);
            this.Controls.Add(this.noteType);
            this.Controls.Add(this.Dodawanie);
            this.Controls.Add(this.noteBox);
            this.Controls.Add(this.playButton);
            this.Controls.Add(this.saveButton);
            this.Controls.Add(this.openButton);
            this.Controls.Add(this.editButton);
            this.Controls.Add(this.songBox);
            this.Name = "Nuty";
            this.Text = "Nuty";
            ((System.ComponentModel.ISupportInitialize)(this.fileSystemWatcher1)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.TextBox songBox;
        private System.Windows.Forms.Button editButton;
        private System.Windows.Forms.Button openButton;
        private System.Windows.Forms.Button saveButton;
        private System.Windows.Forms.Button playButton;
        private System.Windows.Forms.TextBox noteBox;
        private System.Windows.Forms.Label Dodawanie;
        private System.Windows.Forms.ComboBox noteType;
        private System.Windows.Forms.Button noteUp;
        private System.Windows.Forms.Button noteDown;
        private System.IO.FileSystemWatcher fileSystemWatcher1;
        private System.Windows.Forms.Button rightButton;
        private System.Windows.Forms.Button leftButton;
        private System.Windows.Forms.Label Edycja;
        private System.Windows.Forms.RadioButton listaButton;
        private System.Windows.Forms.RadioButton kolejkaButton;
        private System.Windows.Forms.RadioButton stosButton;
        private System.Windows.Forms.Button addButton;
        private System.Windows.Forms.PictureBox pictureBox1;
        private System.Windows.Forms.Button removeButton;
        private System.Windows.Forms.Button moveRight;
        private System.Windows.Forms.Button moveLeft;
    }
}

