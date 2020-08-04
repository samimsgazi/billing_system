<?php
include_once '../config.php';
$id=$_GET['id'];
mysql_query("delete from prod_master where prod_id='$id'");
header("location: ../product-master.php");


?>