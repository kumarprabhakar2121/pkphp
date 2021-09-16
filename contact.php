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
	        <a class="nav-item nav-link text-white" href="login.php">LOGIN</a>
      <a class="nav-item nav-link text-white" href="creg.php">CUSTOMER SIGNUP</a>
      <a class="nav-item nav-link text-white" href="hreg.php">HOSTEL SIGNUP</a>
      <a class="nav-item nav-link text-white" href="enqreg.php">CONTACT/ENQUIRY</a>
   
    </div>
  </div>
</nav>
<style>
.m{min-height:300px;margin:5px;background-color:pink;padding:10px;}

</style>
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
<div class="fluid-container">
	<div class="row">
			<div class="col-md-8 offset-md-2">
						<div class="m">
					<a style=" text-align: center";><h2><u>	CUSTOMER REGISTRATION FORM </u></h2></a>
							<br><br>
						<form action="" method="POST" >
NAME:
<input type="text" name="n" value="<?php echo $n; ?>">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<span ><?php echo $ns; ?></span>
<br><br>

EMAIL:
<input type="text" name="e" value="<?php echo $e; ?>">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span ><?php echo $es; ?></span>
<br><br>

PHONE:
<input type="text" name="p" value="<?php echo $p; ?>" maxlength="10">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span ><?php echo $ps; ?></span>
<br><br>

PASSWORD:
<input type="text" name="pw" value="<?php echo $pw; ?>">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span ><?php echo $pws; ?></span>
<br><br>

<input type="submit" name="s">
</form>

						</div>
			</div>	
	</div>
</div>	
