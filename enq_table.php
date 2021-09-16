<?php 
 include"connection.php";
 
 $q="CREATE TABLE enquiry (
    EID int(5) primary key auto_increment ,
    NAME varchar(55) not null,
    EMAIL varchar(55) not null ,
    PHONE varchar(13) not null,
    MESSAGE varchar(103) not null )";

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