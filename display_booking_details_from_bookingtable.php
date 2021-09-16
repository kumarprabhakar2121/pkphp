<h1>display_booking_details_from_bookingtable</h1>
<hr color="red">  mysqli_fetch_row() <hr color="red">
<?php

include"connection.php";

$q="select * from bookingtable";
	$sq=mysqli_query($cn,$q);
	
	if($sq)
	{
		if(mysqli_fetch_row($sq)>0)
			{
					$sq=mysqli_query($cn,$q);
					while($r=mysqli_fetch_row($sq))
					{
						echo '<br><br>  bid '.$r[0];
						echo '  rid '.$r[1];
						echo '  cid '.$r[2];
						echo '  date '.$r[3];
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

$q="select * from bookingtable";
	$sq=mysqli_query($cn,$q);
	
	if($sq)
	{
		if(mysqli_fetch_array($sq)>0)
			{
					$sq=mysqli_query($cn,$q);
					echo '<table border="2" ><tr bgcolor="cyan"> 
					<th> bid </th><th> rid </th> 
					<th> cid</th><th> date </th>
					</tr>';
					while($r=mysqli_fetch_array($sq))
					{
						echo '<tr><th>  '.$r['BID'].'  </th> ';
						echo '  <th> '.$r['RID'].'  </th> ';
						echo '  <th> '.$r['CID'].'  </th> ';
						echo '  <th> '.$r['DATE'].'  </th> ';
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
.m{margin:5px;height:200px;background-color:gray;}
.a{top:5%;left:5%;width:23%;height:45%;position:absolute;}
.b{top:55%;left:5%;width:23%;height:45%;position:absolute;
 background:rgba(12,234,2,0.3);color:white;font-family:chiller;}
 .c{top:5%;left:30%;width:23%;height:90%;position:absolute;
 background:rgba(112,134,22,0.3);color:red;font-family:arial;} 
 .d{top:5%;right:30%;width:23%;height:90%;position:absolute;
 background:rgba(12,34,2,0.3);color:blue;font-family:times new roman;} 
 .e{top:5%;right:5%;width:23%;height:90%;position:absolute;
 background:rgba(12,34,2,0.3);color:white;font-family:chiller;}
</style>
<div class="fluid-container">
<div class="row">
<?php

include"connection.php";

$q="select * from bookingtable,room_reg where bookingtable.rid=room_reg.rid ";
	$sq=mysqli_query($cn,$q);
	
	if($sq)
	{
		if(mysqli_fetch_assoc($sq)>0)
			{
					$sq=mysqli_query($cn,$q);
					while($r=mysqli_fetch_assoc($sq))
					{
						
						echo '<div class="col-md-12">';
							echo'<div class="m">'; 
								echo'<div class="a">'; 
									echo '<img src=" '.$r['RPHOTO'].'" width="100%" height="100%">';
								echo'</div>';	
								echo'<div class="b">'; 
								
						echo '<font color="white">Booking detail </font> <br> Bid '.$r['BID'];
						echo '  Check-in DATE '.$r['DATE'];
						$bdel=$r['BID'];
echo '<br><a href="bdel.php?bdel='.$bdel.' "> delete</a>';
						
							echo'</div>';	
							echo'<div class="c">'; 
						echo '<font color="white">Room detail </font>  RID '.$r['RID'];
						echo '<br>  Room TYPE '.$r['RTYPE'];
						echo ' <br> number of Left '.$r['RNUMBER'];
						echo ' <br> RATE '.$r['RRATE'];
						echo ' <br><font color="pink">Room DETAILS </font>:  '.$r['RDETAIL'];
					
						echo'</div>';	
						
							$hid=$r['HID'];
					//hostel detial	
						
						$q1="select * from hostel_reg where HID='".$hid."'";
	$sq1=mysqli_query($cn,$q1);
	
	if($sq1)
	{
		if(mysqli_fetch_assoc($sq1)>0)
			{
					$sq1=mysqli_query($cn,$q1);
					while($r1=mysqli_fetch_assoc($sq1))
					{
						echo'<div class="d">'; 
						echo '<br><font color="white">hostel detail </font><br>  hid '.$r1['HID'];
						echo ' <br> hname '.$r1['HNAME'];
						echo ' <br> hemail '.$r1['HEMAIL'];
						echo ' <br> hphone '.$r1['HPHONE'];
						echo ' <br> password '.$r1['PASSWORD'];
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

						
						
					// holstel done 	
				
					$CID =$r['CID'];
					// customer 	
						
						
$q2="select * from cust where cid='".$CID."'";
	$sq2=mysqli_query($cn,$q2);
	
	if($sq2)
	{
		if(mysqli_fetch_assoc($sq2)>0)
			{
					$sq2=mysqli_query($cn,$q2);
					while($r2=mysqli_fetch_assoc($sq2))
					{
						echo'<div class="e">'; 	
									echo '<font color="white">Customer detail </font>  cid '.$r2['CID'];
									echo ' <br> cname '.$r2['CNAME'];
									echo ' <br> cemail '.$r2['CEMAIL'];
									echo ' <br> cphone '.$r2['CPHONE'];
									echo ' <br> cpassword '.$r2['PASSWORD'];
									$edel=$r['EID'];
									echo '<br><a href="edel.php?edel='.$edel.' "> delete</a>';
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

						// customer done
						
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