<?php
include_once '../config.php';
$id=$_GET['id'];
mysql_query("delete from employee_master where id='$id'");
header("location: ../employee-master.php");


?>