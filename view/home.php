<?php
// データベース接続とメッセージ取得処理
try {
    // データベース接続情報
    $dsn = 'mysql:host=localhost;dbname=testdb;charset=utf8mb4';
    $username = 'root'; // Herokuの場合、環境変数から取得する必要あり
    $password = 'password';

    // PDOインスタンスを作成
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // フォームが送信された場合の処理
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
        $message = htmlspecialchars($_POST['message']);
        $stmt = $pdo->prepare("INSERT INTO messages (message) VALUES (:message)");
        $stmt->execute([':message' => $message]);
        header("Location: index.php");
        exit();
    }

    // メッセージを取得
    $stmt = $pdo->query("SELECT * FROM messages ORDER BY created_at DESC");
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("データベース接続エラー: " . $e->getMessage());
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
    <link rel="stylesheet" href="index.css">
    <script src="index.js" defer></script>
</head>

<body>
    <!-- 最初のフォーム -->
    <div class="container">
        <form action="index.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <button type="submit">Submit</button>
        </form>
        <p id="message" class="hidden">Thank you for submitting the form!</p>
        <button id="toggleMessageButton">Toggle Message</button>
    </div>

    <!-- メッセージ保存フォーム -->
    <h1>Herokuでメッセージを保存</h1>
    <form method="POST">
        <label for="message">メッセージ:</label>
        <input type="text" name="message" id="message" required>
        <button type="submit">送信</button>
    </form>

    <!-- 保存されたメッセージ一覧 -->
    <h2>保存されたメッセージ一覧</h2>
    <ul>
        <?php if (!empty($messages)): ?>
            <?php foreach ($messages as $msg): ?>
                <li><?= htmlspecialchars($msg['message']) ?> (<?= htmlspecialchars($msg['created_at']) ?>)</li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>メッセージはまだありません。</li>
        <?php endif; ?>
    </ul>
</body>

</html>