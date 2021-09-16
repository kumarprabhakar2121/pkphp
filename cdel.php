<?php 
if($_GET['cdel'])
{
 include"connection.php";
 $cdel=$_GET['cdel'];
 $q="delete from cust where cid='".$cdel."' ";

 $sq=mysqli_query($cn,$q);
	if($sq)
	{
		 header("location:acust.php");
	}
	else
	{
		echo '<br>'.mysqli_error($cn);
	}	
 }
 else 
 {
 header("location:acust.php");
 }
?>+