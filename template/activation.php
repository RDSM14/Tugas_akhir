<?php
include 'db.php';
$msg='00';
if(!empty($_GET['code']) && isset($_GET['code']))
{
	$code=mysqli_real_escape_string($connection,$_GET['code']);

	//$c=mysqli_query($connection,"SELECT uid FROM users WHERE activation='$code'"); //contoh
    $c=mysqli_query($connection,"SELECT email FROM tbl_admin WHERE activation='$code'");
    
	if(mysqli_num_rows($c) >0)
	{

        //$count=mysqli_query($connection,"SELECT uid FROM users WHERE activation='$code' and status='0'"); //contoh
        $count=mysqli_query($connection,"SELECT email FROM tbl_admin WHERE activation='$code' and status='0'");

	if(mysqli_num_rows($count) == 1)
	{
        mysqli_query($connection,"UPDATE tbl_admin SET status='1' WHERE activation='$code'");
        $msg="Your account is activated";	
    }
    else
    {
	   $msg ="Your account is already active, no need to activate again";
    }

    }
    else
    {
	   $msg ="Wrong activation code.";
    }

}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Verifikasi Email</title>
</head>
<body>
	<div id="main">
	<h2><?php echo $msg; ?></h2>
	</div>
</body>
</html>
