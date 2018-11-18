<!DOCTYPE html>
<html>
<head>
<title>File Uploading</title>
<link rel="stylesheet" href="../css/stylee.css" type="text/css" />
</head>
<body>
<div id="header">
<label>Upload File</label>
</div>
<div id="body">
	<form action="uploads.php" method ="post" enctype ="multipart/form-data" >
     Choose file: <input type ="file" name="myfile"/>
     <button name="btn">upload</button>
    </form>
</div>
<div id="footer">
</div>
</body>
</html>


