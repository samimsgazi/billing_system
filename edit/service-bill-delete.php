<?php
include_once '../config.php';
$id=$_GET['id'];
$bill=$_GET['bill'];
mysql_query("delete from serv_bill_master where id='$id' and serv_bill_no='$bill'");
mysql_query("delete from service_bill_trans where serv_bill_id='$bill'");
header("location: ../service-bill-trans.php");



?>