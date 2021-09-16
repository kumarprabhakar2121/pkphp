<?php
$n=$ns=$p=$ps=$e=$es=$msg=$msgs='';
function ncheck()
{
	$n=trim($_POST['n']);
	$nc='/^[a-zA-Z ]*$/';
	
	if(preg_match($nc,$n) && strlen($n)>0)
	{
		return 'y';
	}
	else 
	{
		return 'n';
	}
} 
//mail    '/^[a-zA-Z0-9._-]*\@[A-Za-z0-9]*\.[a-zA-Z.]{2,6}$/';

function echeck()
{
	$e=trim($_POST['e']);
	$ec='/^[a-zA-Z0-9._-]*\@[A-Za-z0-9]*\.[a-zA-Z.]{2,6}$/';
	
	if(preg_match($ec,$e) && strlen($e)>0)
	{
		return 'y';
	}
	else 
	{
		return 'n';
	}
} 

function phcheck()
{
	$p=trim($_POST['p']);
		if(preg_match('/^[0-9]{10,13}$/',$p))
		{
			return 'y';
		}
		else
		{
			return 'n';
		}
		

}
function msgcheck()
{
	$msg=trim($_POST['msg']);
	if(strlen($msg)>10)
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
	if(ncheck()=='y')
	{
		$n=trim($_POST['n']);
	}
	else 
	{
		$ns='*** check name *** ';
	}
	
    if(echeck()=='y')
	{
		$e=trim($_POST['e']);
	}
	else 
	{
		$es='*** check email *** ';
	}

	if(msgcheck()=='y')
	{
		$msg=trim($_POST['msg']);
	}
	else 
	{
		$msgs="*** check address **";
	}
	
	if(phcheck()=='y')
	{
		$p=($_POST['p']);
	}
	else 
	{
		$ps="** check phone no **";
	}	


	if(ncheck()=='y' && phcheck()=='y' && msgcheck()=='y'  && echeck()=='y')
	{
				include"connection.php";
 
			$q="insert into  enquiry (NAME ,  EMAIL , PHONE , MESSAGE  )
			values('".$n."','".$e."','".$p."','".$msg."')";
			
			$sq=mysqli_query($cn,$q);
				if($sq)
				{
					echo '<script>alert("thanks for enquiry")</script>';
					$n=$ns=$e=$es=$p=$ps=$msg=$msgs='';
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

<form action="" method="POST" >
name:
<input type="text" name="n" value="<?php echo $n; ?>">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span ><?php echo $ns; ?></span>
<br><br>

email:
<input type="text" name="e" value="<?php echo $e; ?>">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span ><?php echo $es; ?></span>
<br><br>

phone:
<input type="text" name="p" value="<?php echo $p; ?>">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span ><?php echo $ps; ?></span>
<br><br>

enter message [at least 10 character ]
<textarea name="msg"><?php echo $msg; ?></textarea>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span > <?php echo $msgs; ?></span>
<br><br>

<input type="submit" name="s">
</form>




