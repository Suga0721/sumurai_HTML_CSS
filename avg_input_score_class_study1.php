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

//
// ここからメインルーチン
//

$cal = new Averagecalculator();  //一度インスタンス(設計図から作られた実体化したもの)を生成し、変数に代入している。
　　　　　　　　　　　　　         //プロパティ、メソッドを作る場合インスタンスを生成し、変数に代入するという流れになる
                                //class名を記載する際には単語の区切りで大文字にしていくのが一般的　例→HumanAcademy

        //結果を表示する
if ($avg === false) {
    echo " 計算失敗：スコアデータがゼロ。\n";
} else {
    // 結果を表示する
    show_average($avg);
    //echo $ave."\n";
}

// 終了
exit;



//class→　設計図のようなもの オブジェクトの中のプロパティやメソッドをひとまとめにしたものだ。
//インスタンス→　設計図からつくられた実体化したもの(オブジェクトを作ること)→このことを「インスタンスの生成(オブジェクトを作ること)」という。
//「クラス名.new」や「new クラス名」(こちらの方が一般的)。として作成する。
// 
//classを構成しているのは、3つ。１、クラス名　2、プロパティ(変数やデータ)　3、メソッド(関数、動きの部分)
//
//classを使うメリット→プロパティやメソッドを毎回のように書かなくて良い。共通部分は使いまわせばよい。
//
//
//
//オブジェクト(プロパティとメソッドがある)
//オブジェクトは、オブジェクト指向の根本だ。
//ブジェクト指向で現実のものを例えると、このブログを見ているあなたもオブジェクトであり、使っているPCやスマホもオブジェクトだと言える。
//あなたには「名前」や「性別」といったデータ（個体の情報）があり、何かを「見る」「聞く」「話す」といった処理を持っている。
//
//
//オブジェクト指向メリット
//個別に処理を任せられます。
//独立したオブジェクトに処理の責任を任せられるので、メインの処理は各オブジェクトに「やっといてね」というだけで済みます。
//ある課長が部下にいちいち「Ａ君は書類を～してコピーしてー」「Ｂ君は会議用の書類を作って～」「Ｃ君は会議室取ってきて～」とか指示するのは大変です。
//できれば課長は「会議があるからいつも通り準備してね♡」と言ったらみんなが各自勝手に動いてくれる方が助かりますよね。そういうことです。

//変数の範囲が限定されます。
//オブジェクトの中に変数があり、変数の影響範囲がクラス内に限定されます。
//このことで、そのオブジェクトの変数を触る人を限定することができます。
//だれがいつどこで変数に触れるかわからないというはとても恐ろしいことで、変数をどこで使っているかわからないことや、
//いつの間にか変な値が入っていてエラーが起こることは良く起こります。
//この「変数の管理が簡単になる」ということは、初心者のみならず、大規模設計者には非常にありがたいことです。

//処理が複雑になりにくい
//一つのファイルにいろんな処理を書いて、細かく指示を出していると、処理の数も種類もすごく多くなり、複雑になります。
//大きなプログラムや複雑なプログラムを作るときにこれはすごいデメリットです。
//この処理はこのオブジェクトが一手に引き受ける。別の処理はノータッチ。と負担を分離することで一つ一つの処理がわかりやすくなります。
//問題を分割し、処理を分割し、オブジェクト一つ一つの処理はシンプルに設計するとその便利さがわかることでしょう。

//似たような処理を何度も書く必要がなくなる
//似たような処理を何度も記述するのは疲れます。でも、オブジェクト指向プログラミングでは、
//設計書があるため、違うところだけちょっと書き直したり、状態だけ修正することで似たような、でも違う振る舞いをするオブジェクトを簡単に生み出せます。
//
//
//カプセル化(classで使われる)　→　「オブジェクト内のデータ」を包み「オブジェクト外からの不正アクセス」から守る。
//
//「private」→　カプセル化によって保護されているためオブジェクト外からのアクセスができません。
//「public」　→　カプセル化されていないためアクセス可能

//private、publicの事をアクセス修飾子という。
//
//しかし、private でも　オブジェクト外からでもカプセル化されたデータを変更する方法が存在します。
//それは、クラス内に保護されていない関数を作って、その関数によってデータを変更してもらうという方法です。
//
//カプセル化の狙い
//データを保護する」ということです。それに尽きます。
//データの変更をオブジェクト自身に任せることによって、バグ（不整合）を引き起こさせないようにすると言ったりもします。
//先ほど学んだように、カプセル化を用いれば、クラス≒オブジェクト内の関数を一度経由させないといけない状態を作れます。
//この関数に不正なデータ変更を禁止する条件や設定を設ければ、データのバグを防げます。

//カプセル化
//モノを単純な形にして抽象化すること。他の人に触らせないようにする。オブジェクトの中には、様々な処理が入っていますが、
//その一つ一つを全ての人が理解して利用するのは非常に難しいことです。例えば時計。時計の中には様々な部品が入っていますが、
//私たちはボタンを何回か押すだけで時計の針を操作できます。しかし時計の中の部品が全部操作できるようになっていて、
//時計の設定を自分で一からするのは大変です。カプセル化は、このように複雑な処理をまとめ、抽象化することで分かりやすいものを作る作業のことだと言えます。
//
//メリット　→　情報を直接操作することをできなくして情報が壊れてしまうことを防止する
//オブジェクト内部に記述したデータや振る舞いを隠したり、オブジェクトの実際の型（クラスのことだと思ってくれ）を隠くしたりすることをいいます。
//何がいいかって、中身が変わっても外から見れば変化しないこと！
//例えば、ある文章をユーザに伝えたいときに、画面に文字を出すのか、音声が出力されるのか、いろいろ方法がありますよね。
//でも、機能追加ごとにプログラムすべてを変更していたらややっこしい＆めんどくさい。エラーも出すことになります。
//なので、”ユーザについたえる方法”を一つのオブジェクトに隠してしまうことで、変更に柔軟にでき、かつ使う方は「～とユーザに伝えてくれ」と頼むだけであとは気にせずに使える簡便さを獲得できるようになります。


//「->」はアロー演算子で、プロパティやメソッドにアクセスするのに使用します。

//使用例１↓↓

//$this->colorや$this->speadにて登場しています。
//これはCarクラスの関数内部から、同じクラスの変数である$colorや$speadにアクセスしているという意味になります。
//（※ちなみに$thisとはクラス自身を参照しているので、ここではCarクラスを参照していることなります。）
//というわけで、->はクラスの関数から変数を利用するときに使う演算子なわけです。


//使用例２
//class クラス名{
 
    //public $変数名 = 値;
 
    //public function メソッド名(){
      //echo this->$変数名;
    //}
  //}
  //上記のようにメソッド内でクラス内のメンバ変数にアクセスするために、this->$変数名とすれば値を参照することができます。
//
//
//つまり、PHPでの変数の値の取り出し方は２パターンある(他にもパターンがあるが今理解できるのはこの段階)

//１、$this -> 変数名　　　　　　　２、this -> $変数名
　　　//public $変数名="値"　　　　　　public $変数名 =値
//

//new クラス名(); とすることでコンストラクタ(クラスをnewした瞬間に実行される関数)を呼び出すことが出来る
//
//コンストラクタ→クラスをnewした瞬間に実行される関数



//PHPでのthis
//たとえクラスとメソッドで同じ変数が定義されていても、thisを使用すればクラスのメンバ変数を参照することができます。
//thisを指定しなければ、メソッド内のローカル変数を参照します。
//
//
//null