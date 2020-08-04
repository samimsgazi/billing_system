<?php
  $name = $_POST['name'];
  $last_name = $_POST['last_name'];
  include_once 'config.php';
  $insert = "insert into users (user,password) values('$name','$last_name')"; // Do Your Insert Query
  if(mysql_query($insert)) {
   echo "Success";
  } else {
   echo "Cannot Insert";
  }
?>