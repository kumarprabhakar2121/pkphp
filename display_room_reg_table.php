<h1>display_registered_room_table</h1>

<hr color="red">  mysqli_fetch_row() <hr color="red">
<?php

include"connection.php";

$q="select * from room_reg";
	$sq=mysqli_query($cn,$q);
	
	if($sq)
	{
		if(mysqli_fetch_row($sq)>0)
			{
					$sq=mysqli_query($cn,$q);
					while($r=mysqli_fetch_row($sq))
					{
						echo '	<br><br>  rid '.$r[0];
						echo '  ||room type 	--	  '.$r[1];
						echo '  ||room left 	--	  '.$r[2];
						echo '  ||room photo 	<img src="'.$r[3].'" width="100" hieght="100">';
						echo '  ||room rate    --    '.$r[4];
						echo '  ||hid              --   '.$r[5];
						echo '  ||room detail  --    '.$r[6];

					}
			}
			else
			{
				echo '<br> no record found ';
			}
	}
	else 
	{
		echo '<br>'.mysqli_error($cn);
	}

?>

<hr color="red">  mysqli_fetch_array() <hr color="red">
<?php

include"connection.php";

$q="select * from room_reg " ;
	$sq=mysqli_query($cn,$q);
	
	if($sq)
	{
		if(mysqli_fetch_array($sq)>0)
			{
					$sq=mysqli_query($cn,$q);
					echo '<table border="2" ><tr bgcolor="cyan"> 
					<th> rid </th><th> room type </th> 
					<th> rooom left </th><th> room photo </th> <th> room rate</th>
					<th> hid</th><th> room details</th>
					</tr>';
					while($r=mysqli_fetch_array($sq))
					{
						echo '<tr><th>  '.$r['RID'].'  </th> ';
						echo '  <th> '.$r['RTYPE'].'  </th> ';
						echo '  <th> '.$r['RNUMBER'].'  </th> ';
						echo '  <th><img src=" '.$r['RPHOTO'].'" width="50" height="50">  </th> ';
						echo '  <th> '.$r['RRATE'].'  </th> ';
						echo '  <th> '.$r['HID'].'  </th> ';
						echo '  <th> '.$r['RDETAIL'].'  </th> ';
					}
					echo'</table>';
			}
			else
			{
				echo '<br> no record found ';
			}
	}
	else 
	{
		echo '<br>'.mysqli_error($cn);
	}

?>


<hr color="red">  mysqli_fetch_assoc() <hr color="red">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<style>
.m{margin:5px;height:300px;background-color:gray;}
.a{top:5%;left:5%;width:45%;height:90%;position:absolute;}
.b{top:5%;right:5%;width:45%;height:90%;position:absolute;
 background:rgba(12,34,222 ,0.3);color:white;font-family:forte;}
</style>
<div class="fluid-container">
<div class="row">
<?php

include"connection.php";

$q="select * from room_reg,hostel_reg where room_reg.hid=hostel_reg.hid";
	$sq=mysqli_query($cn,$q);
	
	if($sq)
	{
		if(mysqli_fetch_assoc($sq)>0)
			{
					$sq=mysqli_query($cn,$q);
					while($r=mysqli_fetch_assoc($sq))
					{
					
					echo '<div class="col-md-6">';
							echo'<div class="m">'; 
								echo'<div class="a">'; 
									echo '<img src=" '.$r['RPHOTO'].'" width="100%" height="100%">';
								echo'</div>';	
								echo'<div class="b">'; 
						echo ' Rid '.$r['RID'];
						echo '<br>  Room TYPE '.$r['RTYPE'];
						echo ' <br> number of Left '.$r['RNUMBER'];
						echo ' <br> RATE '.$r['RRATE'];
						echo ' <br><font color="pink">Room DETAILS </font>:  '.$r['RDETAIL'];
						
						echo ' <br> HID '.$r['HID'];
						echo ' <br> hostel name '.$r['HNAME'];
						echo ' <br> hostel email '.$r['HEMAIL'];
						echo ' <br> hostel Phone '.$r['HPHONE'];
						
						
							$rdel=$r['RID'];
							echo '<br><a href="rdel.php?rdel='.$rdel.' "> delete</a>';
								echo'</div>';
							echo'</div>';	
					echo'</div>';	
					
					
					
						
					}
			}
			else
			{
				echo '<br> no record found ';
			}
	}
	else 
	{
		echo '<br>'.mysqli_error($cn);
	}

?>

</div></div>