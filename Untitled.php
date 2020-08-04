<head>
 <script language="javascript" type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
	<script language="javascript" type="text/javascript" src="js/jquery.min.js"></script> 
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
$(document).ready(function() {
$("#update").click(function(e) {
  e.preventDefault();
  var name = $("#name").val(); 
  var last_name = $("#last_name").val();
  var dataString = 'name='+name+'&last_name='+last_name;
  $.ajax({
    type:'POST',
    data:dataString,
    url:'insert.php',
    success:function(data) {
      alert(data);
    }
  });
});
});
</script>
</head>

<form name="frm" method="POST" action="">
 <input type="text" name="name" id="name" value="" />
 <input type="text" name="last_name" id="last_name" value="" />
 <input type="submit" name="Update" id="update" value="Update" />
</form>