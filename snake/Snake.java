import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;
import java.util.LinkedList;
import java.util.Random;

public class Snake extends JFrame implements ActionListener, KeyListener {

    private static final int szerokosc = 30;
    private static final int wysokosc = 30;
    private static final int fps = 6;
    private static final int komorkaPx = 15;

    private enum Kierunek {
        UP, DOWN, LEFT, RIGHT
    }

    private LinkedList<Point> snake;
    private Point jedzenie;
    private Kierunek kierunek;
    private int wynik = 1;

    public Snake() {
        setTitle("Gra snejk | Wynik: 0");
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);

        snake = new LinkedList<>();
        snake.add(new Point(wysokosc / 2, szerokosc / 2));
        jedzenie = createFood();
        kierunek = Kierunek.RIGHT;
        getRootPane().setBorder(BorderFactory.createMatteBorder(2, 2, 2, 2, Color.RED));

        add(new Gra(), BorderLayout.CENTER);
        pack();

        addKeyListener(this);
        setFocusable(true);

        Timer timer = new Timer(1000 / fps, this);
        timer.start();
    }

    class Gra extends JPanel {

        @Override
        public void setBackground(Color bg) {
            super.setBackground(Color.BLACK);
        }

        @Override
        public Dimension getPreferredSize() {
            return new Dimension(szerokosc * komorkaPx, wysokosc * komorkaPx);
        }

        public void paint(Graphics g) {
            super.paint(g);

            g.setColor(Color.GREEN);
            for (Point point : snake) {
                g.fillRect(point.x * komorkaPx, point.y * komorkaPx, komorkaPx, komorkaPx);
            }

            g.setColor(Color.RED);
            g.fillRect(jedzenie.x * komorkaPx, jedzenie.y * komorkaPx, komorkaPx, komorkaPx);

            Toolkit.getDefaultToolkit().sync();
        }
    }

    private Point createFood() {
        Random rand = new Random();
        int x, y;
        do {
            x = rand.nextInt(komorkaPx);
            y = rand.nextInt(komorkaPx);
        } while (snake.contains(new Point(x, y)));
        return new Point(x, y);
    }

    private void move() {
        Point glowa = snake.getFirst();
        Point nowaGlowa;

        switch (kierunek) {
            case UP:
                nowaGlowa = new Point(glowa.x, (glowa.y - 1 + wysokosc) % wysokosc);
                break;
            case DOWN:
                nowaGlowa = new Point(glowa.x, (glowa.y + 1) % wysokosc);
                break;
            case LEFT:
                nowaGlowa = new Point((glowa.x - 1 + szerokosc) % szerokosc, glowa.y);
                break;
            case RIGHT:
                nowaGlowa = new Point((glowa.x + 1) % szerokosc, glowa.y);
                break;
            default:
                return;
        }

        if (snake.contains(nowaGlowa)) {
            koniecGry();
            return;
        }

        snake.addFirst(nowaGlowa);

        if (nowaGlowa.equals(jedzenie)) {
            jedzenie = createFood();
            setTitle("Gra snejk | Wynik: " + wynik++);
        } else {
            snake.removeLast();
        }
    }

    private void koniecGry() {
        JOptionPane.showMessageDialog(null, 
                              "Wynik: " + (wynik - 1), 
                              "Koniec gry!", 
                              JOptionPane.WARNING_MESSAGE);
        System.exit(0);
    }

    @Override
    public void actionPerformed(ActionEvent e) {
        move();
        repaint();
    }

    @Override
    public void keyPressed(KeyEvent e) {
        switch (e.getKeyCode()) {
            case KeyEvent.VK_UP:
                if (kierunek != Kierunek.DOWN) {
                    kierunek = Kierunek.UP;
                }
                break;
            case KeyEvent.VK_DOWN:
                if (kierunek != Kierunek.UP) {
                    kierunek = Kierunek.DOWN;
                }
                break;
            case KeyEvent.VK_LEFT:
                if (kierunek != Kierunek.RIGHT) {
                    kierunek = Kierunek.LEFT;
                }
                break;
            case KeyEvent.VK_RIGHT:
                if (kierunek != Kierunek.LEFT) {
                    kierunek = Kierunek.RIGHT;
                }
                break;
        }
    }

    @Override
    public void keyTyped(KeyEvent e) {
    }

    @Override
    public void keyReleased(KeyEvent e) {
    }

    public static void main(String[] args) {
        SwingUtilities.invokeLater(() -> new Snake().setVisible(true));
    }
}
