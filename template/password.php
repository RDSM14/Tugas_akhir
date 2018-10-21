<?php
include 'db.php';
$msg='00';
if(!empty($_GET['code']) && isset($_GET['code']))
{
    //$password = rand(10000000,100000000);
    $char = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $password = substr(str_shuffle($char),0,8);
    $updatepassword = md5($password);
	$code=mysqli_real_escape_string($connection,$_GET['code']);

	//$c=mysqli_query($connection,"SELECT uid FROM users WHERE activation='$code'"); //contoh
    $c=mysqli_query($connection,"SELECT email FROM tbl_admin WHERE activation='$code'");
    
	if(mysqli_num_rows($c) >0)
    {

            //$count=mysqli_query($connection,"SELECT uid FROM users WHERE activation='$code' and status='0'"); //contoh
            $count=mysqli_query($connection,"SELECT email FROM tbl_admin WHERE activation='$code' and status='1'");

            if(mysqli_num_rows($count) == 1)
            {
                mysqli_query($connection,"UPDATE tbl_admin SET password='$updatepassword' WHERE activation='$code'");
                $msg="Your New Password :  ".$password;	
            }
            else
            {
               $msg ="Wrong code.";
            }

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
