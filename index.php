<?php
// PHP部分: フォームのデータを処理
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = htmlspecialchars($_POST['name']); // ユーザー入力を安全に処理
	$message = "こんにちは、" . $name . " さん！";
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>簡易アプリ</title>
	<style>
		/* CSS部分 */
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f9;
			margin: 0;
			padding: 20px;
			text-align: center;
		}

		h1 {
			color: #333;
		}

		form {
			margin-top: 20px;
		}

		input[type="text"] {
			padding: 10px;
			width: 300px;
			border: 1px solid #ccc;
			border-radius: 5px;
			font-size: 16px;
		}

		button {
			padding: 10px 20px;
			margin-top: 10px;
			border: none;
			background-color: #007BFF;
			color: white;
			font-size: 16px;
			border-radius: 5px;
			cursor: pointer;
		}

		button:hover {
			background-color: #0056b3;
		}

		.message {
			margin-top: 20px;
			font-size: 18px;
			color: #007BFF;
		}
	</style>
</head>

<body>
	<h1>PHPで作る簡易アプリ</h1>
	<form method="POST" action="">
		<input type="text" name="name" placeholder="名前を入力してください" required>
		<button type="submit">送信</button>
	</form>

	<div class="message">
		<?php if ($message): ?>
			<p><?php echo $message; ?></p>
		<?php endif; ?>
	</div>

	<script>
		// JavaScript部分: アラートを表示
		document.querySelector('form').addEventListener('submit', function(event) {
			const input = document.querySelector('input[name="name"]');
			if (input.value.trim() === '') {
				alert('名前を入力してください！');
				event.preventDefault();
			}
		});
	</script>
</body>

</html>