<?php

// $file = fopen('deta/data.txt', 'w'); // ファイルを開く 引数はa
// flock($file, LOCK_EX); // ファイルをロック
// fwrite($file, ""); // データに書き込み，
// flock($file, LOCK_UN); // ロック解除
// fclose($file); // ファイルを閉じる

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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/main.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>web command prompt</title>
</head>

<body>
    <main>
        <div class="top">
            <h1>my command</h1>
        </div>
        <div class="command">
            <div class="text"><?= $str ?></div>
        </div>
        <div class="in_command">
            <textarea id="terminal" rows="5" cols="20" spellcheck="false"></textarea>
        </div>
    </main>
</body>

</html>