<?php 
$server="localhost:3306";
$user="root";
$password="argus";
$database="peda";
	$cn=mysqli_connect($server,$user,$password,$database);
	
	if(!$cn)
	{
		echo '<br>'.mysqli_connect_error();
		echo '<br>'.mysqli_connect_errno();
	}

?>