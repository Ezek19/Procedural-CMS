<html>
<head>
<title>Process Uploaded File</title>
</head>
<body>
<?php
move_uploaded_file ($_FILES['uploadFile'] ['tmp_name'], 
       "../uploads/{$_FILES['uploadFile'] ['name']}")
?>
</body>
</html>