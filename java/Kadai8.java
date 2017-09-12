/*
 *
 *	頭に思い浮かべた整数を当てるプログラム
 *	9回以内にプログラムが数字を当てます。
 *
 *		Author:しもん	date：20160614
 *
 */

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

public class Kadai8{
	static final int MAXCOUNT = 9;//9回以内に答えを出すという前提のため
	public static void main(String args[])throws IOException{
		BufferedReader br = new BufferedReader(new InputStreamReader(System.in));


	int syoki  = 50;//syokiを計算処理にて増減する。
	int math = 50;//syoki値を足し引きする数。
		int kioku[] = { 0, 0, 0, 0, 0, 0, 0, 0, 0 };// 一度出たsyokiはここに格納されます

	String answer;//yかnを入力する用の変数

	System.out.println("1～100までの数字を思い浮かべてください。");

	for (int i = 0; i < MAXCOUNT; i++){

		System.out.println("あなたの思った数値は" + syoki +"以上ですか？(y/n)");

		answer = br.readLine();//yかnを入力。

		/*mathが2未満の場合に1以下で割ると以下の処理で増減しなくなる。
		mathの増減の最低値は1で止める為の処理*/
		if (   math >= 2  )
			math = math / 2;

		//yの場合は、mathを足す。
		if ( answer.equals("y")){
			syoki = syoki + math;
			kioku[i]=syoki;

		//nの場合は、mathを引く
		}else if (answer.equals("n")){
			syoki = syoki - math;
			kioku[i]= syoki;

		//それ以外の場合は、終了する。
		}else{
			System.out.println("降参ですか。");
			i = MAXCOUNT;

		}

		//変数kiokuに同じsyoki値が2度入ると終了する。
			for (int j = 0; j< i;j++){
				if( kioku[j] == syoki && answer.equals("y")){
					j = i;
					i = MAXCOUNT;
					syoki = syoki -1;

				}else if (kioku[j] == syoki){
					j = i;
					i = MAXCOUNT;
				}
			}

	}

	System.out.println("答えは"+ syoki +"になりました");

	}

}
