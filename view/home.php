<!DOCTYPE html>
<html lang="en">
<!-- phpに関して、入力フォーム内容を表示するにあたって2つのコードが混じっている気がする -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
    <link rel="stylesheet" href="index.css">
    <script src="index.js" defer></script>
</head>

<body>
    <?php
    // メッセージを保存するための配列（通常はデータベースを使用）
    $messages = [];

    // フォームが送信されたかどうかを確認
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // 'message' フィールドのデータを取得
        $newMessage = $_POST['message'] ?? null;


        if ($newMessage) {
            // メッセージと作成日時を保存
            $messages[] = [
                'message' => htmlspecialchars($newMessage),
                'created_at' => date('Y-m-d H:i:s'),
            ];
        }
    }
    ?>

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