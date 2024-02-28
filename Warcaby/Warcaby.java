import java.util.ArrayList;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.event.MouseEvent;
import java.awt.event.MouseListener;
import javax.swing.*;

public class Warcaby {

	public static void main(String[] args) throws Exception {
		new CheckersView();
	}

	private static class CheckersView extends JPanel implements MouseListener {

		JFrame frame;
		CheckersModel boardState;

		boolean gameIsHappening;
		int currPlayer;
		Move[] possibleMoves;
		int currRow, currCol;

		public CheckersView() {
			addMouseListener(this);
			frame = new JFrame("Warcaby | Zaczyna bialy");

			JPanel mainPanel = new JPanel();
			mainPanel.setLayout(new BoxLayout(mainPanel, BoxLayout.Y_AXIS));
			frame.setSize(540,562);

			mainPanel.add(this);

			frame.add(mainPanel);

			frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
			frame.setVisible(true);

			boardState = new CheckersModel();

			startGame();
		}

		public void startGame() {
			boardState.createBoard();
			gameIsHappening = true;
			currPlayer = CheckersModel.WHITE;
			possibleMoves = boardState.currentPossibleMoves(CheckersModel.WHITE);
			currRow = -1;

			repaint();
		}

		public void processMove(Move move) {
			boardState.updateBoardWith(move);

			if(move.isJumpMove()) {
				possibleMoves = boardState.currentPossibleJumps(currPlayer, move.toRow, move.toCol);
				if(possibleMoves != null) {
					if(currPlayer == CheckersModel.WHITE) {
						frame.setTitle("Warcaby | Kolej bialego");
						
					} else {
						frame.setTitle("Warcaby | Kolej czarnego");
					}
					currRow = move.toRow;
					currCol = move.toCol;
					repaint();
					return;
				}
			}

			if(currPlayer == CheckersModel.WHITE) {
				currPlayer = CheckersModel.BLACK;
				possibleMoves = boardState.currentPossibleMoves(currPlayer);
				if(possibleMoves == null) {
					frame.setTitle("Warcaby | Bialy wygrywa");
					JOptionPane.showMessageDialog(new JFrame(),"Bialy wygrywa"); 
					gameIsHappening = false;
				} else if(possibleMoves[0].isJumpMove()) {
					frame.setTitle("Warcaby | Kolej czarnego");
				} else {
					frame.setTitle("Warcaby | Kolej czarnego");
				}
			} else {
				currPlayer = CheckersModel.WHITE;
				possibleMoves = boardState.currentPossibleMoves(currPlayer);
				if(possibleMoves == null) {
					frame.setTitle("Warcaby | Czarny wygrywa");
					JOptionPane.showMessageDialog(new JFrame(),"Czarny wygrywa"); 
					gameIsHappening = false;
				} else if(possibleMoves[0].isJumpMove()) {
					frame.setTitle("Warcaby | Kolej bialego");
				} else {
					frame.setTitle("Warcaby | Kolej bialego");
				}
			}

			currRow = -1;

			if(possibleMoves != null) {
				boolean stillCurrLocation = true;
				for(int i = 1;  i < possibleMoves.length; i++) {
					if(possibleMoves[i].fromCol != possibleMoves[0].fromCol
						|| possibleMoves[i].fromRow != possibleMoves[0].fromRow) {

						stillCurrLocation = false;
						break;
					}
				}
				if(stillCurrLocation) {
					currRow = possibleMoves[0].fromRow;
					currCol = possibleMoves[0].fromCol;
				}
			}

			repaint();
		}

		public void paintComponent(Graphics g) {
			super.paintComponent(g);
					setSize(524,524);
					g.setColor(Color.black);
					g.drawRect(0,0,getSize().width-1,getSize().height-1);
					g.drawRect(1,1,getSize().width-3,getSize().height-3);

					for (int row = 0; row < 8; row++) {
						 for (int col = 0; col < 8; col++) {
								if ( row % 2 == col % 2 )
									 g.setColor(Color.LIGHT_GRAY);
								else
									 g.setColor(Color.GRAY);
								g.fillRect(2 + col*65, 2 + row*65, 65, 65);
								switch (boardState.currPieceAt(row,col)) {
									case CheckersModel.WHITE:
										 g.setColor(Color.WHITE);
										 g.fillOval(9 + col*65, 9 + row*65, 50, 50);
										 break;
									case CheckersModel.BLACK:
										 g.setColor(Color.BLACK);
										 g.fillOval(9 + col*65, 9 + row*65, 50, 50);
										 break;
									case CheckersModel.WHITE_KING:
										 g.setColor(Color.WHITE);
										 g.fillOval(9 + col*65, 9 + row*65, 50, 50);
										 g.setColor(Color.WHITE);
										 g.drawString("K", 7 + col*65, 16 + row*65);
										 break;
									case CheckersModel.BLACK_KING:
										 g.setColor(Color.BLACK);
										 g.fillOval(9 + col*65, 9 + row*65, 50, 50);
										 g.setColor(Color.WHITE);
										 g.drawString("K", 7 + col*65, 16 + row*65);
										 break;
								}
						 }
					}

					if(gameIsHappening) {

						if(currRow >= 0) {
							g.setColor(Color.white);
							g.drawRect(2 + currCol*65, 2 + currRow*65, 65, 65);
							g.drawRect(3 + currCol*65, 3 + currRow*65, 65, 65);
						}
					}   
		}

		@Override
		public void mousePressed(MouseEvent e) {

			int col = (e.getX() - 2) / 65;
					int row = (e.getY() - 2) / 65;
					squareClicked(row, col);

		}

		public void squareClicked(int row, int col) {

			for (Move move: possibleMoves) {
				if(move.fromRow == row && move.fromCol == col) {
					currRow = row;
					currCol = col;
					if(currPlayer == CheckersModel.WHITE)
						frame.setTitle("Warcaby | Kolej bialego ");
					else
						frame.setTitle("Warcaby | Kolej Czarnego ");
					repaint();
					return;
				}
			}

			if(currRow < 0) {
				return;
			}

			for(Move move: possibleMoves) {
				if(move.fromRow == currRow && move.fromCol == currCol &&
						move.toRow == row && move.toCol == col) {
					processMove(move);
					return;
				}
			}
		}

		@Override
		public void mouseReleased(MouseEvent e) {

		}

		@Override
		public void mouseEntered(MouseEvent e) {

		}

		@Override
		public void mouseExited(MouseEvent e) {

		}

		@Override
		public void mouseClicked(MouseEvent e) {

		}
	}

	private static class Move {

		int fromRow, fromCol;
		int toRow, toCol;

		public Move(int frow, int fcol, int trow, int tcol) {
			this.fromRow = frow;
			this.fromCol = fcol;
			this.toRow = trow;
			this.toCol = tcol;

		}

		public String toString() {
			return "(" + this.fromRow + ", " + this.fromCol + ") -> (" + this.toRow + ", " + this.toCol + ")";
		}

		public boolean isJumpMove() {
			if (fromRow - toRow == -2 || fromRow - toRow == 2) {
				return true;
			}
			return false;
		}
	}

	private static  class CheckersModel {

		public static final int
				EMPTY = 0,
				BLACK = 1,
				BLACK_KING = 2,
				WHITE = 3,
				WHITE_KING = 4,
				BLOCKED = 5;

		public static final String[] players = 
				{"EMPTY", "BLACK", "BLACK_KING", "WHITE", "WHITE_KING", "BLOCKED"};

		public int[][] board; 

		public CheckersModel() {
			board = new int[8][8];
			createBoard();
		}

		public void createBoard() {

			for(int row = 0; row < 8; row++) {
				for(int col = 0; col < 8; col++) {
					if(row % 2 == col % 2) {
						if (row < 3)
							board[row][col] = BLACK;
						else if(row >  4)
							board[row][col] = WHITE;
						else
							board[row][col] = EMPTY;

					} else {
						board[row][col] = EMPTY;
					}
				}
			}
		}

		public void updateBoardWith(Move requestedMove) {
			board[requestedMove.toRow][requestedMove.toCol] = board[requestedMove.fromRow][requestedMove.fromCol];
			board[requestedMove.fromRow][requestedMove.fromCol] = EMPTY;

			if(Math.abs(requestedMove.toRow - requestedMove.fromRow) == 2) {
				int removePieceRow = (requestedMove.fromRow + requestedMove.toRow) / 2;
				int removePieceCol = (requestedMove.fromCol + requestedMove.toCol) / 2;
				board[removePieceRow][removePieceCol] = EMPTY;
			}
			if(Math.abs(requestedMove.toRow - requestedMove.fromRow) == 4) {
				if(requestedMove.toRow > requestedMove.fromRow && requestedMove.toCol > requestedMove.fromCol) {
					board[requestedMove.fromRow + 3][requestedMove.fromCol + 3] = EMPTY;
					board[requestedMove.fromRow + 1][requestedMove.fromCol + 1] = EMPTY;
				}

				if(requestedMove.toRow < requestedMove.fromRow && requestedMove.toCol > requestedMove.fromRow) {
					board[requestedMove.fromRow - 3][requestedMove.fromCol + 3] = EMPTY;
					board[requestedMove.fromRow - 1][requestedMove.fromCol + 1] = EMPTY;
				}

				if(requestedMove.toRow > requestedMove.fromRow && requestedMove.toCol < requestedMove.fromCol) {
					board[requestedMove.fromRow + 3][requestedMove.fromCol - 3] = EMPTY;
					board[requestedMove.fromRow + 1][requestedMove.fromCol - 1] = EMPTY;
				}

				if(requestedMove.toRow < requestedMove.fromRow && requestedMove.toCol < requestedMove.fromCol) {
					board[requestedMove.fromRow - 3][requestedMove.fromCol - 3] = EMPTY;
					board[requestedMove.fromRow - 1][requestedMove.fromCol - 1] = EMPTY;
				}
			}
			if(Math.abs(requestedMove.toRow - requestedMove.fromRow) == 6) {

				if(requestedMove.toRow > requestedMove.fromRow && requestedMove.toCol > requestedMove.fromCol) {
					board[requestedMove.fromRow + 5][requestedMove.fromCol + 5] = EMPTY;
					board[requestedMove.fromRow + 1][requestedMove.fromCol + 1] = EMPTY;
				}

				if(requestedMove.toRow < requestedMove.fromRow && requestedMove.toCol > requestedMove.fromRow) {
					board[requestedMove.fromRow - 5][requestedMove.fromCol + 5] = EMPTY;
					board[requestedMove.fromRow - 1][requestedMove.fromCol + 1] = EMPTY;
				}

				if(requestedMove.toRow > requestedMove.fromRow && requestedMove.toCol < requestedMove.fromCol) {
					board[requestedMove.fromRow + 5][requestedMove.fromCol - 5] = EMPTY;
					board[requestedMove.fromRow + 1][requestedMove.fromCol - 1] = EMPTY;
				}

				if(requestedMove.toRow < requestedMove.fromRow && requestedMove.toCol < requestedMove.fromCol) {
					board[requestedMove.fromRow - 5][requestedMove.fromCol - 5] = EMPTY;
					board[requestedMove.fromRow - 1][requestedMove.fromCol - 1] = EMPTY;
				}
			}

			if(requestedMove.toRow == 7 && board[requestedMove.toRow][requestedMove.toCol] == BLACK)
				board[requestedMove.toRow][requestedMove.toCol] = BLACK_KING;
			if(requestedMove.toRow == 0 && board[requestedMove.toRow][requestedMove.toCol] == WHITE)
				board[requestedMove.toRow][requestedMove.toCol] = WHITE_KING;
		}

		private boolean isLegalMove(int player, Move requestedMove) {

			if (requestedMove.toCol < 0 || requestedMove.toCol >= 8 || requestedMove.toRow >= 8 || requestedMove.toRow < 0) {
				return false;
			}

			if(board[requestedMove.toRow][requestedMove.toCol] != EMPTY) {

				return false;
			} else {
				if(player == WHITE) {
					if(board[requestedMove.fromRow][requestedMove.fromCol] == WHITE && requestedMove.toRow > requestedMove.fromRow) {

						return false;
					}
					return true;
				} else {
					if (board[requestedMove.fromRow][requestedMove.fromCol] == BLACK && requestedMove.toRow < requestedMove.fromRow)
						return false;
					return true;
				}
			}
		}

		private boolean isLegalJump(int player, Move move, int inBetweenRow, int inBetweenCol) {
			if (move.toCol < 0 || move.toCol >= 8 || move.toRow >= 8 || move.toRow < 0) {
				return false;
			}

			if(board[move.toRow][move.toCol] != EMPTY ) {
				return false;
			}

			if(player == WHITE) {

				if(board[move.fromRow][move.fromCol] == WHITE && move.toRow > move.toCol)
					return false;

				if(board[inBetweenRow][inBetweenCol] != BLACK && board[inBetweenRow][inBetweenCol] != BLACK_KING)
					return false;

				return true;
			} else {

				if(board[move.fromRow][move.fromCol] == BLACK && move.toRow < move.fromRow)
					return false;

				if(board[inBetweenRow][inBetweenCol] != WHITE && board[inBetweenRow][inBetweenCol] != WHITE_KING)
					return false;

				return true;
			}
		}

		public Move[] currentPossibleMoves(int currPlayer) {

			if (currPlayer != WHITE && currPlayer != BLACK)
				return null;

			int currPlayerKing;
			if(currPlayer == WHITE)
				currPlayerKing = WHITE_KING;
			else
				currPlayerKing = BLACK_KING;

			ArrayList<Move> availableMoves = new ArrayList<Move>();
			for(int row = 0; row < 8; row++) {
				for(int col = 0; col < 8; col++) {
					if(board[row][col] == currPlayer || board[row][col] == currPlayerKing) {
						if(isLegalJump(currPlayer, new Move(row, col, row + 2, col + 2), row + 1, col + 1)) {
							if(isLegalJump(currPlayer, new Move(row + 2, col + 2, row + 4, col + 4), row + 3, col + 3)) {
								if(isLegalJump(currPlayer, new Move(row + 4, col + 4, row + 6, col + 6), row + 5, col + 5)) {
									availableMoves.add(new Move(row, col, row + 6, col + 6));
								} else {
									availableMoves.add(new Move(row, col, row + 4, col + 4));
								}
							} else {
								availableMoves.add(new Move(row, col, row + 2, col + 2));
							}
						}
						if(isLegalJump(currPlayer, new Move(row, col, row - 2, col + 2), row - 1, col + 1)) {
							if(isLegalJump(currPlayer, new Move(row - 2, col + 2, row - 4, col + 4), row - 3, col + 3)) {
								if(isLegalJump(currPlayer, new Move(row - 4, col + 4, row - 6, col + 6), row - 5, col + 5)) {
									availableMoves.add(new Move(row, col, row - 6, col + 6));
								} else {
									availableMoves.add(new Move(row, col, row - 4, col + 4));
								}
							} else {
								availableMoves.add(new Move(row, col, row - 2, col + 2));
							}
						}
						if(isLegalJump(currPlayer, new Move(row, col, row + 2, col - 2), row + 1, col - 1)) {
							if(isLegalJump(currPlayer, new Move(row + 2, col - 2, row + 4, col - 4), row + 3, col - 3)) {
								if(isLegalJump(currPlayer, new Move(row + 4, col - 4, row + 6, col - 6), row + 5, col - 5)) {
									availableMoves.add(new Move(row, col, row + 6, col - 6));
								} else {
									availableMoves.add(new Move(row, col, row + 4, col - 4));
								}
							} else {
								availableMoves.add(new Move(row, col, row + 2, col - 2));
							}
						}
						if(isLegalJump(currPlayer, new Move(row, col, row - 2, col - 2), row - 1, col - 1)) {
							if(isLegalJump(currPlayer, new Move(row - 2, col - 2, row - 4, col - 4), row - 3, col - 3)) {
								if(isLegalJump(currPlayer, new Move(row - 4, col - 4, row - 6, col - 6), row - 5, col - 5)) {
									availableMoves.add(new Move(row, col, row - 6, col - 6));
								} else {
									availableMoves.add(new Move(row, col, row - 4, col - 4));
								}
							} else {
								availableMoves.add(new Move(row, col, row - 2, col - 2));
							}
						}
					}
				}
			}

			if(availableMoves.size() == 0) {
				for(int row = 0; row < 8; row++) {
					for(int col = 0; col < 8; col++) {

						if(board[row][col] == currPlayer || board[row][col] == currPlayerKing) {
							if(isLegalMove(currPlayer, new Move(row, col, row+1, col+1))) {
								availableMoves.add(new Move(row, col, row+1, col+1));
							}
							if(isLegalMove(currPlayer, new Move(row, col, row-1, col+1))) {
								availableMoves.add(new Move(row, col, row-1, col+1));
							}
							if(isLegalMove(currPlayer, new Move(row, col, row+1, col-1))) {
								availableMoves.add(new Move(row, col, row+1, col-1));
							}
							if(isLegalMove(currPlayer, new Move(row, col, row-1, col-1))) {
								availableMoves.add(new Move(row, col, row-1, col-1));
							}
						}
					}
				}
			}

			if(availableMoves.size() == 0)
				return null;
			else {
				Move[] moves = new Move[availableMoves.size()];
				for(int i = 0; i < availableMoves.size(); i++) {
					moves[i] = availableMoves.get(i);
				}
				return moves;
			}
		}

		public Move[] currentPossibleJumps(int currPlayer, int row, int col) {
			if (currPlayer != WHITE && currPlayer != BLACK)
				return null;

			int currPlayerKing;
			if(currPlayer == WHITE)
				currPlayerKing = WHITE_KING;
			else
				currPlayerKing = BLACK_KING;

			ArrayList<Move> availableJumps = new ArrayList<Move>();
			if(board[row][col] == currPlayer || board[row][col] == currPlayerKing) {
				if(isLegalJump(currPlayer, new Move(row, col, row + 2, col + 2), row + 1, col + 1)) {
					if(isLegalJump(currPlayer, new Move(row + 2, col + 2, row + 4, col + 4), row + 3, col + 3)) {
						if(isLegalJump(currPlayer, new Move(row + 4, col + 4, row + 6, col + 6), row + 5, col + 5)) {
							availableJumps.add(new Move(row, col, row + 6, col + 6));
						} else {
							availableJumps.add(new Move(row, col, row + 4, col + 4));
						}
					} else {
						availableJumps.add(new Move(row, col, row + 2, col + 2));
					}
				}
				if(isLegalJump(currPlayer, new Move(row, col, row - 2, col + 2), row - 1, col + 1)) {
					if(isLegalJump(currPlayer, new Move(row - 2, col + 2, row - 4, col + 4), row - 3, col + 3)) {
						if(isLegalJump(currPlayer, new Move(row - 4, col + 4, row - 6, col + 6), row - 5, col + 5)) {
							availableJumps.add(new Move(row, col, row - 6, col + 6));
						} else {
							availableJumps.add(new Move(row, col, row - 4, col + 4));
						}
					} else {
						availableJumps.add(new Move(row, col, row - 2, col + 2));
					}
				}
				if(isLegalJump(currPlayer, new Move(row, col, row + 2, col - 2), row + 1, col - 1)) {
					if(isLegalJump(currPlayer, new Move(row + 2, col - 2, row + 4, col - 4), row + 3, col - 3)) {
						if(isLegalJump(currPlayer, new Move(row + 4, col - 4, row + 6, col - 6), row + 5, col - 5)) {
							availableJumps.add(new Move(row, col, row + 6, col - 6));
						} else {
							availableJumps.add(new Move(row, col, row + 4, col - 4));
						}
					} else {
						availableJumps.add(new Move(row, col, row + 2, col - 2));
					}
				}
				if(isLegalJump(currPlayer, new Move(row, col, row - 2, col - 2), row - 1, col - 1)) {
					if(isLegalJump(currPlayer, new Move(row - 2, col - 2, row - 4, col - 4), row - 3, col - 3)) {
						if(isLegalJump(currPlayer, new Move(row - 4, col - 4, row - 6, col - 6), row - 5, col - 5)) {
							availableJumps.add(new Move(row, col, row - 6, col - 6));
						} else {
							availableJumps.add(new Move(row, col, row - 4, col - 4));
						}
					} else {
						availableJumps.add(new Move(row, col, row - 2, col - 2));
					}
				}
			}
			if(availableJumps.size() == 0) {
				return null;
			} else {
				Move[] jumps = new Move[availableJumps.size()];
				for(int i = 0; i < availableJumps.size(); i++) {
					jumps[i] = availableJumps.get(i);
				}
				return jumps;
			}
		}

		public int currPieceAt(int row, int col) {
			return board[row][col];
		}

	}	
}