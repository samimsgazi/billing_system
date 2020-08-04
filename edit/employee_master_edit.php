<?php
include_once '../config.php';
$id=$_GET['id'];
$chk=mysql_query("SELECT * FROM employee_master WHERE  id = '$id' ");
$rec=mysql_fetch_assoc($chk);


if(isset($_POST['submit']))
{
//if(!$_POST['name']="" && !$_POST['address'] ="" ){
	$name = mysql_real_escape_string($_POST['name']);
	$joindate = mysql_real_escape_string($_POST['joindt']);
	$address = mysql_real_escape_string($_POST['address']);
	$City= mysql_real_escape_string($_POST['txtcity']);
	$Dist = mysql_real_escape_string($_POST['txtdist']);
	$pincode = mysql_real_escape_string($_POST['txtpin']); 
	$phno = mysql_real_escape_string($_POST['txtph']);
	$mail =mysql_real_escape_string($_POST['txtemail']);

   //$chk=mysql_query("SELECT * FROM users WHERE  email = '$email' ");
  /* if(mysql_num_rows($chk)>0){
	   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Email already registered.  ')
     </SCRIPT>");
   }
else{*/

  $res = "  UPDATE employee_master SET Name='$name',joining='$joindate', address='$address', City='$City', Dist='$Dist',pincode='$pincode', ph='$phno', mail='$mail' WHERE id='$id'";
  


	if(mysql_query($res))
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Record updated successfully')
    window.location.href='../employee-master.php';
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

	<title>Employee Master Edit</title>

	<link rel="stylesheet" href="../assets/demo.css">
	<link rel="stylesheet" href="../assets/form-basic.css">

</head>


	<header>
		<h1>Billing System</h1>
        
    </header>

    <ul>
        <!--<li><a href="index.html" class="active">Costomer</a></li>
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
                <h1>Employee Master</h1>
            </div>

            <div class="form-row">
                <label>
                    <span> Name</span>
                    <input type="text" name="name" value="<?php echo $rec['Name']; ?>" required>
                </label>
                <label>
                    <span>Joining</span>
                    <input type="date" name="joindt" value="<?php echo $rec['joining']; ?>" required>
                </label>
            </div>
           

            <div class="form-row">
                <label>
                    <span>Address</span>
                    <input type="text" name="address" value="<?php echo $rec['address']; ?>" required>
                </label>
                 <label>
                    <span>City</span>
                    <input type="text" name="txtcity" value="<?php echo $rec['City']; ?>" required>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Dist</span>
                    <input type="text" name="txtdist" value="<?php echo $rec['Dist']; ?>" required>
                </label>
                 <label>
                    <span>Pin Code</span>
                   <input type="text" name="txtpin" value="<?php echo $rec['pincode']; ?>" required>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Ph No</span>
                    <input type="text" name="txtph" value="<?php echo $rec['ph']; ?>" required>
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" name="txtemail" value="<?php echo $rec['mail']; ?>" required>
                </label>
            </div>


            <div class="form-row">
                <button type="submit" name="submit">Update</button>
            </div>

       
        
   
              </form>
        
        
    </div>

</body>

</html>
