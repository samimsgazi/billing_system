<?php
$bill = $_POST['id'];
$fdate = date("Y-m-d", strtotime($_POST['frdate']));

$tdate = date("Y-m-d", strtotime($_POST['todate']));
$table = $_POST['cat'];
$option = $_POST['btn'];
//connect to the mysql
include_once '../config.php';

//database query
if($table=="1"){
if($option=="1"){
$sql = @mysql_query("select * from serv_bill_master where serv_bill_no='$bill'");

$rows = array();
while($r = mysql_fetch_assoc($sql)) {
  $rows[] = $r;
}
echo json_encode($rows);
}

if($option=="2"){    
$sql = @mysql_query("SELECT * FROM serv_bill_master WHERE bill_date BETWEEN '$fdate' and '$tdate'");

$rows = array();
while($r = mysql_fetch_assoc($sql)) {
  $rows[] = $r;
}
echo json_encode($rows);
}
}

elseif($table=="2"){
if($option=="1"){
$sql = @mysql_query("select * from prod_bill_master where serv_bill_no='$bill'");

$rows = array();
while($r = mysql_fetch_assoc($sql)) {
  $rows[] = $r;
}
echo json_encode($rows);
}

if($option=="2"){    
$sql = @mysql_query("SELECT * FROM prod_bill_master WHERE bill_date BETWEEN '$fdate' and '$tdate'");

$rows = array();
while($r = mysql_fetch_assoc($sql)) {
  $rows[] = $r;
}
echo json_encode($rows);
}
}

?>