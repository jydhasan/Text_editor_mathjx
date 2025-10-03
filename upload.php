<?php
if (isset($_FILES['upload'])) {
    $file = $_FILES['upload'];
    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) mkdir($uploadDir);

    $fileName = time() . "_" . basename($file['name']);
    $targetFile = $uploadDir . $fileName;

    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        $funcNum = $_GET['CKEditorFuncNum'];
        $url = $targetFile;
        $message = '';
        echo "<script>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
    }
}
?>
