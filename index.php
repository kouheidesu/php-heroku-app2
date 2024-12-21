<?php
// PHP部分: フォームのデータを処理
header("Location: /index.html");
exit();

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = htmlspecialchars($_POST['name']); // ユーザー入力を安全に処理
	$message = "こんにちは、" . $name . " さん！";
}
