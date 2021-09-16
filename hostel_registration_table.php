<?php 
 include"connection.php";
 
 $q="CREATE TABLE hostel_reg (
    HID int(5) primary key auto_increment ,
    HNAME varchar(55) not null,
    HPHONE varchar(17) not null,
    HEMAIL varchar(55) not null unique,
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