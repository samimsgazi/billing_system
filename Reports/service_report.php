<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Report</title><link rel="stylesheet" href="../assets/demo.css">
	<link rel="stylesheet" href="../assets/form-basic.css">
    <script language="javascript" type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>
	<script language="javascript" type="text/javascript" src="ajax.js"></script> 
    
    <link rel="stylesheet" href="../css/jquery-ui.css">
  <script src="../libs/jquery/jquery-1.10.2.js"></script>
  <script src="../libs/jquery/v1.11.4.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
      <script>
  $(function() {
    $( "#frmdate" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 2,
      onClose: function( selectedDate ) {
        $( "#todate" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#todate" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 2,
      onClose: function( selectedDate ) {
        $( "#frmdate" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
  </script>
</head>
	<header>
		<h6 align="right" style="color:#FFFFFF"><a href="https://www.brainwareuniversity.ac.in/" target="_new">Developed by Brainware University Student</a></h6>
        <h1>Reports </h1>
        
    </header>
    <ul>
         
        <li><a href="../companymaster.php" >Company Details</a></li>
        <li><a href="../customer-master.php" >Customer</a></li>
        <li><a href="../service-master.php">Service</a></li>
        <li><a href="../service-bill-trans.php" >Service Bill</a></li>
        <li><a href="../product-group.php" >Product Group</a></li>
        <li><a href="../product-master.php">Product</a></li>
        <li><a href="../product-bill-trans.php" >Product Bill</a></li>
        <li><a href="../tax-master.php">Tax</a></li>
        <li><a href="Reports/service_report.php" class="active">Report</a></li>
        <ul>
        <li><a href="../employee-master.php" >Employee</a></li>
       <!--  <li><a href="../stock-master.php">Stock</a></li> -->
        <li><a href="../payment/payment.php" >Payment</a></li>
         </ul>
    </ul>
<body>
<?php
include_once '../config.php';
?>
<div class="main-content">

        <form class="form-basic"  >
        <div class="form-title-row">
        <h1>Reports</h1>
        </div>
        <div align="center" style="font-size:14px">
         <label>
       Service Bill: <input type="radio" name="cat" id="cat" value="1" class="hide" checked="checked"/>
        </label>
        <label>
        Product Bill: <input type="radio" name="cat" id="cat" value="2" class="hide" />
        </label>
        <label>
        Stock Reports: <input type="radio" name="cat" id="cat" value="3" class="show"/>
        </label>
        </div><br />
        <div align="center" id="wise">
         <label>
       Invoice Wise: <input type="radio" name="type" id="type" value="1"  checked="checked"/>
        </label>
        <label>
        Date Wise: <input type="radio" name="type" id="type" value="2" />
        </label>
        </div><br />
         <div align="center" id="cat1" class="asc">
         <div id="type1" class="desc">
                <label>
                    <span>Invoice No</span>
                   <input type="text" name="billno" id="billno" placeholder="Invoice No"  >
                   </label>
                                 
               </div>
                 <div id="type2" class="desc" style="display: none;">
        		<span>From Date</span>	<input type="text" id="frmdate" />
				<span>To Date</span>	<input type="text" id="todate" />
   				 </div>
               
            </div>
            <!--  Stock Report   -->
          <div align="center" id="cat2" class="asc" style="display: none;">
          
          </div>
          <!-- End Stock Report   -->
             <div align="center">
			 <button type="button" id="Search">Search</button>
               
            </div>
            <div class="form-row">
            
            <div align="center" id="result" style="width:100%; background:#CCCCFF" ></div>
			</div>
            </form>
            <script>
			$(document).ready(function() {
    $("input[name$='type']").click(function() {
        var test = $(this).val();

        $("div.desc").hide();
        $("#type" + test).show();
    });
	
	$(".show").change(function(){
        if($(this).is(":checked"))
        {
            $("#cat1").hide();
			$("#cat2").show();
			$("#wise").hide();
			//$("#result").empty();
        }
    });
	
	$(".hide").change(function(){
        if($(this).is(":checked"))
        {
            $("#cat1").show();
			$("#cat2").hide();
			$("#wise").show();
        }
    });
	
});
			
			</script>
    </div>
</body>
</html>