<?php
include_once 'config.php';
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

  $res = "INSERT INTO employee_master (Name, joining, address, City,Dist,pincode,ph,mail) VALUES ('$name',  '$joindate', '$address', '$City','$Dist','$pincode','$phno','$mail')";

	if(mysql_query($res))
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Your Record Uploaded Successfully')
    window.location.href='employee-master.php;
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

	<title>Employee Master</title>

	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-basic.css">


</head>


	<header>
    <h6 align="right" style="color:#FFFFFF"><a href="https://www.brainwareuniversity.ac.in/" target="_new">Developed by Brainware University Student</a></h6>
		<h1>Billing System</h1>
        
    </header>

    <ul>
        <li><a href="companymaster.php" >Company Details</a></li>
        <li><a href="customer-master.php" >Customer</a></li>
        <li><a href="service-master.php">Service</a></li>
        <li><a href="service-bill-trans.php">Service Bill</a></li>
        <li><a href="product-group.php">Product Group</a></li>
        <li><a href="product-master.php">Product</a></li>
        <li><a href="product-bill-trans.php">Product Bill</a></li>
        <li><a href="tax-master.php">Tax</a></li>
         <li><a href="Reports/service_report.php">Report</a></li>
      <ul>
        <ul>
        <li><a href="employee-master.php" class="active">Employee</a></li>
       <!--  <li><a href="stock-master.php">Stock</a></li> -->
        <li><a href="payment/payment.php">Payment</a></li>
         </ul>
         </ul>
    </ul>


    <div class="main-content">

        <!-- You only need this form and the form-basic.css -->

        <form class="form-basic" method="post" action="#">

            <div class="form-title-row">
                <h1>Employee Master</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>Name</span>
                    <input type="text" name="name" required>
                </label>
                <label>
                    <span>Date Of Join</span>
                    <input type="date" name="joindt" required>
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
                <button type="submit" name="submit">Add</button>
            </div>

       
        
   <div>  <h2>Records</h2>   
<div align="center" style="overflow-y: scroll; height: 200px; ">

            <?php
			 	$Qry = "Select * from employee_master order by id";
                
				$sql = mysql_query ($Qry);
				echo "<table border='1' border-color='#ff0000'>
				<tr>
				<td align='Center' bgcolor='#00BFFF'>Name</td>
				<td align='Center' bgcolor='#00BFFF'>Joining</td>
				<td align='Center' bgcolor='#00BFFF'>Address</td>
				<td align='Center' bgcolor='#00BFFF'>City</td>
				<td align='Center' bgcolor='#00BFFF'>Dist</td>
				<td align='Center' bgcolor='#00BFFF'>Pin</td>
				<td align='Center' bgcolor='#00BFFF'>Mob</td>
				<td align='Center' bgcolor='#00BFFF'>Email</td>
				<td align='Center' bgcolor='#00BFFF'>Edit</td>
				<td align='Center' bgcolor='#00BFFF'>Delete</td>
				</tr>";
				while($row = mysql_fetch_array($sql))
				  {
				  echo "<tr>";
				  echo "<td align='Center'>" . $row['1'] . "</td>";
				  echo "<td align='Center'>" . date("d-m-Y", strtotime($row['2'])) . "</td>";
				  echo "<td align='Center'>" . $row['3'] . "</td>";
				  echo "<td align='Center'>" . $row['4'] . "</td>";
				  echo "<td align='Center'>" . $row['5'] . "</td>";
				  echo "<td align='Center'>" . $row['6'] . "</td>";
				  echo "<td align='Center'>" . $row['7'] . "</td>";
				  echo "<td align='Center'>" . $row['8'] . "</td>";
				  echo "<td align='Center'>" ; ?> <a href=edit/employee_master_edit.php?id=<?php echo $row['id']?>>Edit </a> <?php "</td>";
				  echo "<td align='Center'>" ; ?> <a href=edit/employee_master_delete.php?id=<?php echo $row['id']?> onclick="return confirm('Are you sure to delete?');" >Delete </a> <?php "</td>";
				  
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
