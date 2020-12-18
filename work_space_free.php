<?php


//点数入力する
class AverageCalculator(){
    private $scores = null;
    private $averageScore = 0;
    
    private function input_scores(){

    }

 

//平均点を求める
//************************
    private function calc_average(){


    }
//**********************



    public function excute(){
        $this ->scores =input_scores();
        $this ->averageScore =calc_average($this->scores);

    }

}



// ここからメインルーチン

$cal = new AverageCalculator();

$ave = $cal ->excute();












?>