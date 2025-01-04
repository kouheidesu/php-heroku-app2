<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
	<!-- rel?? -->
    <link rel="stylesheet" href="index.css">
	<!-- src? defer? -->
    <script src="index.js" defer></script>
</head>
<body>
    <div class="container">
        <form action="index.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <button type="submit">Submit</button>
        </form>
        <p id="message" class="hidden">Thank you for submitting the form!</p>
        <button id="toggleMessageButton">Toggle Message</button>
    </div>
    <h1>Herokuでメッセージを保存</h1>
    <form method="POST">
        <label for="message">メッセージ:</label>
        <input type="text" name="message" id="message" required>
        <button type="submit">送信</button>
    </form>

    <h2>保存されたメッセージ一覧</h2>
    <ul>
        <?php foreach ($messages as $msg): ?>
            <li><?= htmlspecialchars($msg['message']) ?> (<?= $msg['created_at'] ?>)</li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
