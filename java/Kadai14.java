/*
 *		図を表示する。
 *		起動時に第一引数にp1かp2、第二引数にnoraml、reverseのどちらかが必要。
 *
 *		Author:しもん	date：20160902
 */

public class Kadai14 {
	public static void main(String[] args) {
		StringBuilder blanks = new StringBuilder("                 ");// normal時、出力する文字列。
		StringBuilder dots = new StringBuilder("*****************");// reverse時、出力する文字列。
		String dot = "*";// nomal字、文字列の置き換えに使用。
		String blank = " ";// reverse時、文字列の置き換えに使用。

		// 第一引数がp1の際の分岐
		if (args[0].equals("p1")) {
			if (args[1].equals("reverse")) {
				triangle(dots, dots.length() - 1, blank);
			} else if (args[1].equals("normal")) {
				triangle(blanks, blanks.length() - 1, dot);
			}
		}
		// 第一引数がp2の際の分岐
		else if (args[0].equals("p2")) {
			if (args[1].equals("reverse")) {
				delta(dots, dots.length() / 2, (dots.length() / 2) + 1, (dots.length() / 2), blank);
			} else if (args[1].equals("normal")) {
				delta(blanks, blanks.length() / 2, (blanks.length() / 2) + 1, (blanks.length() / 2), dot);
			}
		}
	}

	// 図パターン1
	private static void triangle(StringBuilder dots, int count, String blank) {
		if (count >= 0) {
			dots = dots.replace(count, count + 1, blank);
			System.out.println(dots);
			triangle(dots, --count, blank);
		}
	}

	// 図パターン2
	private static void delta(StringBuilder dots, int center, int right, int left, String blank) {

		// 初回の処理
		if (left == 8) {
			dots = dots.replace(center, center + 1, blank);
			System.out.println(dots);
			dots = dots.replace(right, right + 1, blank);
			dots = dots.replace(left - 1, left, blank);
			System.out.println(dots);
			delta(dots, center, ++right, --left, blank);

		// 2度目以降の処理
		} else if (left != 0) {
			dots = dots.replace(right, right + 1, blank);
			dots = dots.replace(left - 1, left, blank);
			System.out.println(dots);
			delta(dots, center, ++right, --left, blank);
		}
	}

}
