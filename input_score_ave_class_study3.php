<?php

//
// 点数を入力し平均を求め表示するプログラム
//
//classの記載のないコード部分は削除している(点数入力＆平均点を求める所)
//


//*********************************************
// 結果を表示する
//*********************************************
function show_average($avg) {
    echo "平均点は{$avg}でした。\n";
}


//*********************************************
// 点数を入力する
//*********************************************
class AverageCalculator {
    private $scores = null;
    private $averageScore = 0;

    public function __construct() {
    }

    private function input_scores() {
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
//*********************************************
    private function calc_average($scores) {
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
    public function execute() {
        $this->scores = input_scores();
        $this->averageScore = calc_average($this->scores);
        return $this->averageScore;
    }
}

//
// ここからメインルーチン
//

$cal = new AverageCalculator();
$avg = $cal->execute();


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
