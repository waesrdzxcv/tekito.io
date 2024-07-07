<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bbs";

// データベース接続
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続確認
if ($conn->connect_error) {
    die("接続失敗: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);

    $sql = "INSERT INTO threads (title, content) VALUES ('$title', '$content')";

    if ($conn->query($sql) === TRUE) {
        echo "スレッドが作成されました。";
    } else {
        echo "エラー: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
