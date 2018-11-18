<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: \P3\login.php');
	}
?>
<?php  if (isset($_SESSION['username'])) : ?>
	
			
		<?php endif ?>
<?php

$dbh = new PDO("mysql:host=localhost;dbname=docuploader","root","");
if(isset($_POST['btn']))
{
    include('\P3\sever.php');
	
	$username =$_SESSION['username'];
	$name =$_FILES['myfile']['name'];
	$type =$_FILES['myfile']['type'];
	$size =$_FILES['myfile']['size']/1024;
	$data = file_get_contents($_FILES['myfile']['tmp_name']);
	$dates = date('Y-m-d H:i:s');
	$myfile =$_FILES['myfile'];
	$fileError =$_FILES['myfile']['error'];
	$fileExt = explode('.',$name);
	$fileActualExt = strtolower(end($fileExt));
	$allowed = array('doc','docx','xlsx','csv','text');
	move_uploaded_file($myfile['tmp_name'],'uploads/'.$myfile['name']);
	
	
	$stmt =$dbh->prepare("insert into data values('',?,?,?,?,?,?)");
	if(in_array($fileActualExt,$allowed))
	{
		if($fileError==0)
		{
			if($size<1000000)
			{
				$fileNameNew= uniqid('',true).".".$fileActualExt;
				$stmt->bindParam(1,$username);
			    $stmt->bindParam(2,$name);
	            $stmt->bindParam(3,$type);
	            $stmt->bindParam(4,$size);
				$stmt->bindParam(5,$data, PDO::PARAM_LOB);
				$stmt->bindParam(6,$dates);
				$stmt->execute();
	            header("Location:index.php");
			}
			else
			{
				
				 ?>
        <h3>This file is too big!...<a href="insert.php">Click here to try again.</a></h3>
        <?php
			}
		}
		else
		{
			
			 ?>
        <h3>An error ocuured while  uploding file.try again!...<a href="insert.php">Click here to try again.</a></h3>
        <?php
		}
}
else{
	     ?>
        <h3>You cannot upload file of this type.upload DOC,DOCX,XLXS,CSV,TEXT...<a href="insert.php">Click here to try again.</a></h3>
        <?php
	
}

}
?>

