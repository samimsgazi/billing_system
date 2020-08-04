<?php
include_once 'config.php';
if(isset($_POST['submit']))
{
//if(!$_POST['name']="" && !$_POST['address'] ="" ){
	$prdname = mysql_real_escape_string($_POST['prdname']);
	$prdgroup = mysql_real_escape_string($_POST['prdgroup']);
    $qty = mysql_real_escape_string($_POST['qty']);
	$date =  date("Y-m-d", strtotime($_POST['date']));
	$made =  mysql_real_escape_string($_POST['made']);
  // $chk=mysql_query("SELECT * FROM users WHERE  email = '$email' ");
  /* if(mysql_num_rows($chk)>0){
	   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Email already registered.  ')
     </SCRIPT>");
   }
else{*/

  $res = "INSERT INTO prod_master (prod_name,prgroup_id,Quantity,date,madeby) VALUES ('$prdname','$prdgroup','$qty','$date','$made')";

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
 <link rel="stylesheet" href="css/jquery-ui.css">
  <script src="libs/jquery/jquery-1.10.2.js"></script>
  <script src="libs/jquery/v1.11.4.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">

<script>
  $(function() {
    $( "#date" ).datepicker();
  });
     
  </script>
  <style>
  .threedtext {
    color: #fff;
    font-family: Arial, sans-serif;
    font-size: 48px;
    font-weight: bold;
    text-shadow: #afe222 1px 1px, #000 2px 2px, #000 3px 3px;
    position: relative;
    -moz-transition: all 0.3s ease-out;
       -o-transition: all 0.3s ease-out;
            -webkit-transition: all 0.3s ease-out;
          transition: all 0.3s ease-out;
}
.threedtext:hover {
    color: #FFF;
text-shadow: #afe222 1px 1px, #afe222 2px 2px, #afe222 3px 3px, #B7BDC8 4px 4px,
#B7BDC8 5px 5px, #B7BDC8 6px 6px;
    left: -6px;
    top: -6px;
}
  </style>
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
        <li><a href="product-group.php" >Product Group</a></li>
        <li><a href="product-master.php" class="active">Product</a></li>
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
                <h1>Product Master</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>Product Name</span>
                    <input type="text" name="prdname" required>
                </label>
                <label>
                    <span>Date</span>
                    <input type="text" name="date" required id="date">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Product Group</span>
                    <select name="prdgroup" required style="width:240px"> 
                    
                   <?php
$rs=mysql_query("Select * from prod_group order by  prgroup_id");
	  while($row=mysql_fetch_array($rs))
{
if($row[0]==$ddlemp)
{
echo "<option value='$row[0]' selected>$row[1]</option>";
}
else
{
echo "<option value='$row[0]'>$row[1]</option>";
}
}
?>
                    </select>
                </label> 
                <label>
                    <span>Quantity</span>
                    <input type="text" name="qty" required>
                </label>
            </div>
		<div class="form-row">
                <label>
                    <span>Made By</span>
                    <input type="text" name="made" required>
                </label>
               
            </div>
            
                
            

            <div class="form-row">
                <button type="submit" name="submit" onClick="chk()">Add</button>
            </div>

<div>  <h2>Records</h2>   
<div align="center" style="overflow-y: scroll; height: 200px; ">

            <?php
			 	$Qry = "Select * from prod_master order by prod_id DESC";
                
				$sql = mysql_query ($Qry);
				echo "<table border='1' border-color='#ff0000'>
				<tr>
				<td align='Center' bgcolor='#00BFFF'>Name</td>
				<td align='Center' bgcolor='#00BFFF'>&nbsp;Group Name&nbsp;</td>
				<td align='Center' bgcolor='#00BFFF'>&nbsp;Quantity&nbsp;</td>
				<td align='Center' bgcolor='#00BFFF'>Date</td>
				<td align='Center' bgcolor='#00BFFF'>&nbsp; Edit &nbsp;</td>
				<td align='Center' bgcolor='#00BFFF'>&nbsp;Delete&nbsp;</td>
				</tr>";
				while($row = mysql_fetch_array($sql))
				  {
				  echo "<tr>";
				  echo "<td align='Center'>" . $row['prod_name'] . "</td>";
				  $pro=mysql_fetch_assoc(mysql_query("select * from prod_group where prgroup_id=$row[prgroup_id]"));
				  echo "<td align='Center'>" . $pro['prod_group_name'] . "</td>";
				  echo "<td align='Center'>" . $row['Quantity'] . "</td>";
				  echo "<td align='Center'>" . date("d-m-Y", strtotime($row['date'])) . "</td>";
				  echo "<td align='Center'>" ; ?> <a href=edit/prodct_master_edit.php?id=<?php echo $row['prod_id']?>>Edit </a> <?php "</td>";
				  echo "<td align='Center'>" ; ?> <a href=edit/prodct_master_delete.php?id=<?php echo $row['prod_id']?> onclick="return confirm('Are you sure to delete?');" >Delete </a> <?php "</td>";
				  
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
