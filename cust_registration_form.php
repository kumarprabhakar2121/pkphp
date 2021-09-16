<?php
$n=$ns=$e=$es=$p=$ps=$pw=$pws='';
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
		if(preg_match('/^[0-9]{10,10}$/',$p))
		{
			return 'y';
		}
		else
		{
			return 'n';
		}
}
function pwcheck()
{
		$pw=trim($_POST['pw']);
		
		if(strlen($pw)>=5)
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

	if(phcheck()=='y')
	{
		$p=($_POST['p']);
	}
	else 
	{
		$ps="** check phone no **";
	}	

	if(pwcheck()=='y')
	{
		$pw=($_POST['pw']);
	}
	else 
	{
		$pws="** check password **";
	}	


	if(ncheck()=='y' && echeck()=='y' && phcheck()=='y' && pwcheck()=='y')
	{
		include"connection.php";
 
			$q="insert into  cust (CNAME ,  CPHONE , CEMAIL , PASSWORD  )
			values('".$n."','".$p."','".$e."','".$pw."')";
			
			$sq=mysqli_query($cn,$q);
				if($sq)
				{
					echo '<script>alert("regesterd")</script>';
					$n=$ns=$e=$es=$p=$ps=$pw=$pws='';
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
CUSTOMER REGISTRATION FORM
<br><br>
<form action="" method="POST">
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
<input type="text" name="p" value="<?php echo $p; ?>" maxlength="10">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span ><?php echo $ps; ?></span>
<br><br>

password:
<input type="text" name="pw" value="<?php echo $pw; ?>">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span ><?php echo $pws; ?></span>
<br><br>

<input type="submit" name="s">
</form>
