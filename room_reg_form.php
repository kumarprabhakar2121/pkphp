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
<hr>ROOM REGISTRATION TABLE<hr>

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
