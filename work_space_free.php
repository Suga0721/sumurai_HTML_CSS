<?php


//点数入力する
class AverageCalculator(){
    private $scores = null;
    private $averageScore = 0;
    
    private function input_scores(){
        $scores = array();
        while(true){
            $line = fgets(STDIN);
            $line = trim($line);
            if($line == ""){
                break;

            }
            $scores[] =$line;
        }
            return $scores;
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