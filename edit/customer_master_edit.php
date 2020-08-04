<?php
include_once '../config.php';
$id=$_GET['id'];
$chk=mysql_query("SELECT * FROM customer_master WHERE  id = '$id' ");
$rec=mysql_fetch_assoc($chk);


if(isset($_POST['submit']))
{
//if(!$_POST['name']="" && !$_POST['address'] ="" ){
	$name = mysql_real_escape_string($_POST['fname']);
	$address = mysql_real_escape_string($_POST['address']);
	$City= mysql_real_escape_string($_POST['txtcity']);
	$Dist = mysql_real_escape_string($_POST['txtdist']);
	$cust_pincode = mysql_real_escape_string($_POST['txtpin']); 
	$cust_phno = mysql_real_escape_string($_POST['txtph']);
	$cust_mail =mysql_real_escape_string($_POST['txtemail']);
	$cust_vat = mysql_real_escape_string($_POST['taxvat']);
	$cust_servtaxno =mysql_real_escape_string($_POST['txttaxno']);
	$cust_cst =mysql_real_escape_string($_POST['txtcst']);

   //$chk=mysql_query("SELECT * FROM users WHERE  email = '$email' ");
  /* if(mysql_num_rows($chk)>0){
	   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Email already registered.  ')
     </SCRIPT>");
   }
else{*/
/*$res = "INSERT INTO customer_master (cust_name, address1, City, Dist,cust_pincode,cust_phno,cust_mail,cust_vat,cust_servtaxno,cust_cst) VALUES ('$name',  '$address', '$City', '$Dist','$cust_pincode','$cust_phno','$cust_mail','$cust_vat','$cust_servtaxno','$cust_cst')";*/

  $res = "  UPDATE customer_master SET cust_name='$name', address1='$address', City='$City', Dist='$Dist',cust_pincode='$cust_pincode', cust_phno='$cust_phno', cust_mail='$cust_mail', cust_vat='$cust_vat', cust_servtaxno='$cust_servtaxno', cust_cst='$cust_cst' WHERE id='$id'";
  


	if(mysql_query($res))
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Record updated successfully')
    window.location.href='../customer-master.php';
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
                <h1>Customer Master</h1>
            </div>

            <div class="form-row">
                <label>
                    <span> Name</span>
                    <input type="text" name="fname" value="<?php echo $rec['cust_name']; ?>" required>
                </label>
                <label>
                    <?php /*?><span>Last Name</span>
                    <input type="text" name="lfname" value="<?php echo $rec['cust_name']; ?>" required><?php */?>
                </label>
            </div>
           

            <div class="form-row">
                <label>
                    <span>Address</span>
                    <input type="text" name="address" value="<?php echo $rec['address1']; ?>" required>
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
                   <input type="text" name="txtpin" value="<?php echo $rec['cust_pincode']; ?>" required>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Ph No</span>
                    <input type="text" name="txtph" value="<?php echo $rec['cust_phno']; ?>" required>
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" name="txtemail" value="<?php echo $rec['cust_mail']; ?>" required>
                </label>
            </div>

          
                <div class="form-row">
                <label>
                    <span>VAT</span>
                    <input type="text" name="taxvat" value="<?php echo $rec['cust_vat']; ?>">
                </label>
                     <label>
                    <span>Service Tax No</span>
                    <input type="text" name="txttaxno" value="<?php echo $rec['cust_servtaxno']; ?>">
                </label>
                </div>
               
                <div class="form-row">
                <label>
                    <span>CST</span>
                    <input type="text" name="txtcst" value="<?php echo $rec['cust_cst']; ?>">
                </label>
                    
                </div>
                
            

            <div class="form-row">
                <button type="submit" name="submit">Update</button>
            </div>

       
        
   
              </form>
        
        
    </div>

</body>

</html>
