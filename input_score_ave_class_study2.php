<?php

//
// 点数を入力し平均を求め表示するプログラム
//
// Ver. 1.0 初版
// Ver. 1.1 点数データが空の場合のエラーに対処
//

//*********************************************
// 点数を入力する
//*********************************************
function input_scores() {
    $scores = array();
    while (true) {
        // キーボードから１答案分の点数を入力する
        echo "点数を入力してください: ";
        $line = fgets(STDIN);
        // 前後の空白文字を取り除く
        $line = trim($line);
        // 入力された点数データが「空」だったら、それ以上答案がない、と判断し、繰り返しを終了する
        if ($line == "") {
            break; // 外側のループを終了する
        }
        // 入力された点数を配列にしまう
        $scores[] = $line;
    }
    //var_dump($scores);
    return $scores;
}

//*********************************************
// 平均点を求める
//
// @param $scores 点数データが格納された配列
// @return false 点数データ配列が空だった
// @return 上記以外 計算結果
//*********************************************
function calc_average($scores) {
    $total = 0; // 合算データをしまっておく変数
    // 点数データを全部合算する
    foreach ($scores as $score) {
        $total += $score;
    }
    //var_dump($total);
    // 答案の数で割る
    $num_of_samples = count($scores); // = 答案の数
    // エラーチェック
    if ($num_of_samples != 0) {
        // 問題なければ結果を返す
        return $total / $num_of_samples;
    } else {
        // 問題があったらfalseを返す
        return false;
    }
}

//*********************************************
// 結果を表示する
//*********************************************
function show_average($avg) {
    echo "平均点は{$avg}でした。\n";
}

class AverageCalculator {　　　//65行目～77行目はAverageCalculator の設計書ということ(classが記載されているので)
                              //class内に保護されていない関数を作って、その関数によってデータを変更することが可能
                              //class名を記載する際には単語の区切りで大文字にしていくのが一般的　例→HumanAcademy
    
    private $scores = null;　　　　//オブジェクトが生成された直後のプロパティの値の初期値を設定しています。今回はexecurteを呼び出せば代入が行われますが、
      　　　　　　　　　　　        //executeが呼び出される前の値が「仕様として」どうなっているかを決めておくのは「習慣として」ベターであるということです。
                                  //66・67行目で値を代入しなくても「処理系によるデフォルトの初期値」が入ることになっていますが、
    private $averageScore = 0;    //「処理系による、値をプログラマが認識していない初期値」よりもプログラマが認識している初期値を明示的に
                                  //設定してある方がいいのです。どんな設計でも、「ここはどうなってるの？」と聞かれた時に「さあ？」となるより
                                  //「はじめは○○です。その後こう動かすと△△になります」と答えられた方が「結果を偶然や他の何かに任せる」よりも
                                  //「様々な想定をしてそれに対処するように作られている」ことの度合いが増すことになるからです。
                                  //最後の質問の答えは設計理念や設計思想に関わることで若干哲学的、一種の宗教論争とも呼ばれている話題の一つなので、
                                  //違う答を言う人もいると思います。ただ私は今までの経験上、プログラマが用いる変数の内容は常にプログラマの意図によって
                                  //コントロールされているべきであると考えていますのでそのように答えました。そうでないと「こういう場合は知りません」
                                  //という動きになってしまう。それはプロの仕事としてどうなのか？という疑問が残ってしまうためです。

    
    public function __construct() {　//コンストラクタは__construct()で定義し、newでインスタンスを生成すると必ず実行される。
        　　　　　　　　　　　　　　　　//今回は84行目のnew AverageCalculator();　でconstructを定義している
                                     //今回のように、引数や処理内容が何もなければ記載しなしくてもOK！
    }


    public function execute() {　　//$cal->execute(); により、public function execute() の関数実行
                                    //ここ(class内)で関数を作成することによって、データ(変数)の変更が出来る。

        $this->scores = input_scores();　　//この場合$scoresの値を、nullからinput_scores()の「戻り値」に置き換えてるというのが一番正しいです。
        　　　　　　　　　　　　　　　　　　　//関数の呼び出しが右辺に来る場合、その戻り値を左辺に代入していると捉えてください。

        $this->averageScore = calc_average($this->scores);  //この場合$averageScoresの値を、0 からcalc_average($this->scores);の
                                                            //「戻り値」に置き換えてるというのが一番正しいです。
                                                            //$this->scores;　はinput_scores;を指している
                                                            //"$this ->averageScore = calc_average($this ->scores); "　のコードの解釈として、
                                                            //この時点で点数入力してもらいその点数入力によって平均点が求められている。
                                                            //その結果を ” $averageScore; ” に代入し、100行目のreturnにより、
                                                            //112行目の $cal ->execute　に値を返しているという処理の流れ
        return $this->averageScore;
    }

}

//
// ここからメインルーチン
//

$cal = new AverageCalculator();　//$オブジェクト名 = new クラス名(); という構文　65行目～77行目　class AverageCalculator 
　　　　　　　　　　　　　　　　　　//をnew AverageCalculatorと記載することで実体化させた。

$avg = $cal->execute();　　　　　
//execute→実行という意味 72行目の関数の実行の為に記載



// 結果を表示する
if ($avg === false) {
    echo "計算失敗：スコアデータがゼロ。\n";
} else {
    // 結果を表示する
    show_average($avg);
    //    echo $ave."\n";
}

// 終了
exit;


//nullの意味
//   
//↓　例　↓
//お盆の上にミカンが3つ乗っていれば「3」です。
//お盆の上にミカンが乗っていなければ「0」です。(この状態は空文字)
//この条件下において、お盆を持っていない状態がNULLです。
//そんなイメージです。
//違いはあるが、ただし、プログラミング言語によっては、NULLと空文字を同じと見なします。
//NULLと空文字を比較したときに「同じだよ！」と判定されるのです。その都度確認した方が良さそうです。