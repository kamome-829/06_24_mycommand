<?php
$data = $_POST["data"]; // データ受け取り
var_dump($data);
$write_data = "$data\n"; // スペース区切りで最後に改行
$file = fopen('deta/data.txt', 'a'); // ファイルを開く 引数はa
flock($file, LOCK_EX); // ファイルをロック
fwrite($file, $write_data); // データに書き込み，
flock($file, LOCK_UN); // ロック解除
fclose($file); // ファイルを閉じる
//header("Location:index.php");

$str = ''; // 出力用の空の文字列
$file = fopen('deta/data.txt', 'r'); // ファイルを開く（読み取り専用）
flock($file, LOCK_EX); // ファイルをロック
if ($file) {
    while ($line = fgets($file)) { // fgets()で1行ずつ取得→$lineに格納
        $str .= "<tr><td>{$line}</td></tr>"; // 取得したデータを$strに入れる
    }
}
flock($file, LOCK_UN); // ロック解除
fclose($file);
