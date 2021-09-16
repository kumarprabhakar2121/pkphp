<hr>
<h1 >display_registered_hostel_details_from_table</h1><hr>
<br>
<hr color="red">  mysqli_fetch_row() <hr color="red">
<?php

include"connection.php";

$q="select * from hostel_reg";
	$sq=mysqli_query($cn,$q);
	
	if($sq)
	{
		if(mysqli_fetch_row($sq)>0)
			{
					$sq=mysqli_query($cn,$q);
					while($r=mysqli_fetch_row($sq))
					{
						echo '<br><br>  cid '.$r[0];
						echo '  hname '.$r[1];
						echo '  hemail '.$r[2];
						echo '  hphone '.$r[3];
						echo '  password '.$r[4];
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

$q="select * from hostel_reg";
	$sq=mysqli_query($cn,$q);
	
	if($sq)
	{
		if(mysqli_fetch_array($sq)>0)
			{
					$sq=mysqli_query($cn,$q);
					echo '<table border="2" ><tr bgcolor="cyan"> 
					<th> hid </th><th> name </th> 
					<th> email </th><th> phone </th> <th> password</th>
					</tr>';
					while($r=mysqli_fetch_array($sq))
					{
						echo '<tr><th>  '.$r['HID'].'  </th> ';
						echo '  <th> '.$r['HNAME'].'  </th> ';
						echo '  <th> '.$r['HEMAIL'].'  </th> ';
						echo '  <th> '.$r['HPHONE'].'  </th> ';
						echo '  <th> '.$r['PASSWORD'].'  </th> <tr>';
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
.m{margin:5px;height:210px;background-color:yellow;}
.a{top:5%;left:10%;width:90%;height:33%;position:absolute;}

</style>
<div class="fluid-container">
<div class="row">


<?php

include"connection.php";

$q="select * from hostel_reg";
	$sq=mysqli_query($cn,$q);
	
	if($sq)
	{
		if(mysqli_fetch_assoc($sq)>0)
			{
					$sq=mysqli_query($cn,$q);
					while($r=mysqli_fetch_assoc($sq))
					{
					
						echo '<div class="col-md-4">';
							echo'<div class="m">'; 
								echo'<div class="a">'; 
											echo '<h5><u>HOSTEL DETAILS</u></h5>';
											echo '	  HOSTEL ID:-'.$r['HID'];
											echo '	<br>   NAME:- '.$r['HNAME'];
											echo '	<br>   EMAIL :-'.$r['HEMAIL'];
											echo '	<br>  PHONE:- '.$r['HPHONE'];
											echo '	<br>  PASSWORD :-'.$r['PASSWORD'];
											$hdel=$r['HID'];
											echo '<br><a href="hdel.php?hdel='.$hdel.' "> delete</a>';
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