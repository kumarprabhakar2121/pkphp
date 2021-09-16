<?php 
$server="localhost:3306"; //same 
$user="root"; // same 
$password="argus";  // mysql password 

	$cn=mysqli_connect($server,$user,$password);
	
	if($cn)
	{
			$q="create database peda";
			
			$sq=mysqli_query($cn,$q);
			if($sq)
			{
				echo 'create';
			}
			else 
			{
				echo'<br>'.mysqli_error($cn);
			}
	}
	else 
	{
		echo '<br>'.myqli_connect_error();
		echo '<br>'.myqli_connect_errno();
	}

?>