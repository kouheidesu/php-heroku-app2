

<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	header("Location: view/index.php");
	// exit();
}

$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : 'Guest';

// try {
// 	// データベース接続情報
// 	$dsn = 'mysql:host=localhost;dbname=testdb;charset=utf8mb4';
// 	$username = 'root';
// 	$password = 'password';

// 	// PDOインスタンスを作成
// 	$pdo = new PDO($dsn, $username, $password);

// 	// エラーモードを例外に設定
// 	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 	// データベース操作を追加する場合はここに記述
// } catch (PDOException $e) {
// 	echo "接続エラー: " . $e->getMessage();
// 	exit(); // エラーが発生した場合は処理を終了
// }

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
