<?php
include_once '../config.php';
$id=$_GET['id'];
$chk=mysql_query("SELECT * FROM prod_bill_master WHERE  id = '$id' ");
 $rec=mysql_fetch_assoc($chk);


if(isset($_POST['submit']))
{

	 $custName=$_POST['ddlcus'];
	 $billno=$_POST['billno'];
	 $billdate=$_POST['billdate'];
	 $tax=$_POST['ddltax'];
	 $taxper=$_POST['taxper'];
	 $custAdd=$_POST['txtAdd'];
	 $City=$_POST['txtCity'];
	 $Dist=$_POST['txtDist'];
	 $Ph=$_POST['txtPh'];
	 $taxamt=$_POST['taxamt'];
	 $total=$_POST['total'];
	 $Net=$_POST['txtNet'];
	 $InWord=$_POST['AmtInWord'];

  $res = "  UPDATE prod_bill_master SET serv_bill_no='$billno', bill_date='$billdate',CustomerName='$custName', Address1='$custAdd', City='$City',CellNo='$Ph', tax_id='$tax', tax_amt='$taxamt', total_amt='$total', Net_Amt='$Net', In_Word='$InWord' WHERE serv_bill_no='$billno'";
  
	if(mysql_query($res))
	{
		mysql_query("DELETE FROM product_bill_trans WHERE serv_bill_id='$billno'");
		$qty = $_POST['qty'];
		$rate = $_POST['rate'];
		$service = $_POST['Srvs'];
		 $amt = $_POST['amt'];
		 $i=0;
		foreach($qty as $a => $b )
		
		mysql_query( "INSERT INTO product_bill_trans (SlNo,serv_bill_id,serv_id,serv_rate,serv_qty,serv_amt) VALUES ('$i','$billno','$service[$a]','$rate[$a]','$qty[$a]','$amt[$a]')");
	
	}

	if(mysql_query($res))
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Record updated successfully')
    window.location.href='../product-bill-trans.php';
    </SCRIPT>");
	}
	else{
		?>
        <script>alert('Error To Update Record...');</script>
        <?php
	}
}
?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Service Bill Edit</title>
<script  src="../libs/jquery/jquery.min.js"></script>
	<link rel="stylesheet" href="../assets/demo.css">
	<link rel="stylesheet" href="../assets/form-basic.css">


<SCRIPT language="javascript">
       /* function addRow(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var colCount = table.rows[1].cells.length;
 
            for(var i=0; i<colCount; i++) {
 
                var newcell = row.insertCell(i);
 
                newcell.innerHTML = table.rows[1].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                    case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                }
            }
        }*/
 
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
            for (i=0; i<listitems.length; i++) {
              listitems[i].setAttribute("oninput", "calculate('"+row.id+"')");
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
	
	 /* var totalamt = document.getElementById("total").value;  //mainRow.querySelectorAll('[id=total]')[0];
	var totam=1 + totalamt;
	totalamt.value=totam;
	alert(totam);*/
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
var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

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
		<h1>Billing System</h1>
        
    </header>

    <ul>
        <!--<li><a href="index.html" class="active">Costomer</a></li>
        <li><a href="service-master.html">Service</a></li>
        <li><a href="form-login.html">Product Group</a></li>
        <li><a href="form-mini.html">Mini</a></li>
        <li><a href="form-labels-on-top.html">Labels on Top</a></li>
        <li><a href="form-validation.html">Validation</a></li>
        <li><a href="form-search.html">Search</a></li>-->
    </ul>


    <div class="main-content">

        <!-- You only need this form and the form-basic.css -->

        <form class="form-basic" method="post" action="">
        
         <div class="form-row">
                <label>
                    <span>Customer Name</span>
                   <select name="ddlcus" id="ddlcus" required>
                   <?php
                   echo "<option value='$rec[CustomerName]' selected>$rec[CustomerName]</option>";
                    ?>
					</select>
  
                </label>
               <label>
                    <span>Bill No</span>
                    <input type="text" name="billno" placeholder="Bill No" value="<?php echo $rec['serv_bill_no']; ?>" readonly required>
                </label>
            </div>
            <div class="form-row">
            <label>
                    <span>Address</span>
                    <input style="width:170px;" type="text" name="txtAdd" id="txtAdd" value="<?php echo $rec['Address1']; ?>"  readonly >
                </label>
                <label>
                    <span>City</span>
                    <input style="width:170px;" type="text" name="txtCity" id="txtCity" value="<?php echo $rec['City']; ?>" readonly >
                    </label>
            </div>
            <div class="form-row">
            <label>
                    <span>Dist</span>
                    <input style="width:170px;" type="text" name="txtDist" id="txtDist" value="<?php echo $rec['Dist']; ?>" readonly>
                </label>
                <label>
                    <span>Ph No</span>
                    <input style="width:170px;" type="text" name="txtPh" id="txtPh" value="<?php echo $rec['CellNo']; ?>" readonly >
                    </label>
            <!-- <script>
						
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
						
				</script>-->
            </div>
<div class="form-row">
                <label>
                    <span>Bill Date</span>
                    <input style="width:170px;" type="date" name="billdate" value="<?php echo $rec['bill_date']; ?>" required>
                </label>
                <label>
                    <span>Tax</span>
                    <select name="ddltax" id="tax" required>
            <option value="<?php echo $rec['tax_id']; ?>" data-price="<?php echo $rec['taxPer']; ?>"><?php echo $rec['tax_id']; ?></option>
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
       <input type="text" name="taxper" id="taxper" value="<?php echo $rec['taxPer']; ?>" readonly style="width:40px;" >%
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
            
     <INPUT style="width:100px;" type="button" value="Add Row" name="add" onClick="addRow('dataTable')" />
 
    <INPUT style="width:100px;" type="button" value="Delete Row" onClick="deleteRow('dataTable'); totalcal(); " />
 <div align="center" style="overflow-y: scroll; height: 270px; " >
   <table width="550px" border="1">
   <thead>
     <td width="13px">Chk</td><td>Service</td><td>Price</td><td>Qty</td><td>Amt</td>
     </thead>
   </table>
    <TABLE id="dataTable" width="550px" border="1">
      
        <?php
		$i=0;
		$trans=mysql_query("Select * from product_bill_trans where serv_bill_id='$rec[serv_bill_no]' ");
         while ($rowtrns=mysql_fetch_array($trans))
   {  ?>
        <tr id='<?php echo $row='row_'.$i;  ?>'>
                      
            <TD><INPUT id="Srvs" type="checkbox" name="chk[]"/></TD>
            <TD><select name="Srvs[]" id="category1" onChange="calculate('row_0')" required>
                   <?php
$rs=mysql_query("Select * from prod_master order by  prod_id");
	  while($row=mysql_fetch_array($rs))
{
if($row[0]==$Srvs)
{
echo "<option value='$row[1]'  selected>$row[1]</option>";
//echo '<option value="'.$row['name'].'"  data-price="'.$row['precio'].'">'.$row['name'].'</option>'';
}
else
{
echo "<option value='$row[1]' >$row[1]</option>";
}
}
?>
                    </select>
                    <script>

</script>
                                       
                    </TD>
                                        
              <TD ><INPUT style="width:50px;" type="text" name="rate[]" id="rate" onKeyUp="totalcal();" value="<?php echo $rowtrns['serv_rate']; ?>" oninput="calculate('<?php echo $row='row_'.$i;  ?>')"/></TD>
            <TD>
                <INPUT style="width:80px;" type="text" name="qty[]" id="qty" onKeyUp="totalcal();" oninput="calculate('<?php echo $row='row_'.$i;  ?>')" value="<?php echo $rowtrns['serv_qty']; ?>" required />
            </TD>
            <td>
            <INPUT style="width:50px;" type="text" name="amt[]" id="amt" value="<?php echo $rowtrns['serv_amt']; ?>"  readonly/>
            </td>
        </tr>
       
        <?php $i++; } ?>
        
    </TABLE>
   
    
    
            </div>
              <div >
              <table>
              
               <tr>
              <td >Tax Amount<input style="width:90px;" type="text" name="taxamt" id="taxamt" value="<?php echo $rec['tax_amt']; ?>" readonly /> </td>
                <td >Gross  <input style="width:90px;" type="text" name="total" id="tot"value="<?php echo $rec['total_amt']; ?>"  readonly /> <td>
                <td >Net  <input style="width:90px;" type="text" name="txtNet" id="txtNet" onChange="inWords ();" value="<?php echo $rec['Net_Amt']; ?>" readonly  /> <td>
                </tr>
                <tr><td>Amunt In Word</td><td colspan="2" ><input type="text" name="AmtInWord" id="AmtInWord" value="<?php echo $rec['In_Word']; ?>" readonly > </td> </tr>
                </table>
              </div>  
        

            
                <button type="submit" name="submit">Update</button>
               
           
        </form>

    </div>

</body>

</html>
