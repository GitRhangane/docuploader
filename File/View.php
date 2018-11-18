<?php
require 'uploads.php';
$myfile=scandir('uploads');
for($a=2;$a<count($myfile);$a++)
{
	?>
<p>
<a href ="uploads/<?php echo $myfile[$a]?>"><?php echo $myfile[$a]?>
</p>
<?php	
}
 


