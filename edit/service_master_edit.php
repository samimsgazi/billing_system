<?php
include_once '../config.php';
$id=$_GET['id'];
$chk=mysql_query("SELECT * FROM service_master WHERE  serv_id = '$id' ");
$rec=mysql_fetch_assoc($chk);


if(isset($_POST['submit']))
{
//if(!$_POST['name']="" && !$_POST['address'] ="" ){
	$srvdetals = mysql_real_escape_string($_POST['srvdetals']);
	$rate = mysql_real_escape_string($_POST['rate']);

   //$chk=mysql_query("SELECT * FROM users WHERE  email = '$email' ");
  /* if(mysql_num_rows($chk)>0){
	   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Email already registered.  ')
     </SCRIPT>");
   }
else{*/

  $res = "  UPDATE service_master SET serv_details='$srvdetals', serv_rate='$rate' WHERE serv_id='$id'";
  


	if(mysql_query($res))
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Record updated successfully')
    window.location.href='../service-master.php';
    </SCRIPT>");
	}
	else{
		?>
        <script>alert('Error To Update Record...');</script>
        <?php
	}
}
?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Customer Master Edit</title>

	<link rel="stylesheet" href="../assets/demo.css">
	<link rel="stylesheet" href="../assets/form-basic.css">

</head>


	<header>
		<h1>Billing System</h1>
        
    </header>

    <ul>
       <!-- <li><a href="index.html" class="active">Costomer</a></li>
        <li><a href="service-master.html">Service</a></li>
        <li><a href="form-login.html">Product Group</a></li>
        <li><a href="form-mini.html">Mini</a></li>
        <li><a href="form-labels-on-top.html">Labels on Top</a></li>
        <li><a href="form-validation.html">Validation</a></li>
        <li><a href="form-search.html">Search</a></li>-->
    </ul>


    <div class="main-content">

        <!-- You only need this form and the form-basic.css -->

        <form class="form-basic" method="post" action="#">

                <div class="form-title-row">
                <h1>Edit Service Master</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>Service Details</span>
                    <input type="text" name="srvdetals" value="<?php echo $rec['serv_details']; ?>" required>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Service Rate</span>
                    <input type="text" name="rate" value="<?php echo $rec['serv_rate']; ?>" required>
                </label>
            </div>


            <div class="form-row">
                <button type="submit" name="submit">Update</button>
            </div>

        </form>
        
        
    </div>

</body>

</html>
