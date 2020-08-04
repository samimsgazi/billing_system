<?php
include_once 'config.php';
if(isset($_POST['submit']))
{
//if(!$_POST['name']="" && !$_POST['address'] ="" ){
	$name = mysql_real_escape_string($_POST['fname'])." ". mysql_real_escape_string($_POST['lfname']);
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

  $res = "INSERT INTO customer_master (cust_name, address1, City, Dist,cust_pincode,cust_phno,cust_mail,cust_vat,cust_servtaxno,cust_cst) VALUES ('$name',  '$address', '$City', '$Dist','$cust_pincode','$cust_phno','$cust_mail','$cust_vat','$cust_servtaxno','$cust_cst')";

	if(mysql_query($res))
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Your Record Uploaded Successfully')
    window.location.href='index.php';
    </SCRIPT>");
	}
	else{
		?>
        <script>alert('Error To Insert Record...');</script>
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

	<title>Customer Master</title>

	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-basic.css">
<script>
function myFunction() {
    var x;
    if (confirm("Want to delete!") == true) {
        window.location.assign("edit/customer_master_delete.php?id=<?php echo $row['id']?>")
    } else {
        x = "You pressed Cancel!";
    }
    document.getElementById("demo").innerHTML = x;
}
</script>

</head>


	<header>
		<h1>Billing System</h1>
        
    </header>

    <ul>
        <li><a href="companymaster.php" >Company Details</a></li>
        <li><a href="index.php" class="active">Customer</a></li>
        <li><a href="service-master.php">Service</a></li>
        <li><a href="service-bill-trans.php">Service Bill</a></li>
        <li><a href="product-group.php">Product Group</a></li>
        <li><a href="product-master.php">Product</a></li>
        <li><a href="product-bill-trans.php">Product Bill</a></li>
        <li><a href="tax-master.php">Tax</a></li>
         <li><a href="Reports/service_report.php">Report</a></li>
        
    </ul>


    <div class="main-content">

        <!-- You only need this form and the form-basic.css -->

        <form class="form-basic" method="post" action="#">

            <div class="form-title-row">
                <h1>Customer Master</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>First name</span>
                    <input type="text" name="fname" required>
                </label>
                <label>
                    <span>Last Name</span>
                    <input type="text" name="lfname" required>
                </label>
            </div>
           

            <div class="form-row">
                <label>
                    <span>Address</span>
                    <input type="text" name="address" >
                </label>
                 <label>
                    <span>City</span>
                    <input type="text" name="txtcity" >
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Dist</span>
                    <input type="text" name="txtdist" >
                </label>
                 <label>
                    <span>Pin Code</span>
                   <input type="text" name="txtpin" >
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Ph No</span>
                    <input type="text" name="txtph" >
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" name="txtemail" >
                </label>
            </div>

          
                <div class="form-row">
                <label>
                    <span>VAT</span>
                    <input type="text" name="taxvat">
                </label>
                     <label>
                    <span>Service Tax No</span>
                    <input type="text" name="txttaxno">
                </label>
                </div>
               
                <div class="form-row">
                <label>
                    <span>CST</span>
                    <input type="text" name="txtcst">
                </label>
                    
                </div>
                
            

            <div class="form-row">
                <button type="submit" name="submit">Add</button>
            </div>

       
        
   <div>  <h2>Records</h2>   
<div  style="overflow-y: scroll; height: 200px; ">

            <?php
			 	$Qry = "Select * from customer_master order by id";
                
				$sql = mysql_query ($Qry);
				echo "<table border='1' border-color='#ff0000'>
				<tr>
				<td align='Center' bgcolor='#00BFFF'>Name</td>
				<td align='Center' bgcolor='#00BFFF'>Address</td>
				<td align='Center' bgcolor='#00BFFF'>Pin Code</td>
				<td align='Center' bgcolor='#00BFFF'>Mob</td>
				<td align='Center' bgcolor='#00BFFF'>Email</td>
				<td align='Center' bgcolor='#00BFFF'>VAT</td>
				<td align='Center' bgcolor='#00BFFF'>Service Tax No</td>
				<td align='Center' bgcolor='#00BFFF'>CST</td>
				<td align='Center' bgcolor='#00BFFF'>Edit</td>
				<td align='Center' bgcolor='#00BFFF'>Delete</td>
				</tr>";
				while($row = mysql_fetch_array($sql))
				  {
				  echo "<tr>";
				  echo "<td align='Center'>" . $row['cust_name'] . "</td>";
				  echo "<td align='Center'>" . $row['address1'] . "</td>";
				  echo "<td align='Center'>" . $row['cust_pincode'] . "</td>";
				  echo "<td align='Center'>" . $row['cust_phno'] . "</td>";
				  echo "<td align='Center'>" . $row['cust_mail'] . "</td>";
				  echo "<td align='Center'>" . $row['cust_vat'] . "</td>";
				  echo "<td align='Center'>" . $row['cust_servtaxno'] . "</td>";
				  echo "<td align='Center'>" . $row['cust_cst'] . "</td>";
				  echo "<td align='Center'>" ; ?> <a href=edit/customer_master_edit.php?id=<?php echo $row['id']?>>Edit </a> <?php "</td>";
				  echo "<td align='Center'>" ; ?> <a href=edit/customer_master_delete.php?id=<?php echo $row['id']?> onclick="return confirm('Are you sure to delete?');" >Delete </a> <?php "</td>";
				  
				  echo "</tr>";
				  }
				echo "</table>";
			?>	 
		</div>	 
             </div>
              </form>
    </div>

</body>

</html>
