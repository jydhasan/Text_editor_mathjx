<?php
$conn = new mysqli("localhost", "root", "12405560", "ckeditor4_demo");
$result = $conn->query("SELECT * FROM posts ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Posts</title>
  <!-- MathJax -->
  <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
  <style>
    .post {
      border: 1px solid #ccc;
      padding: 15px;
      margin: 10px 0;
      background: #fafafa;
    }
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      padding: 8px;
    }
  </style>
</head>
<body>
  <h2>Saved Posts</h2>
  <?php while($row = $result->fetch_assoc()): ?>
    <div class="post">
      <?php echo $row['content']; ?>
    </div>
  <?php endwhile; ?>

  <script>
    MathJax.typesetPromise();
  </script>
</body>
</html>
