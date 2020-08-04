<?php
include_once 'config.php';
 ?>
<!DOCTYPE html>
<html>

<head>
<!--<script  src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>-->

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Service Bill Master</title>
<!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
	<script  src="libs/jquery/jquery.min.js"></script>
    
    <link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-basic.css">
    
<SCRIPT language="javascript">    
 function addRow(tableID) {
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
    if (rowCount < 20) { // limit the user from creating fields more than your limits
        var row = table.insertRow(rowCount);
        
        var colCount = table.rows[0].cells.length;
        row.id = 'row_'+rowCount;
        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;            
        }
       var listitems= row.getElementsByTagName("input")
	    var listselect= row.getElementsByTagName("select")
            for (i=0; i<listitems.length; i++) {
              listitems[i].setAttribute("oninput", "calculate('"+row.id+"')");
			  listselect[i].setAttribute("onChange", "service('"+row.id+"')");
            }
    } else {
        alert("Maximum Row is 20.");

    }
}

 
        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
 
            }
            }catch(e) {
                alert(e);
            }
        }
		
		
		function calculate(elementID) {
    var mainRow = document.getElementById(elementID);
    var myBox1 = mainRow.querySelectorAll('[id=rate]')[0].value;
    var myBox2 = mainRow.querySelectorAll('[id=qty]')[0].value;
    var total = mainRow.querySelectorAll('[id=amt]')[0];
	var myResult1 = myBox1 * myBox2;
    total.value = myResult1;
	
	//var cat=mainRow.querySelectorAll('[id=category1]')[0].value;
	//alert(cat);
/*	$("#cat").change(function () {
    var price = cat.find(':selected').data('price');
   // $('#taxper').val(price);
	myBox1.value=price;
	
});*/
	
	
	}
 function totalcal(){
			var ne=0;
			var tax= document.getElementById("taxper").value;		
	    	var totalamt = document.getElementById("tot").value;
			var table = document.getElementById("dataTable");
            var rowCount = table.rows.length;
			var a;
	    	var colCount = table.rows[0].cells.length;
            for (var i = 0; i < rowCount; i++) {
           var amt=table.rows[i].querySelectorAll('[id=amt]')[0].value;; 
		  			
			var ne= Number(ne) + Number(amt);
			 $('#tot').val(ne);
			 var taxamt= Number(ne) * Number(tax) /100;
			  $('#taxamt').val(taxamt);
			  var net=Math.round(Number(ne) + Number(taxamt));
			  //alert(net);
			 
			  $('#txtNet').val(net);
			 //alert(ne);
			 inWords ();
}
			
		}
		
    </SCRIPT>
   <script>
	 
	 var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
var b = ['', '', 'Twenty','Thirty','Forty','Fifty', 'Sixty','Seventy','Eighty','Ninety'];

function inWords () {
	var num=document.getElementById("txtNet").value;
	
    if ((num = num.toString()).length > 9) return 'overflow';
    n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
    if (!n) return; var str = '';
    str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
    str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
    str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
    str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
    str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
 // return str;
  $('#AmtInWord').val(str);
  //alert(str);
	
}

	 </script>
</head>


	<header>
    <h6 align="right" style="color:#FFFFFF"><a href="https://www.brainwareuniversity.ac.in/" target="_new">Developed by Brainware University Student</a></h6>
		<h1>Service Bill Transaction</h1>
        
    </header>

    <ul>
      <li><a href="companymaster.php" >Company Details</a></li>
        <li><a href="customer-master.php" >Customer</a></li>
        <li><a href="service-master.php">Service</a></li>
        <li><a href="service-bill-trans.php" class="active">Service Bill</a></li>
        <li><a href="product-group.php">Product Group</a></li>
        <li><a href="product-master.php">Product</a></li>
        <li><a href="product-bill-trans.php">Product Bill</a></li>
        <li><a href="tax-master.php">Tax</a></li>
         <li><a href="Reports/service_report.php">Report</a></li>
         <ul>
        <li><a href="employee-master.php">Employee</a></li>
       <!--  <li><a href="stock-master.php">Stock</a></li> -->
        <li><a href="payment/payment.php">Payment</a></li>
         </ul>
    </ul>

<?php
 $cod=mysql_fetch_assoc(mysql_query("select name from company_master"));
$chk=mysql_query("select * from serv_bill_master order by id");
if(mysql_num_rows($chk)>0){
	while($code=mysql_fetch_assoc($chk))
	{
 $lcod= $code['serv_bill_no'];	
}
	  
	 $nres=substr("$lcod",0,5); 
	 $num =substr("$lcod",5,9); 
	 $num=$num+1;
	 $ncod = $nres.str_pad($num, 6, "0", STR_PAD_LEFT);
}
else{
	$str=$cod['name'];
     $res=substr("$str",0,2);
	 $ncod=$res."/S/"."000001"; 
}

?>
    <div class="main-content">

        <form class="form-basic" method="post" action="service-billdb.php">
        <div class="form-title-row">
        <h1>Service Bill </h1>
        </div>
         <div class="form-row">
                <label>
                    <span>Customer Name</span>
                   <select name="ddlcus" id="ddlcus" required>
                   <option>------Select Name-----</option>
                   <?php
						$rs=mysql_query("Select * from customer_master order by id");
							  while($row=mysql_fetch_array($rs))
						{
						if($row[0]==$ddlcus)
						{
						echo "<option value='$row[1]' data-Add='$row1[address1]' selected>$row[1]</option>";
						}
						else
						{
						echo "<option value='$row[1]' data-Add='$row[3],$row[5],$row[4],$row[7]' >$row[1]</option>";
						}
						}
					?>
                    </select>
  
                </label>
               <label>
                    <span>Bill No</span>
                    <input type="text" style="width:170px;" name="billno" id="billno" placeholder="Bill No" value="<?php echo $ncod?>" readonly required>
                </label>
            </div>
            <div class="form-row">
            <label>
                    <span>Address</span>
                    <input style="width:170px;" type="text" name="txtAdd" id="txtAdd" readonly >
                </label>
                <label>
                    <span>City</span>
                    <input style="width:170px;" type="text" name="txtCity" id="txtCity" readonly >
                    </label>
            </div>
            <div class="form-row">
            <label>
                    <span>Dist</span>
                    <input style="width:170px;" type="text" name="txtDist" id="txtDist" readonly>
                </label>
                <label>
                    <span>Ph No</span>
                    <input style="width:170px;" type="text" name="txtPh" id="txtPh" readonly >
                    </label>
             <script>
						
						$("#ddlcus").change(function () {
							var data = $(this).find(':selected').data('Add').split(',');;
							var Add=data[0];
							var Dist=data[1];
							var City=data[2];
							var Ph=data[3];
							$('#txtAdd').val(Add);
							$('#txtDist').val(Dist);
							$('#txtCity').val(City);
							$('#txtPh').val(Ph);
							
						});
						
				</script>
            </div>
<div class="form-row">
                <label>
                    <span>Bill Date</span>
                    <input style="width:170px;" type="date" name="billdate" required>
                </label>
                <label>
                    <span>Tax</span>
                    <select name="ddltax" id="tax" required>
            <option value="Null">-----Select tax----</option>
                   <?php
$rs1=mysql_query("Select * from tax_master order by  tax_id");
	  while($row1=mysql_fetch_array($rs1))
{
if($row1[0]==$Srvs1)
{
echo "<option value='$row1[1]' data-price='$row1[taxrate]' selected>$row[1]</option>";
//echo '<option value="'.$row['name'].'"  data-price="'.$row['precio'].'">'.$row['name'].'</option>'';
}
else
{
echo "<option value='$row1[1]' data-price='$row1[taxrate]'>$row1[1]</option>";
}
}
?>
                    </select>
                    <input type="text" name="taxper" id="taxper" readonly style="width:40px;" >%
                </label>
            </div>
            <script>

$("#tax").change(function () {
    var price = $(this).find(':selected').data('price');
    $('#taxper').val(price);
	var totalamt = document.getElementById("tot").value;
	 var taxamt= Number(totalamt) * Number(price) /100;
			  $('#taxamt').val(taxamt);
			  totalcal();
			  inWords ();
	
});

</script>
            <div class="form-row">
            <label>
                    <span>Referance</span>
                    <select name="ddlrfrns"   >
            <option>------Referance------</option>
                   <?php
$rs=mysql_query("Select * from employee_master order by  id");
	  while($row=mysql_fetch_array($rs))
{
if($row[0]==$Srvs)
{
echo "<option value='$row[1]' selected>$row[1]</option>";
//echo '<option value="'.$row['name'].'"  data-price="'.$row['precio'].'">'.$row['name'].'</option>'';
}
else
{
echo "<option value='$row[1]' >$row[1]</option>";
}
}
?>
                    </select>
                </label>
                
            </div>
            
     <INPUT style="width:100px;" type="button" value="Add Row" name="add" onClick="addRow('dataTable')" />
 
    <INPUT style="width:100px;" type="button" value="Delete Row" onClick="deleteRow('dataTable'); totalcal(); " />
 <div align="center" style="overflow-y: scroll; height: 230px; " >
   <table width="570px" border="1">
   <thead>
     <td align="center" width="185px">Service</td><td width="120px" align="center">By</td><td align="center" width="87px">Price</td>
     <td align="center" width="87px">Qty</td><td align="center">Amt</td>
     </thead>
   </table>
    <TABLE id="dataTable" width="570px" border="1">
     
        <TR id='row_0'>
       
            <TD><INPUT id="Srvs" type="checkbox" name="chk[]"/></TD>
            <TD><select name="Srvs[]" id="category1" onChange="service('row_0')" required>
            <option>-----Select Srvice----</option>
                   <?php
$rs=mysql_query("Select * from service_master order by  serv_id");
	  while($row=mysql_fetch_array($rs))
{
if($row[0]==$rs)
{
echo "<option value='$row[1]' data-price='$row[serv_rate]' selected>$row[1]</option>";
//echo '<option value="'.$row['name'].'"  data-price="'.$row['precio'].'">'.$row['name'].'</option>'';
}
else
{
echo "<option value='$row[1]' data-price='$row[serv_rate]'>$row[1]</option>";
}
}
?>
                    </select></TD>
                    
                    <TD><select name="doby[]" id="doby" onChange="calculate('row_0')" required>
            <option>--Doing By--</option>
                   <?php
$rs=mysql_query("Select * from employee_master order by  id");
	  while($row=mysql_fetch_array($rs))
{
if($row[0]==$rs)
{
echo "<option value='$row[1]' selected>$row[1]</option>";
//echo '<option value="'.$row['name'].'"  data-price="'.$row['precio'].'">'.$row['name'].'</option>'';
}
else
{
echo "<option value='$row[1]' >$row[1]</option>";
}
}
?>
                    </select></TD>
                    
                     <TD ><INPUT style="width:80px;"  type="text" name="rate[]" id="rate" onKeyUp="totalcal()" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  oninput="calculate('row_0')"  /></TD>
            <TD>
                <INPUT style="width:80px;" type="text" name="qty[]" id="qty" onKeyUp="totalcal();" onkeypress='return event.charCode >= 48 && event.charCode <= 57' oninput="calculate('row_0')" required />
            </TD>
            <td>
            <INPUT style="width:70px;" type="text" name="amt[]" id="amt"   readonly="true"/>
            
            </td>
           
        </TR>
        
    </TABLE>
    <script>
	function service(elementID){
	 var mainRow = document.getElementById(elementID);
	 
	/* $("#category1").change(function () {
		 
	 
    var price = $(this).find(':selected').data('price');
	var myBox1 = mainRow.querySelectorAll('[id=rate]')[0];
		myBox1.value=price;

		
});*/
	}
	</script>
   
            </div>
              <div >
              <table>
              
               <tr>
                <td>Tax Amount<input style="width:90px;" type="text" name="taxamt" id="taxamt"  readonly /> </td>
                <td >Gross  <input style="width:90px;" type="text" name="total" id="tot"  readonly /> <td>
                <td >Net  <input style="width:90px;" type="text" name="txtNet" id="txtNet" onChange="inWords ();"  readonly  /> <td>
                </tr>
                <tr><td>Amunt In Word</td><td colspan="2" ><input  type="text" style="width:300px; " name="AmtInWord" id="AmtInWord" readonly > </td> </tr>
                </table>
              </div>  
        

            
                <button type="submit" name="submit">Add</button></label><br>
                <div align="center"  style="overflow-y: scroll; height: 200px; ">

  <?php
			 	$Qry = "Select * from serv_bill_master order by id DESC";
                
				$sql = mysql_query ($Qry);
				echo "<table border='1' border-color='#ff0000'>
				<tr>
				<td align='Center' bgcolor='#00BFFF'>Bill No</td>
				<td align='Center' bgcolor='#00BFFF'>Bill Date</td>
				<td align='Center' bgcolor='#00BFFF'>Customer</td>
				<td align='Center' bgcolor='#00BFFF'>Tax</td>
				<td align='Center' bgcolor='#00BFFF'>Tax Amt</td>
				<td align='Center' bgcolor='#00BFFF'>Gross</td>
				<td align='Center' bgcolor='#00BFFF'>Edit</td>
				<td align='Center' bgcolor='#00BFFF'>Delete</td>
				<td align='Center' bgcolor='#00BFFF'>Print</td>
				</tr>";
				while($row = mysql_fetch_array($sql))
				  {
				  echo "<tr>";
				  echo "<td align='Center'>" . $row['serv_bill_no'] . "</td>";
				  echo "<td align='Center'>" . $row['bill_date'] . "</td>";
				  echo "<td align='Center'>" . $row['CustomerName'] . "</td>";
				  echo "<td align='Center'>" . $row['tax_id'] . "</td>";
				  echo "<td align='Center'>" . $row['tax_amt'] . "</td>";
				  echo "<td align='Center'>" . $row['total_amt'] . "</td>";
				  echo "<td align='Center'>" ; ?> <a href=edit/service-bill-edit.php?id=<?php echo $row['id']?> >Edit </a> <?php "</td>";
				  echo "<td align='Center'>" ; ?> <a href=edit/service-bill-delete.php?id=<?php echo $row['id']?>&bill=<?php echo $row['serv_bill_no']?> onclick="return confirm('Are you sure to delete?');" >Delete </a> <?php "</td>";
				  
				  echo "<td align='Center'>" ; ?> <a href=edit/service-bill-print.php?id=<?php echo $row['id']?>&bill=<?php echo $row['serv_bill_no']?> >Print </a> <?php "</td>";
				 
				  echo "</tr>";
				  }
				echo "</table>";
			?>
</div>
           
        </form>

    </div>
    
    
    
       <!-- <div class="modal fade" id="myModal" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Bill Records</h4>
                  </div>
                  <div class="modal-body"> 
               	 
                  </div>
                  <div class="modal-footer">
                    
                    
                  
                  </div>
                </div>
              </div>
            </div>
<script src="js/bootstrap.min.js"></script>-->
</body>

</html>
