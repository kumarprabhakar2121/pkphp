<?php 
if(isset($_POST['s']))
{
	$id=$_POST['n'];
	$p=$_POST['p'];
		if($id=='argus' && $p=='academy')
	{
	session_start();
	$_SESSION['aid']=session_id();
	
	$_SESSION['a']=$id;

	
	header("location:admin.php");

	}
	else
	{
	
	// hostel check
	
	
include"connection.php";

$q="select * from hostel_reg where HEMAIL='".$id."' and  PASSWORD='".$p."' ";
	$sq=mysqli_query($cn,$q);
	
	if($sq)
	{
		if(mysqli_fetch_assoc($sq)>0)
		{
					session_start();
					$_SESSION['hid']=session_id();
	
					$_SESSION['h']=$id;

	
					header("location:hostel.php");
		}
		else
		{
				//checking customer 
				
				
				include"connection.php";
				
				$q="select * from cust where CEMAIL='".$id."' and  PASSWORD='".$p."' ";
					$sq=mysqli_query($cn,$q);
					
					if($sq)
					{
						if(mysqli_fetch_row($sq)>0)
							{
									
									session_start();
									$_SESSION['cid']=session_id();
	
									$_SESSION['c']=$id;

	
									header("location:custom.php");
									
									
									
							}
							else
							{
								header("location:login.php");
							}
					}
					else 
					{
						echo '<br>'.mysqli_error($cn);
					}
				
				
				
				
				
				
		}
	}
	else 
	{
		echo '<br>'.mysqli_error($cn);
	}

	
	// hostel check end 
	
	
	
	
	
	}
}
else
{
	header("location:login.php");
}

?>