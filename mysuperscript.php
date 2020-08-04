<?php
session_start();
include_once 'config.php';
if(isset($_POST['login']))
{
	$user = mysql_real_escape_string($_POST['username']);
	$pass = mysql_real_escape_string($_POST['password']);
	$login = "SELECT * FROM users WHERE  user = '$user' and password='$pass'";
	$chklogin = mysql_query($login) or die(mysql_error());
	//$count = mysql_num_rows($chklogin);
		$row = mysql_fetch_assoc($chklogin);
		$count=mysql_num_rows($chklogin);
		if ($count>0){
		$_SESSION['usr']=$row['user'];	
		header('location: customer-master.php');
	   
	  } 
	  elseif ($count<1){
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Username or password wrong.  ')
	 window.location.href='index.php';
     </SCRIPT>");
	
	?>

    <?php
	//$msg='aaa';
	  }
}
?>