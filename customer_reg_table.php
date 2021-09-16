<?php 
 include"connection.php";
 
 $q="CREATE TABLE cust (
    CID int(5) primary key auto_increment ,
    CNAME varchar(55) not null,
    CPHONE varchar(13) not null,
    CEMAIL varchar(55) not null unique,
    PASSWORD varchar(25) not null )";

 $sq=mysqli_query($cn,$q);
	if($sq)
	{
		echo 'created';
	}
	else
	{
		echo '<br>'.mysqli_error($cn);
	}	
 
?>