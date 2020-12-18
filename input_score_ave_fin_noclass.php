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
