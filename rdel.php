<?php 
if($_GET['rdel'])
{
 include"connection.php";
 $rdel=$_GET['rdel'];
 $q="delete from room_reg where rid='".$rdel."' ";

 $sq=mysqli_query($cn,$q);
	if($sq)
	{
		 header("location:aroom.php");
	}
	else
	{
		echo '<br>'.mysqli_error($cn);
	}	
 }
 else 
 {
 header("location:aroom.php");
 }
?>