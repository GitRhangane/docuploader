<?php
include('../models/db.php');
if(isset($_GET["id"])){
	
	$id =$_GET['id'];
	$stat=$db->prepare('select * from data where id=?');
	$stat->execute();
	$data=$stat->fetch();
    $file ='uploads/'.$data['filename'];
           // Process download
        if(file_exists($file)) {
            header('Content-name: '.$data['name']);
            header('Content-type: '.$data['type']);
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: '.$data['expire']);
            header('Cache-Control:'.$data['cache']);
            header('Pragma:'.$data['Pragma']);
            header('Content-Length: ' .size($file));
            readfile($file);
            exit;
        }
    }
	else{
		echo "File does not exist.";
	}

?>