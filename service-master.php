<?php
include_once 'config.php';
if(isset($_POST['submit']))
{
//if(!$_POST['name']="" && !$_POST['address'] ="" ){
	$srvdetals = mysql_real_escape_string($_POST['srvdetals']);
	$rate = mysql_real_escape_string($_POST['rate']);
	

  // $chk=mysql_query("SELECT * FROM users WHERE  email = '$email' ");
  /* if(mysql_num_rows($chk)>0){
	   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Email already registered.  ')
     </SCRIPT>");
   }
else{*/

  $res = "INSERT INTO service_master (serv_details, serv_rate) VALUES ('$srvdetals', '$rate')";

	if(mysql_query($res))
	{
		?>
        <script>alert('Insert successfully...');</script>
        <?php
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

	<title>Service Master</title>

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
        <li><a href="service-master.php"class="active">Service</a></li>
        <li><a href="service-bill-trans.php">Service Bill</a></li>
        <li><a href="product-group.php">Product Group</a></li>
        <li><a href="product-master.php">Product</a></li>
        <li><a href="product-bill-trans.php">Product Bill</a></li>
        <li><a href="tax-master.php">Tax</a></li>
         <li><a href="Reports/service_report.php">Report</a></li>
         <ul>
        <li><a href="employee-master.php" >Employee</a></li>
      <!--   <li><a href="stock-master.php">Stock</a></li> -->
        <li><a href="payment/payment.php">Payment</a></li>
         </ul>
    </ul>


    <div class="main-content">

        <!-- You only need this form and the form-basic.css -->

        <form class="form-basic" method="post" action="#">

            <div class="form-title-row">
                <h1>Service Master</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>Service Details</span>
                    <input type="text" name="srvdetals" required>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Service Rate</span>
                    <input type="text" name="rate" required>
                </label>
            </div>

            
                
            

            <div class="form-row">
                <button type="submit" name="submit">Add</button>
            </div>


<div>  <h2>Records</h2>   
<div align="center" style="overflow-y: scroll; height: 200px; ">

            <?php
			 	$Qry = "Select * from service_master order by serv_id";
                
				$sql = mysql_query ($Qry);
				echo "<table border='1' border-color='#ff0000'>
				<tr>
				<td align='Center' bgcolor='#00BFFF'>Service Details</td>
				<td align='Center' bgcolor='#00BFFF'>Rate</td>
				<td align='Center' bgcolor='#00BFFF'>Edit</td>
				<td align='Center' bgcolor='#00BFFF'>Delete</td>
				</tr>";
				while($row = mysql_fetch_array($sql))
				  {
				  echo "<tr>";
				  echo "<td align='Center'>" . $row['serv_details'] . "</td>";
				  echo "<td align='Center'>" . $row['serv_rate'] . "</td>";
				  echo "<td align='Center'>" ; ?> <a href=edit/service_master_edit.php?id=<?php echo $row['serv_id']?>>Edit </a> <?php "</td>";
				  echo "<td align='Center'>" ; ?> <a href=edit/service_master_delete.php?id=<?php echo $row['serv_id']?> onclick="return confirm('Are you sure to delete?');" >Delete </a> <?php "</td>";
				  
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
