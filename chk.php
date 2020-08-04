<?php
include_once 'config.php';
?>
<html>

	<head>
<script type="text/javascript">
/*onload = function() {
    if (!document.getElementsByTagName || !document.createTextNode) return;
    var rows = document.getElementById('my_table').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    for (i = 0; i < rows.length; i++) {
        rows[i].onclick = function() {
            alert(this.rowIndex + 1);
        }
    }
}*/
function addRow(tableID) {
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
    if (rowCount < 4) { // limit the user from creating fields more than your limits
        var row = table.insertRow(rowCount);
        
        var colCount = table.rows[0].cells.length;
        row.id = 'row_'+rowCount;
		//alert(row.id);
        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;            
        }
       var listitems= row.getElementsByTagName("input")
            for (i=0; i<listitems.length; i++) {
             listitems[i].setAttribute("oninput", "calculate('"+row.id+"')");
            }
    } else {
        alert("Maximum Passenger per ticket is 4.");

    }
}

function deleteRow(tableID) {
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
    for (var i = 0; i < rowCount; i++) {
        var row = table.rows[i];
        var chkbox = row.cells[0].childNodes[0];
        if (null !== chkbox && true === chkbox.checked) {
            if (rowCount <= 1) { // limit the user from removing all the fields
                alert("Cannot Remove all the Passenger.");
                break;
            }
            table.deleteRow(i);
            rowCount--;
            i--;
        }
    }
}

function calculate(elementID) {
    var mainRow = document.getElementById(elementID);
	
    var myBox1 = mainRow.querySelectorAll('[id=rate]')[0].value;
	 alert(myBox1);
    var myBox2 = mainRow.querySelectorAll('[id=qty]')[0].value;
    var total = mainRow.querySelectorAll('[id=amt]')[0];
    var myResult1 = myBox1 * myBox2;
    total.value = myResult1;
	
	var cat=mainRow.querySelectorAll('[id=category1]')[0].value; 
	/*$("cat").change(function () {
    var dept_number = $(this).val();*/
    var price = cat.find(':selected').data('price');
    $('#dept-input').val(price);
    $('#price-input').val(price);

	
	alert(price);


}

//function myFunction(){
///*var a=document.getElementById("txt").value();
//alert(a);*/
//var table = document.getElementById("tabela");
//            var rowCount = table.rows.length;
//var x = document.getElementById("tabela").rows[2].cells[3].firstChild.value;
//for (var i = 0; i < rowCount; i++) {
//	var amt=table.rows[i].cells[3].firstChild.value; 
//alert(amt)
//
//}
//}
	function totalcal(){
			var totalamt = document.getElementById("txt").value;
			var table = document.getElementById("dataTable1");
            var rowCount = table.rows.length;
			//alert(totalamt);
			
	    	var colCount = table.rows[0].cells.length;
            for (var i = 0; i < rowCount; i++) {
           var amt=table.rows[i].querySelectorAll('[id=amt]')[0].value;; 
			 var net=10;
			 var ne=Number(totalamt) + Number(amt);
			 //totalamt.value = ne;
			 $('#txt').val(ne);
			 alert(ne);
			 
}
			
			
		}
</script>


	<title> Dynamically create input fields- jQuery </title>

	<script  src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>        // Calling jQuery Library hosted on Google's CDN




</script>*/
<!--<table id="my_table">
<tbody>
    <tr><td>first row</td></tr>
    <tr><td>second row</td></tr>
    <tr><td>third row</td></tr>
    <tr><td>fourth row</td></tr>
</tbody>
</table>
-->


<select id="category">
    <?php
$rs=mysql_query("Select * from service_master order by  serv_id");
	  while($row=mysql_fetch_array($rs))
{
if($row[0]==$Srvs)
{
echo "<option value='$row[0]' data-price='$row[serv_rate]' selected>$row[1]</option>";
//echo '<option value="'.$row['name'].'"  data-price="'.$row['precio'].'">'.$row['name'].'</option>'';
}
else
{
echo "<option value='$row[0]' data-price='$row[serv_rate]'>$row[1]</option>";
}
}
?>
</select>
<br><br>
<label>Dept. num:</label>
<input type="text" id="dept-input"></input>
<br><br>
<label>Price:</label>
<input type="text" id="price-input"></input>


<input type="button" value="Add" onClick="addRow('dataTable1')" />
<input type="button" value="Remove" onClick="deleteRow('dataTable1')" />
<table id="dataTable1" class="form" border="1">
    <tbody>
    <?php /*?><?php
    $i=0;
	echo "<table border='1' border-color='#ff0000'>";
    while ($i<5)
   {
				  echo "<tr id=row_.$i>";
				  
				  echo "</tr>";
				  $i++;
				  
   }
   echo "</table>";
   ?><?php */?>
   <?php
    $i=0;
	
    while ($i<2)
   {  ?>
        <tr id='<?php echo $row='row_'.$i;  ?>'>
                      
            <TD><INPUT id="Srvs" type="checkbox" name="chk[]"/></TD>
            <TD><select name="Srvs[]" id="category1" onChange="calculate('row_0')" required>
                   <?php
$rs=mysql_query("Select * from service_master order by  serv_id");
	  while($row=mysql_fetch_array($rs))
{
if($row[0]==$Srvs)
{
echo "<option value='$row[0]' data-price='$row[serv_rate]' selected>$row[1]</option>";
//echo '<option value="'.$row['name'].'"  data-price="'.$row['precio'].'">'.$row['name'].'</option>'';
}
else
{
echo "<option value='$row[0]' data-price='$row[serv_rate]'>$row[1]</option>";
}
}
?>
                    </select>
                    <script>

</script>
                                       
                    </TD>
                                        
                     <TD ><INPUT style="width:50px;" type="text" name="rate[]" id="rate" onKeyUp="totalcal();" oninput="calculate('<?php echo $row='row_'.$i;  ?>')"/></TD>
            <TD>
                <INPUT style="width:80px;" type="text" name="qty[]" id="qty" oninput="calculate('<?php echo $row='row_'.$i;  ?>')" required />
            </TD>
            <td>
            <INPUT style="width:50px;" type="text" name="amt[]" id="amt"   disabled/>
            </td>
        </tr>
        <?php $i++; } ?>
        
        
        
        
    </tbody>
</table>

<?php /*?><?php

for($i=0;$i<5;$i++)
{
echo $row='row_'.$i;

}
?><?php */?>
<svg height="210" width="500">
  <line x1="0" y1="0" x2="2030" y2="200" style="stroke:rgb(255,0,0);stroke-width:2" />
  Sorry, your browser does not support inline SVG.
</svg>
	</body>

	</html>
   
   
   
   
   
    <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>




<div id="divToPrint" style="display:none;">
  <div style="width:200px;height:300px;background-color:teal;">
           <?php echo $html; ?>      
  </div>
</div>
<div>
  <input type="button" value="print" onClick="PrintDiv();" />
</div>

<!--<table id="tabela">
    <tr>
        <td><input type="text" value="11"/></td>
        <td><input type="text" value="12"/></td>
        <td><input type="text" value="13"/></td>
        <td><input type="text" value="14"/></td>
    </tr>
    <tr>
        <td><input type="text" value="21"/></td>
        <td><input type="text" value="22"/></td>
        <td><input type="text" value="23"/></td>
        <td><input type="text" value="24"/></td>
    </tr>
    <tr>
        <td><input type="text" value="31"/></td>
        <td><input type="text" value="32"/></td>
        <td><input type="text" value="33"/></td>
        <td><input type="text" value="34"/></td>
    </tr>
</table>-->
