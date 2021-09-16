<?php 
if($_GET['h_rdel'])
{
 include"connection.php";
 $h_rdel=$_GET['h_rdel'];
 $q="delete from room_reg where rid='".$h_rdel."' ";

 $sq=mysqli_query($cn,$q);
	if($sq)
	{
		 header("location:hroom.php");
	}
	else
	{
		echo '<br>'.mysqli_error($cn);
	}	
 }
 else 
 {
 header("location:hroom.php");
 }
?>