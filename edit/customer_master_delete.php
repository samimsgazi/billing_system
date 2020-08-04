<?php
include_once '../config.php';
$id=$_GET['id'];
mysql_query("delete from customer_master where id='$id'");
header("location: ../customer-master.php");


?>