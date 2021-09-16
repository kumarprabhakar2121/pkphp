<?php 
if($_GET['hdel'])
{
 include"connection.php";
 $hdel=$_GET['hdel'];
 $q="delete from hostel_reg where hid='".$hdel."' ";

 $sq=mysqli_query($cn,$q);
	if($sq)
	{
		 header("location:ahostel.php");
	}
	else
	{
		echo '<br>'.mysqli_error($cn);
	}	
 }
 else 
 {
 header("location:ahostel.php");
 }
?>