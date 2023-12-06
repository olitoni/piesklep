import javax.swing.*;
import java.awt.*;

public class Cyferblat extends JFrame {

    public Cyferblat() {
        setTitle("Cyferblat");
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setSize(400, 460);
        ZegarPanel zegar = new ZegarPanel();
        add(zegar);

        Timer timer = new Timer(1000, e -> {
            zegar.setCurrentTime();
            zegar.repaint();
        });

        timer.start();
        zegar.setCurrentTime();
        JLabel cyferblat = new JLabel("Cyferblat");
        cyferblat.setForeground(new Color(222, 222, 222));
        cyferblat.setFont(new Font("Arial", 0, 24));
        cyferblat.setPreferredSize(new Dimension(100, 50));
        zegar.add(cyferblat, "Center");
    }

    class ZegarPanel extends JPanel {
        private int srodekX;
        private int srodekY;
        private int promienZegara;

        public ZegarPanel() {
            setBackground(new Color(10, 10, 10));
        }

        public void setCurrentTime() {
            repaint();
        }

        protected void paintComponent(Graphics g) {
            super.paintComponent(g);
            Graphics2D g2d = (Graphics2D) g;
            g2d.setRenderingHints(
                    new RenderingHints(RenderingHints.KEY_ANTIALIASING, RenderingHints.VALUE_ANTIALIAS_ON));
            promienZegara = Math.min(getWidth(), getHeight()) / 2 - 20;
            srodekX = getWidth() / 2;
            srodekY = getHeight() / 2 + 20;
            g2d.setStroke(new BasicStroke(3));
            g2d.setColor(new Color(222, 222, 222));
            g2d.drawOval(srodekX - promienZegara, srodekY - promienZegara, 2 * promienZegara, 2 * promienZegara);
            g2d.setFont(new Font("Arial", 1, 16));

            for (int hours = 1; hours <= 12; ++hours) {
                double kat = Math.toRadians(90 - (30 * hours));
                int x = (int) (srodekX + promienZegara * 0.8 * Math.cos(kat));
                int y = (int) (srodekY - promienZegara * 0.8 * Math.sin(kat));
                g2d.drawString(Integer.toString(hours), x - 7, y + 5);
            }
            g2d.setColor(new Color(222, 222, 222));

            long czas = System.currentTimeMillis() / 1000;
            double godzina = (czas % 86400) / 3600F + 1;
            double minuta = (czas % 3600) / 60F;
            double sekunda = Math.round(czas % 60);

            double katGodziny = Math.toRadians(90 - (30 * godzina));
            double katMinuty = Math.toRadians(90 - (6 * minuta));
            double katSekundy = Math.toRadians(90 - (6 * sekunda));

            wskazowka(g2d, srodekX, srodekY, promienZegara * 0.6, katGodziny, 5, Color.green);
            wskazowka(g2d, srodekX, srodekY, promienZegara * 0.7, katMinuty, 3, Color.green);
            wskazowka(g2d, srodekX, srodekY, promienZegara * 0.7, katSekundy, 2, Color.green);
        }

        private void wskazowka(Graphics2D g2d, int x, int y, double length, double kat, int szerokosc, Color color) {
            g2d.setStroke(new BasicStroke((float) szerokosc));
            g2d.setColor(color);
            int x2 = (int) (x + length * Math.cos(kat));
            int y2 = (int) (y - length * Math.sin(kat));
            g2d.drawLine(x, y, x2, y2);
        }
    }

    public static void main(String[] args) {
        SwingUtilities.invokeLater(() -> {
            Cyferblat app = new Cyferblat();
            app.setVisible(true);
        });
    }
}