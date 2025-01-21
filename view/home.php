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
    <!-- メッセージ保存フォーム -->
    <h1>Herokuでメッセージを保存</h1>
    <form action="index.php" method="POST">
        <label for="message">メッセージ:</label>
        <input type="text" name="message" id="message" required>
        <button type="submit">送信</button>
    </form>

    <!-- // another_file.php -->
    <?php
    include '/view/home.php'; // または require 'messages.php';

    // $messages を利用
    foreach ($messages as $message) {
        echo "メッセージ: " . $message['message'] . " 日時: " . $message['created_at'] . "<br>";
    }
    ?>


    <!-- 保存されたメッセージ一覧 -->
    <h2>保存されたメッセージ一覧</h2>
    <ul>
        <!-- $messagesが空でなければ -->
        <?php if (!empty($messages)): ?>
            <!-- $messagesを$msgとして繰り返す -->
            <?php foreach ($messages as $msg): ?>

                <li><?= htmlspecialchars($msg['message']) ?> (<?= htmlspecialchars($msg['created_at']) ?>)</li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>メッセージはまだありません。</li>
        <?php endif; ?>
    </ul>
</body>

</html>