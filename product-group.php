<?php
include_once 'config.php';
if(isset($_POST['submit']))
{
//if(!$_POST['name']="" && !$_POST['address'] ="" ){
	$prdname = mysql_real_escape_string($_POST['prdname']);
	

  // $chk=mysql_query("SELECT * FROM users WHERE  email = '$email' ");
  /* if(mysql_num_rows($chk)>0){
	   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Email already registered.  ')
     </SCRIPT>");
   }
else{*/

  $res = "INSERT INTO prod_group (prod_group_name) VALUES ('$prdname')";

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

	<title>Product Group Master</title>

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
        <li><a href="service-bill-trans.php" >Service Bill</a></li>
        <li><a href="product-group.php" class="active">Product Group</a></li>
        <li><a href="product-master.php">Product</a></li>
        <li><a href="product-bill-trans.php">Product Bill</a></li>
        <li><a href="tax-master.php">Tax</a></li>
         <li><a href="Reports/service_report.php">Report</a></li>
         <ul>
        <li><a href="employee-master.php" >Employee</a></li>
       <!--  <li><a href="stock-master.php">Stock</a></li> -->
        <li><a href="payment/payment.php">Payment</a></li>
         </ul>
    </ul>


    <div class="main-content">

        <!-- You only need this form and the form-basic.css -->

        <form class="form-basic" method="post" action="#">

            <div class="form-title-row">
                <h1>Product Group</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>Product Group Name</span>
                    <input type="text" name="prdname" required>
                </label>
            </div>
 

            <div class="form-row">
                <button type="submit" name="submit">Add</button>
            </div>
            
            <div>  <h2>Records</h2>   
<div align="center" style="overflow-y: scroll; height: 200px; ">

            <?php
			 	$Qry = "Select * from prod_group order by prgroup_id";
                
				$sql = mysql_query ($Qry);
				echo "<table border='1' border-color='#ff0000'>
				<tr>
				<td align='Center' bgcolor='#00BFFF'>Group Name</td>
				<td align='Center' bgcolor='#00BFFF'>Edit</td>
				<td align='Center' bgcolor='#00BFFF'>Delete</td>
				</tr>";
				while($row = mysql_fetch_array($sql))
				  {
				  echo "<tr>";
				  echo "<td align='Center'>" . $row['prod_group_name'] . "</td>";
				  echo "<td align='Center'>" ; ?> <a href=edit/prodct_grp_edit.php?id=<?php echo $row['prgroup_id']?>>Edit </a> <?php "</td>";
				  echo "<td align='Center'>" ; ?> <a href=edit/prodct_grp_delete.php?id=<?php echo $row['prgroup_id']?> onclick="return confirm('Are you sure to delete?');" >Delete </a> <?php "</td>";
				  
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
