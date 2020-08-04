<?php
include_once 'config.php';
$cat=$_POST['cat'];

if($cat=="add")
{
$name=mysql_real_escape_string($_POST['name']);
$date = date("Y-m-d", strtotime($_POST['date']));
$batch = $_POST['batch']; 
$made = $_POST['made'];
$qty = $_POST['qty'];
$serial = $_POST['serial'];


 $res = "INSERT INTO stock_master (Name, Date, madeBy, serialNo,batchNo,Quantity) VALUES ('$name',  '$date', '$made', '$serial','$batch','$qty')";
 if(mysql_query($res)) {
   echo "Your Record Uploaded Successfully";
  } else {
   echo "Error To Insert Record..";
  }
}

?>