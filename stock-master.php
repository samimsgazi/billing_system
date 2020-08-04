<?php
include_once 'config.php';

?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Stock Master</title>

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
  <script>
$(document).ready(function() {
	
$("#add").click(function(e) {
  e.preventDefault();
  var name = $("#name").val(); 
  var date = $("#date").val();
  var batch = $("#batch").val(); 
  var made = $("#made").val();
  var qty = $("#qty").val(); 
  var serial = $("#serial").val();
  var cat="add";
   var dataString = 'name='+name+'&date='+date+'&batch='+batch+'&made='+made+'&qty='+qty+'&serial='+serial+'&cat='+cat;
  $.ajax({
    type:'POST',
    data:dataString,
    url:'stockdb.php',
    success:function(data) {
      alert(data);
	  $('#frmstock').trigger("reset");
	 
    }
	
  });
});
});


</script>
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
        <li><a href="employee-master.php" >Employee</a></li>
        <li><a href="stock-master.php" class="active">Stock</a></li>
        <li><a href="payment/payment.php">Payment</a></li>
         </ul>
       
    </ul>


    <div class="main-content">

        <!-- You only need this form and the form-basic.css -->

        <form class="form-basic" method="post" id="frmstock">

            <div class="form-title-row">
                <h1>Stock Master</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>Material Name</span>
                    <input type="text" id="name" required>
                </label>
                <label>
                    <span>Purchase Date</span>
                    <input type="text" id="date" required>
                </label>
            </div>
           

            <div class="form-row">
                <label>
                    <span>Made By</span>
                    <input type="text" id="made" >
                </label>
                 <label>
                    <span>Serial No</span>
                    <input type="text" id="serial" >
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Batch No</span>
                    <input type="text" id="batch" >
                </label>
                 <label>
                    <span>Quantity</span>
                   <input type="text" id="qty" >
                </label>
            </div>
		<div class="form-row">
                <label>
                    <span>Opening Stock</span>
                    <input type="text" id="opstock" readonly required>
                </label>
                <label>
                    <span>Closing Stock</span>
                    <input type="text" id="clstock" readonly required>
                </label>
            </div>

            <div class="form-row">
                <button type="submit" name="submit" id="add" onClick="chk()">Add</button>
            </div>

       
        
   <div>  <h2>Records</h2>   
<div align="center"  style="overflow-y: scroll; height: 200px; ">

            <?php
			 	$Qry = "Select * from stock_master order by id DESC";
                
				$sql = mysql_query ($Qry);
				echo "<table border='1' border-color='#ff0000'>
				<tr>
				<td align='Center' bgcolor='#00BFFF'>Name</td>
				<td align='Center' bgcolor='#00BFFF'>Company</td>
				<td align='Center' bgcolor='#00BFFF'>Serial No</td>
				<td align='Center' bgcolor='#00BFFF'>Batch</td>
				<td align='Center' bgcolor='#00BFFF'>Quantity</td>
				<td align='Center' bgcolor='#00BFFF'>Edit</td>
				<td align='Center' bgcolor='#00BFFF'>Delete</td>
				</tr>";
				while($row = mysql_fetch_array($sql))
				  {
				  echo "<tr>";
				  echo "<td align='Center'>" . $row['Name'] . "</td>";
				  echo "<td align='Center'>" . $row['madeBy'] . "</td>";
				  echo "<td align='Center'>" . $row['serialNo'] . "</td>";
				  echo "<td align='Center'>" . $row['batchNo'] . "</td>";
				  echo "<td align='Center'>" . $row['Quantity'] . "</td>";
				  echo "<td align='Center'>" ; ?> <a href=#>Edit </a> <?php "</td>";
				  echo "<td align='Center'>" ; ?> <a href=# onclick="return confirm('Are you sure to delete?');" >Delete </a> <?php "</td>";
				  
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
