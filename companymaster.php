<?php
include_once 'config.php';
if(isset($_POST['submit']))
{
//if(!$_POST['name']="" && !$_POST['address'] ="" ){
	$name = mysql_real_escape_string($_POST['Cname']);
	$Tname = mysql_real_escape_string($_POST['Tname']);
	$address = mysql_real_escape_string($_POST['address']);
	$City= mysql_real_escape_string($_POST['txtcity']);
	$Dist = mysql_real_escape_string($_POST['txtdist']);
	$pincode = mysql_real_escape_string($_POST['txtpin']); 
	$phno = mysql_real_escape_string($_POST['txtph']);
	$mail =mysql_real_escape_string($_POST['txtemail']);
	$servtaxno =mysql_real_escape_string($_POST['txttaxno']);
	$cst =mysql_real_escape_string($_POST['txtcst']);

 @mkdir("image");
 $image = "image/".time()."_".$_FILES['file']['name'];
 @copy($_FILES['file']['tmp_name'],$image);

  $res = "INSERT INTO company_master (name, tag_name, address, city,dist,pin,ph_no,email,servcetax,CST,image) VALUES ('$name',  '$Tname', '$address', '$City','$Dist','$pincode','$phno','$mail','$servtaxno','$cst','$image')";

	if(mysql_query($res))
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Your Company Details Uploaded Successfully')
    window.location.href='customer-master.php';
    </SCRIPT>");
	}
	else{
		?>
        <script>alert('Error To Insert Record...');</script>
        <?php
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Company Details</title>
<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-basic.css">
</head>
<header>
<h6 align="right" style="color:#FFFFFF"><a href="https://www.brainwareuniversity.ac.in/" target="_new">Developed by Brainware University Student</a></h6>
		<h1>Billing System</h1>
        
    </header>

    <ul>
      <li><a href="companymaster.php" class="active">Company Details</a></li>
        <li><a href="customer-master.php" >Customer</a></li>
        <li><a href="service-master.php">Service</a></li>
        <li><a href="service-bill-trans.php" >Service Bill</a></li>
        <li><a href="product-group.php" >Product Group</a></li>
        <li><a href="product-master.php">Product</a></li>
        <li><a href="product-bill-trans.php" >Product Bill</a></li>
        <li><a href="tax-master.php" >Tax</a></li>
         <li><a href="Reports/service_report.php">Report</a></li>
         <ul>
        <li><a href="employee-master.php" >Employee</a></li>
     <!--    <li><a href="stock-master.php">Stock</a></li> -->
        <li><a href="payment/payment.php">Payment</a></li>
         </ul>
        
    </ul>
<body>

<div class="main-content">

        <!-- You only need this form and the form-basic.css -->

        <form class="form-basic" method="post" action="#" enctype="multipart/form-data">

            <div class="form-title-row">
                <h1>Company Details</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>Company name</span>
                    <input type="text" name="Cname" required>
                </label>
                <label>
                    <span>Tag Name</span>
                    <input type="text" name="Tname" required>
                </label>
            </div>
           

            <div class="form-row">
                <label>
                    <span>Address</span>
                    <input type="text" name="address" required>
                </label>
                 <label>
                    <span>City</span>
                    <input type="text" name="txtcity" required>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Dist</span>
                    <input type="text" name="txtdist" required>
                </label>
                 <label>
                    <span>Pin Code</span>
                   <input type="text" name="txtpin" required>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Ph No</span>
                    <input type="text" name="txtph" required>
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" name="txtemail" required>
                </label>
            </div>
					<div class="form-row">
                <label>
                    <span>Service Tax No</span>
                    <input type="text" name="txttaxno" >
                </label>
                <label>
                    <span>CST</span>
                    <input type="text" name="txtcst" >
                </label>
            </div>
          
                <div class="form-row">
                <label>
                    <span>Logo</span>
                    <input type="file" id="file" onChange="readURL(this);"  name="file" />
                </label>
                     <label>
                    
                </div>
                              
            

            <div class="form-row">
                <button type="submit" name="submit">Add</button>
            </div>

       
           <div>  <h2>Records</h2>   
<div align="center"  style="overflow-y: scroll; height: 200px; ">

            <?php
			 	$Qry = "Select * from company_master order by id";
                
				$sql = mysql_query ($Qry);
				echo "<table border='1' border-color='#ff0000'>
				<tr>
				<td align='Center' bgcolor='#00BFFF'>Company name</td>
				<td align='Center' bgcolor='#00BFFF'>Tag Name</td>
				<td align='Center' bgcolor='#00BFFF'>Address</td>
				<td align='Center' bgcolor='#00BFFF'>City</td>
				<td align='Center' bgcolor='#00BFFF'>Dist</td>
				<td align='Center' bgcolor='#00BFFF'>Pin Code</td>
				<td align='Center' bgcolor='#00BFFF'>Ph No</td>
				<td align='Center' bgcolor='#00BFFF'>Email</td>
				<td align='Center' bgcolor='#00BFFF'>Service Tax No</td>
				<td align='Center' bgcolor='#00BFFF'>CST</td>
				
				
				</tr>"; 
				while($row = mysql_fetch_array($sql))
				  {
				  echo "<tr>";
				  echo "<td align='Center'>" . $row['name'] . "</td>";
				  echo "<td align='Center'>" . $row['tag_name'] . "</td>";
                  
				  echo "<td align='Center'>" . $row['address'] . "</td>";
				  echo "<td align='Center'>" . $row['city'] . "</td>";
				  echo "<td align='Center'>" . $row['dist'] . "</td>";
				  echo "<td align='Center'>" . $row['pin'] . "</td>";
				  echo "<td align='Center'>" . $row['ph_no'] . "</td>";
				  echo "<td align='Center'>" . $row['email'] . "</td>";
				  echo "<td align='Center'>" . $row['servcetax'] . "</td>";
				  echo "<td align='Center'>" . $row['CST'] . "</td>";
				 
				 /* echo "<td align='Center'>" ; ?> <a href=edit/customer_master_edit.php?id=<?php echo $row['id']?>>Edit </a> <?php "</td>";
				  echo "<td align='Center'>" ; ?> <a href=edit/customer_master_delete.php?id=<?php echo $row['id']?> onclick="return confirm('Are you sure to delete?');" >Delete </a> <?php "</td>";*/
				  
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