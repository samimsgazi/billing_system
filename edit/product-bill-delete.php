<?php
include_once '../config.php';
$id=$_GET['id'];
$bill=$_GET['bill'];
mysql_query("delete from prod_bill_master where id='$id' and serv_bill_no='$bill'");
mysql_query("delete from product_bill_trans where serv_bill_id='$bill'");
header("location: ../product-bill-trans.php");



?>