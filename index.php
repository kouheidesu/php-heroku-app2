<?php
// PHP部分: フォームのデータを処理
// header("Location: /index.html");
// exit();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = htmlspecialchars($_POST['name']);
	echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Form Submission</title>
    </head>
    <body>
        <h1>Hello, " . $name . "!</h1>
        <a href='index.html'>Go Back</a>
    </body>
    </html>";
}
