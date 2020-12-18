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
// その入力された内容を保存する
//***************************** 
function save_input($users_word){
    $file_num = false;
    try {
        //ファイル開く
        $file_num = fopen ("sample1.txt",'w');
        if ($file_num === false) {
            throw new Exception("ファイルを開けませんでした");
        }

        //ファイルに書きこむ
        $bytes_written = fwrite($file_num ,$users_word);
        if ($bytes_written === false) {
            // 失敗した時の処理
            throw new Exception("ファイル書き込みに失敗しました");
        }

    } finally {
        // ファイルが開かれていたら閉じる
        if ($file_num !== false) {
            fclose($file_num);
        }
    }
}

try {
    $users_word =""; 

    // ユーザーからの入力を受け付ける
    input_user($users_word);
    var_dump($users_word);

    // その入力された内容を保存する
    save_input($users_word);

} catch (Exception $e) {
    echo $e->getMessage()."\n";
    // メールを送りたいというならここに一か所だけ書けばいい
  }
