<?php
include_once '../config.php';
$id=$_GET['id'];
mysql_query("delete from prod_group where prgroup_id='$id'");
header("location: ../product-group.php");


?>