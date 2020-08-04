<?php
include_once '../config.php';
$id=$_GET['id'];
mysql_query("delete from service_master where serv_id='$id'");
header("location: ../service-master.php");


?>