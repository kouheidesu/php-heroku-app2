

<?php
// POSTでなければhome.phpに遷移
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: /view/home.php");
    exit();
}
// データベースに接続した際の処理が必要？
// データベース接続情報
$dsn = getenv('DB_DSN');
$user = getenv('DB_USER');
$password = getenv('DB_PASSWORD');

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('データベース接続失敗: ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newMessage = $_POST['message'] ?? null;

    if ($newMessage) {
        try {
            $stmt = $pdo->prepare('INSERT INTO messages (message, created_at) VALUES (:message, :created_at)');
            $stmt->execute([
                ':message' => htmlspecialchars($newMessage),
                ':created_at' => date('Y-m-d H:i:s'),
            ]);
        } catch (PDOException $e) {
            die('メッセージの保存に失敗しました: ' . $e->getMessage());
        }
    }
}

$messages = [];
try {
    $stmt = $pdo->query('SELECT * FROM messages ORDER BY created_at DESC');
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('メッセージの取得に失敗しました: ' . $e->getMessage());
}
?>

