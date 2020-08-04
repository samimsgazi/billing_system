<?php
include_once '../config.php';
$id=$_GET['id'];
mysql_query("delete from tax_master where tax_id='$id'");
header("location: ../tax-master.php");


?>