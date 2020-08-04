<?php
include_once 'config.php';
?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Payment Process</title>

	<link rel="stylesheet" href="../assets/demo.css">
	<link rel="stylesheet" href="../assets/form-basic.css">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
  <script>
  $(function() {
    $( "#datepicker1" ).datepicker();
  });
  </script>
<script>
function showDiv(elem){
   if(elem.value == "Cheque"){
      document.getElementById('cheque').style.display = "block";
	  }
	  else{
	  
		 document.getElementById('cheque').style.display = "none"; 
		 $("#txtChqNo").val('');
		  $("#datepicker").val('');
	  }}
</script>
<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('time').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
<script>
$(document).ready(function() {
	
	$("#txtInv").keyup(function(event){
		value=$(this).val();
		var cat="search";
		 $.ajax({
			type:'POST',
			data:{
			Inv:value,cat:cat
			},
			url:'insert.php',
			success:function(data) {
				
			 // alert(data);
			 	$('#billamt').val(data);		 
			}
			
		  });
	});

	
	
	
	$("#txtInv").on('input', function() {
		value=document.getElementById("txtInv").value;
		
		var cat="due";
		 $.ajax({
			type:'POST',
			data:{
			Inv:value,cat:cat
			},
			url:'insert.php',
			success:function(data) {
				
			 // alert(data);
			 	$('#txtdue').val(data);		 
			}
			
		  });
	});

	
	
$("#add").click(function(e) {
  e.preventDefault();
  var Inv = $("#txtInv").val(); 
  var date = $("#datepicker1").val();
  var amt = $("#txtamt").val(); 
  var mode = $("#mode").val();
  var ChqNo = $("#txtChqNo").val(); 
  var datepicker = $("#datepicker").val();
  var cat="add";
   var dataString = 'Inv='+Inv+'&date='+date+'&amt='+amt+'&mode='+mode+'&ChqNo='+ChqNo+'&datepicker='+datepicker+'&cat='+cat;
  $.ajax({
    type:'POST',
    data:dataString,
    url:'insert.php',
    success:function(data) {
      alert(data);
	  $('#frmpayment').trigger("reset");
	 
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
        <li><a href="../companymaster.php" >Company Details</a></li>
        <li><a href="../customer-master.php" >Customer</a></li>
        <li><a href="../service-master.php">Service</a></li>
        <li><a href="../service-bill-trans.php">Service Bill</a></li>
        <li><a href="../product-group.php">Product Group</a></li>
        <li><a href="../product-master.php">Product</a></li>
        <li><a href="../product-bill-trans.php">Product Bill</a></li>
        <li><a href="../tax-master.php">Tax</a></li>
         <li><a href="../Reports/service_report.php">Report</a></li>
      <ul>
        <li><a href="../employee-master.php" >Employee</a></li>
       <!--  <li><a href="../stock-master.php">Stock</a></li> -->
        <li><a href="payment.php" class="active">Payment</a></li>
         </ul>
    </ul>
<body onload="startTime()">

    <div class="main-content" >

        <form class="form-basic" method="post" id="frmpayment">
<div id="time" align="right"></div>
            <div class="form-title-row">
                <h1>Payment</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>Invoice No</span>
                    <input type="text" id="txtInv" required > 
                </label>
                <label>
                    <span>Bill Amount</span>
                    <input type="text"  id="billamt" readonly >
                </label>
            </div>
           <div class="form-row">
                <label>
                    <span>Due Amount</span>
                    <input type="text" id="txtdue" required readonly > 
                </label>
                <label>
                    <span>Date</span>
                    <input type="text"  id="datepicker1"  >
                </label>
            </div>

           <div class="form-row">
                <label>
                    <span>Pay Amount</span>
                    <input type="text" id="txtamt" >
                </label>
                 <label>
                    <span>Mode</span>
                    <select onchange="showDiv(this)" id="mode">
                    <option value="Cash">Cash</option>
                    <option value="Cheque">Cheque</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                    </select>
                </label>
            </div>

            <div class="form-row" id="cheque" style="display:none">
                <label>
                    <span>Chque No</span>
                    <input type="text"  id="txtChqNo" >
                </label>
                 <label>
                    <span>Issue Date</span>
                   <input type="text"  id="datepicker" >
                </label>
            </div>


            
            <div class="form-row">
                <button type="submit" name="submit" id="add">Add</button>
            </div>

              </form>
              
              
    </div>

</body>

</html>
