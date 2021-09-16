<?php 
session_start();
if(	$_SESSION['cid']!=session_id())
{
header("location:login.php");
}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>


<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <a class="navbar-brand text-white" href="#"><b>HOSTEL KHOJ</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    
      <a class="nav-item nav-link text-white"  href="end.php">logout<a>
      <a class="nav-item nav-link text-white" href="custom.php">CUSTOMER PROFILE</a>
      <a class="nav-item nav-link text-white" href="croom.php">ROOM</a>
      <a class="nav-item nav-link text-white" href="chostel.php">HOSTEL</a>
	     <a class="nav-item nav-link text-white" href="cbook.php">BOOKING</a>
   
    </div>
  </div>
</nav>
<style>
.m{min-height:300px;margin:5px;background-color:pink;padding:10px;}

</style>

<div class="fluid-container">
	<div class="row">
			<div class="col-md-8 offset-md-2">
						<div class="z
">
<?php 
	$c=$_SESSION['c'];
	echo 'welcome ' .$c;
?>
</div>
</div>
</div>
</div>
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
