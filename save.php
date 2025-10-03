<?php
$conn = new mysqli("localhost", "root", "12405560", "ckeditor4_demo");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$content = $_POST['content'] ?? '';

if (!empty($content)) {
    $stmt = $conn->prepare("INSERT INTO posts (content) VALUES (?)");
    $stmt->bind_param("s", $content);
    $stmt->execute();
    $stmt->close();
    echo "✅ Post saved! <a href='view.php'>View Posts</a>";
} else {
    echo "⚠️ Content empty!";
}
$conn->close();
?>
