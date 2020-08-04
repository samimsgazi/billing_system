<?php
include_once '../config.php';
$cat=$_POST['cat'];
$invoice = $_POST['Inv'];

if($cat=="search")
{
$search=mysql_fetch_assoc(mysql_query("SELECT * from serv_bill_master WHERE serv_bill_no='$invoice'"));
echo $search['Net_Amt'];
//echo $search['total_amt'];
}

if($cat=="due")
{
	//$total = $_POST['total'];
	$due=0;
	$paid=0;
	$search=mysql_fetch_assoc(mysql_query("SELECT * from serv_bill_master  WHERE serv_bill_no='$invoice'"));
   $total=$search['Net_Amt'];

$sql=mysql_query("SELECT * from payment_trns WHERE Invoice='$invoice'");
while($row = mysql_fetch_array($sql))
  {
	  $paid=$paid+$row['Rcv_amt'];
	    
  }
  echo $due=$total-$paid;
}


if($cat=="add")
{
	$date = date("Y-m-d", strtotime($_POST['date']));
$amount = $_POST['amt']; 
$mode = $_POST['mode'];
$ChqNo = $_POST['ChqNo'];
$Chqdt = date("Y-m-d", strtotime($_POST['datepicker']));
 $res = "INSERT INTO payment_trns (Invoice, Date, Rcv_amt, Pay_mode,Chque_no,Chque_date) VALUES ('$invoice',  '$date', '$amount', '$mode','$ChqNo','$Chqdt')";
 if(mysql_query($res)) {
   echo "Your Record Uploaded Successfully";
  } else {
   echo "Error To Insert Record..";
  }
}
?>