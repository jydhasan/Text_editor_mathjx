<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CKEditor 4 + Preview</title>
  <script src="https://cdn.ckeditor.com/4.22.1/full-all/ckeditor.js"></script>
  <!-- MathJax -->
  <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
  <style>
    #previewBox {
      display: none;
      border: 1px solid #ccc;
      padding: 15px;
      margin-top: 15px;
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
  <h2>Create Post</h2>
  <form method="POST" action="save.php" onsubmit="return confirmSave();">
    <textarea name="content" id="editor">
      Example: \(x^2+y^2=z^2\)
    </textarea>
    <br>
    <button type="button" onclick="showPreview()">Preview</button>
    <button type="submit">Save</button>
  </form>

  <!-- Preview Box -->
  <div id="previewBox">
    <h3>Live Preview</h3>
    <div id="previewContent"></div>
  </div>

  <script>
    CKEDITOR.replace('editor', {
      extraPlugins: 'mathjax',
      mathJaxLib: 'https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js',
      filebrowserUploadUrl: 'upload.php',
      filebrowserUploadMethod: 'form',
      height: 300
    });

    // Preview function
    function showPreview() {
      const data = CKEDITOR.instances.editor.getData();
      document.getElementById("previewContent").innerHTML = data;
      document.getElementById("previewBox").style.display = "block";
      MathJax.typesetPromise(); // Render math
    }

    // Optional: Confirm before save
    function confirmSave() {
      return confirm("Are you sure you want to save this post?");
    }
  </script>
</body>
</html>
