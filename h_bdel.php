<?php 
if($_GET['bdel'])
{
 include"connection.php";
 $bdel=$_GET['bdel'];
 $q="delete from bookingtable where bid='".$bdel."' ";

 $sq=mysqli_query($cn,$q);
	if($sq)
	{
		 header("location:hbook.php");
	}
	else
	{
		echo '<br>'.mysqli_error($cn);
	}	
 }
 else 
 {
 header("location:hbook.php");
 }
?>