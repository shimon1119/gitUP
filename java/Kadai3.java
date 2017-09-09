
/*
 * 数字を３回入力し、最も大きい数を返すプログラム。
 * kを押すと終了します。
 *Author:しもん	date：20170901
 * */
import java.io.BufferedReader;
import java.io.InputStreamReader;

public class Kadai3 {
	public static void main(String[] args) {
		InputStreamReader is = new InputStreamReader(System.in);
		BufferedReader br = new BufferedReader(is);
		boolean loopflg = true;// ループ用
		String input;// ここに文字を入力
		int nums[] = new int[3];// 数字を格納します。

		while (loopflg) {
			for (int i = 0; i < nums.length; i++) {
				System.out.println("数字を入力してください。kを入力すると終了します");
				try {
					input = br.readLine();
					// kが入力された場合の処理
					if (input.equals("k")) {
						System.out.println("終了です。お疲れ様でした。");
						loopflg = false;
						System.exit(0);
					}
					nums[i] = Integer.parseInt(input);
				} catch (Exception e) {
					System.out.println("不正な数字です");
				}
			}
			// バブルソート 降順
			// 比較終了ポインタ
			for (int i = nums.length - 1; i > 1; i--) {
				// 比較開始ポインタ
				for (int j = 0; j < i; j++) {
					if (nums[j] > nums[j + 1]) {
						int temp = nums[j + 1];
						nums[j + 1] = nums[j];
						nums[j] = temp;
					}
				}
			}
			// 出力後、入力に戻る
			System.out.println("最も大きい数字は");
			System.out.println(nums[2]);
		}
	}
}
