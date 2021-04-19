
<?php  // 基本的にPHPの場合<?Php~の中にプログラムを記載、最後にセミコロン(;)を忘れない。
//処理を記載していく際にはいきなりコードを書くのではなく、問題を細かくして、(コメントアウトを活用しながら)記載していく。

//
// 今回は点数を入力し平均を求め、表示するプログラムを作成
//


//*********************************************
// 点数を入力する
//*********************************************

function input_scores() {
    $scores = array();　//PHPの場合変数名は$(ダラー)から始まる、array()は配列を作成という意味。→ブラケットでも丸括弧どちらでもOK
                        //よってarray()を$scoresに代入することで$scoresは配列になる→https://www.sejuku.net/blog/11981
    while(true) {  // while(true) の場合、{}の中の処理がずっと続く

        // キーボードから(標準入力)１答案分の点数を入力する
        $line = fgets(STDIN);　//　fgets()関数で、標準入力(キーボード入力の事)された1行目を取得しています。STADIN→自動的に標準入力の値が入ります。
        // 前後の空白文字を取り除く →fgets()は改行も含めて取得するので、trim()で取り除いています
        $line = trim($line);
        // 入力された点数データが「空」だったら、(点数を入力しないでenterキーを押す)それ以上答案がない、と判断し、繰り返しを終了する
        if ($line == "") {
            break; // 外側のループを終了する、シングルクォーテーションでもダブルクォーテーションどちらでもOK！、== は同じ値を比較するときに使用
        }
        // 入力された点数を配列にしまう(15行目の$scores = array()により$scoresは配列になった)　$変数名[]とすることで配列に追加できる
        $scores[] = $line;
    }
    //var_dump($scores);　　　→var_dumpはechoより詳細な情報を出力してくれる構文、デバックで使用。
    return $scores;　// 　　return →処理結果を関数の呼び出し元に返す
}

// fgetsについて→https://tofusystem.work/programming-lesson/about-stdin/

//*********************************************
// 平均点を求める
//*********************************************

function calc_average($scores) {
    $total = 0; // 合算データをしまっておく変数
    // 点数データを全部合算する　foreach($配列 as $変数名)　⇒配列の要素を一つずつ取り出して$変数名に代入していくという動きをする
    foreach ($scores as $score) {
        $total += $score; // +=　の意味は$totalに$scoreの値を足していく
    }
    //var_dump($total);
    // 答案の数で割る
    $num_of_samples = count($scores); // = 答案の数　count()で配列の要素数を取得
    return $total / $num_of_samples;  //入力された得点の総数÷答案の数 の答えを　return→処理結果を関数の呼び出し元に返す
}


//*********************************************
// 結果を表示する
//*********************************************
function show_average($avg) {
    echo "平均点は{$avg}でした。\n"; 　//echoは値を出力するために必要,　"平均点は{$avg}でした。"→文字列の中に変数名を埋め込みしている。↓
                                //ダブルクォーテーションの時のみ有効　・文字列の中で 「\n」(バックスラッシュエヌ) とあるのは「改行」を意味
}


//
// ここからメインルーチン
//

// 点数を入力する
$scores = input_scores();

// 平均点を求める
$avg = calc_average($scores);
// var_dump($avg);

// 結果を表示する、===は型と値が合っているか確認している
if ($avg === false) {
    echo "計算失敗：スコアデータがゼロ。\n";
} else {
    // 結果を表示する
    show_average($avg);
    //    echo $ave."\n";
}

// 終了
exit;


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
// @return false 点数データ配列が空だった(結果が0、つまり答案数がゼロ=入力された点数データが一つもない場合)
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
        // 問題があったら(結果が0、つまり答案数がゼロ=入力された点数データが一つもない場合)falseを返す　
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

// 点数を入力する
$scores = input_scores();

// 平均点を求める
$avg = calc_average($scores); //ここに return$total / $num_of_samplesの結果or
                              //return false 結果の値が返ってくる
// var_dump($avg);

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
