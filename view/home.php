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
    <form method="POST">
        <label for="message">メッセージ:</label>
        <input type="text" name="messages" id="messages" required>
        <button type="submit">送信</button>
    </form>

    <!-- 保存されたメッセージ一覧 -->
    <h2>保存されたメッセージ一覧</h2>
    <ul>
        <!-- $messagesが空でなければ -->
        <?php if (!empty($messages)): ?>
            <!-- $messagesを$msgとして繰り返す -->
            <?php foreach ($messages as $msg): ?>
                <!-- ここの中身どうなる？ -->
                <li><?= htmlspecialchars($msg['message']) ?> (<?= htmlspecialchars($msg['created_at']) ?>)</li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>メッセージはまだありません。</li>
        <?php endif; ?>
    </ul>
</body>

</html>