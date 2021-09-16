<?php 
 include"connection.php";
 
 $q="CREATE TABLE room_reg (
    RID int(5) primary key auto_increment ,
    RTYPE varchar(55) not null,
    RNUMBER int(13) not null,
    RPHOTO varchar(503) not null,
    RRATE int(5) not null,
	HID int(5) not null,
    RDETAIL varchar(105) not null )";

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