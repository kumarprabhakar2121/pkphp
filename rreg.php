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
    
      <a class="nav-item nav-link text-white" href="index.php">HOME</a>
      <a class="nav-item nav-link text-white" href="creg.php">CUSTOMER SIGNUP</a>
   
    </div>
  </div>
</nav>
<style>
.m{min-height:300px;margin:5px;background-color:pink;padding:10px;}

</style>
<?php
$lis=$rr=$rl=$ds=$rrs=$rls=$dss=$ty=$e=$hid=$hids='';
 

function dscheck()
{
	$ds=trim($_POST['ds']);
	if(strlen($ds)>10)
	{
		return 'y';
	}
	else 
	{
		return 'n';
	}	
}

function rlcheck()
{
	$rl=trim($_POST['rl']);
	if(preg_match('/^[0-9]{1,3}$/',$rl))
	{
		return 'y';
	}
	else 
	{
		return 'n';
	}	
}

function rrcheck()
{
	$rr=trim($_POST['rr']);
	if(preg_match('/^[0-9]{1,4}$/',$rr))
	{
		return 'y';
	}
	else 
	{
		return 'n';
	}	
}

function licheck()
{	
	$x=$_FILES['li']['name'];
	$xn=strpos($x,".");
	$xna=substr($x,$xn+1,strlen($x));
	
	$photo =array('jpg','png','bmp','gif');
	
	if(in_array($xna,$photo ))
	{
		return 'y';
	}
	
	else 
	{
		return 'n';
	}

}

if(isset($_POST['s']))
{
	if(rlcheck()=='y')
	{
		$rl=trim($_POST['rl']);
	}
	else 
	{
		$rls="*** check  **";
	}
	if(rrcheck()=='y')
	{
		$rr=trim($_POST['rr']);
	}
	else 
	{
		$rrs="*** check  **";
	}
	if(dscheck()=='y')
	{
		$ds=trim($_POST['ds']);
	}
	else 
	{
		$dss="*** check  **";
	}

	
	if(licheck()=='y')
	{
		$li=$_FILES['li']['name'];
		$tpd=$_FILES['li']['tmp_name'];
		$ftpd='load/'.uniqid().$li;
	}
	else 
	{
		$lis="** check **";
	}

	if(licheck()=='y' && rlcheck()=='y' && rrcheck()=='y' && dscheck()=='y' )
	{
	$ty=$_POST['ty'];
		include"connection.php";
			$q="insert into  room_reg (RTYPE ,  RNUMBER , RRATE , RDETAIL,RPHOTO ,HID )
			values('".$ty."','".$rl."','".$rr."','".$ds."','".$ftpd."','2')";
			
			$sq=mysqli_query($cn,$q);
				if($sq)
				{
				move_uploaded_file($tpd,$ftpd);
				
				echo '<script>alert("regesterd")</script>';
				$e=$es=$lis=$rr=$rl=$ds=$rrs=$rls=$dss='';
 
				}
				else
				{
					echo '<br>'.mysqli_error($cn);
				}	
	
		
		
	}
	else
	{
			echo '<script>alert("**********check the dtails***********")</script>';
	}

}

?>
<div class="fluid-container">
	<div class="row">
			<div class="col-md-8 offset-md-2">
						<div class="m">
					<hr>
<hr><a style=" text-align: center";><h2><u>ROOM REGISTRATION TABLE</u></h2></a><hr>

<form action="" method="POST" enctype="multipart/form-data">

TYPE OF ROOM
<select name="ty">
	<option value="single-ac">single ac</option>
	<option value="single-non-ac">single non ac </option>
	<option value="double-ac">double ac </option>
	<option value="double-non-ac">double non ac</option>
</select> 
<br><br>

ROOM NUMBER LEFT 
<input type="text" name="rl"  maxlength="4" value="<?php echo $rl; ?>">
<span > <?php echo $rls; ?></span><br>
<br>
ROOM RATE 
<input type="text" name="rr" maxlength="4" value="<?php echo $rr; ?>">
<span > <?php echo $rrs; ?></span><br>
<br>
<br>


ROOM DESCRIPTION /detail
<input type="text" name="ds" value="<?php echo $ds; ?>">
<span > <?php echo $dss; ?></span><br>
<br>
<br>
ROOM PHOTO load image :
<input type="file" name="li">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span > <?php echo $lis; ?></span>
<br><br>

<input type="submit" name="s">
</form>

						</div>
			</div>	
	</div>
</div>