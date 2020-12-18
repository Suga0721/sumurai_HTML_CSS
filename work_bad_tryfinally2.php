<?php
//***************************** 
// ユーザーからの入力を受け付ける
//***************************** 
function input_user(&$users_word){

    $line = fgets(STDIN);
    $line = trim($line);
    var_dump($line);
    $users_word = $line;
}

//***************************** 
// その入力された内容を保存する     //例外処理を使わない場合、コードが見にくい&分かりにくい
//***************************** 
function save_input($users_word){

    //ファイル開く
    $file_num = fopen ("sample1.txt",'w');
    if ($file_num === false) {
        // 失敗した時の処理
        echo "ファイルを開けませんでした\n";
        // 管理者に通知する
        // 実装は省略
        return;
    }

    //ファイルに書きこむ
    $bytes_written = fwrite($file_num ,$users_word);
    if ($bytes_written === false) {
        // 失敗した時の処理
        echo "ファイル書き込みに失敗しました\n";
        // 管理者に通知する
        // 実装は省略
        fclose($file_num);
        return;
    }

    //ファイルを閉じる
    fclose($file_num);

}


$users_word =""; 

// ユーザーからの入力を受け付ける
input_user($users_word);
var_dump($users_word);


// その入力された内容を保存する
save_input($users_word);
