

<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: /view/home.php");
    exit();
}

// データベース接続情報
$dsn = 'pgsql:host=your-host;port=5432;dbname=your-database';
$user = 'root';
$password = 'gyarmex';

try {
    // データベースへの接続
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL文を実行（テーブルの作成）
    $createTableSQL = "
        CREATE TABLE IF NOT EXISTS users (
            id SERIAL PRIMARY KEY,
            name VARCHAR(100),
            email VARCHAR(100)
        );
    ";
    $pdo->exec($createTableSQL);

    // SQL文を実行（データの挿入）
    $insertSQL = "
        INSERT INTO users (name, email)
        VALUES ('John Doe', 'john@example.com');
    ";
    $pdo->exec($insertSQL);

    echo "テーブルとデータの作成が完了しました。";
} catch (PDOException $e) {
    echo "エラー: " . $e->getMessage();
}

$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : 'Guest';



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
