
<?php
include_once '../config.php';
$id=$_GET['id'];
$bill=$_GET['bill'];

?>

<div id="divToPrint" style="display:none;">
  <!--<div style="width:1000px;height:300px;background-color:teal;">-->
         <?php
$com=mysql_fetch_assoc(mysql_query("SELECT * FROM company_master"));
$rec=mysql_fetch_assoc(mysql_query("SELECT * FROM prod_bill_master WHERE id='$id'"));
$trans=mysql_query("SELECT * FROM product_bill_trans WHERE serv_bill_id='$bill'");

?>

           <div   >
           <!-- Company Details -->
           <table width="650px" style="font-family:Verdana, Geneva, sans-serif" >
           
           <tr>
           <td><img src="../<?php echo $com['image']; ?>" width="125px" height="60px" />  </td>
           <td  align="right"><p>
           <?php echo $com['name']; ?><br>
           <?php echo $com['address']; ?>, <?php echo $com['city']; ?>,<?php echo $com['dist']; ?>-<?php echo $com['pin']; ?><br>
          Ph- <?php echo $com['ph_no']; ?><br>Email: <?php echo $com['email']; ?>
           </p>
            </td>
           </tr>
           </table>
           <!-- End Company Details -->
           <table width="650px">
           <tr><td colspan="2" align="center" style="font-size:18px; "> TAX INVOICE</td></tr>
           <tr>
           <td>Invoice No: <?php echo $rec['serv_bill_no']; ?> </td>  <td align="right"> Date: <?php echo date("d-m-Y", strtotime($rec['bill_date']));?></td>
           </tr>
           <tr>
           <td colspan="2">To: <?php echo $rec['CustomerName']; ?> <br>
           <?php echo $rec['Address1']; ?>,<?php echo $rec['City']; ?><br>
           Pin- <?php echo $rec['PinCode']; ?> <br />Ph: <?php echo $rec['CellNo']; ?>
           
            </td>
           </tr>
           </table>
           <!-- Transaction Record  -->
            <table width="650px" border="1" style="font-family:'Courier New', Courier, monospace">
            <tr bordercolor="#666666"><td >DESCRIPTION</td> <td>Rate</td><td width="10px" align="right">Qty</td><td width="30px" align="left">AMOUNT</td></tr>
           
          <?php  while($row = mysql_fetch_array($trans))
            {
				echo "<tr>";
				echo "<td >" . $row['serv_id'] .'('.$row['DoBy'] .')'. "</td>";
			 	echo "<td >" . $row['serv_rate'] . '.00'."</td>";
			 	echo "<td >" . $row['serv_qty'] . "</td>";
			 	echo "<td align=right >" . $row['serv_amt'] .'.00'. "</td>";
				echo "</tr>";
			
			}
            ?>
            <tr>
            <td colspan="3" align="right"> Total </td>
            <td align="right"><?php echo $rec['total_amt']; ?>.00</td>
            </tr>
            <tr>
            <td colspan="3" align="right"> <?php echo $rec['tax_id']; ?>   </td>
            <td align="right"><?php echo $rec['tax_amt']; ?></td>
            </tr>
            <tr>
            <td colspan="3" align="right"> Grand Total </td>
            <td><?php echo $rec['Net_Amt']; ?>.00</td>
            </tr>
            <table width="650px" style="font-family:'Courier New', Courier, monospace">
            <tfoot>
            <tr>
            <td>Rs(In Word): <?php echo $rec['In_Word']; ?> </td>
          <td align="right" style="font-size:small"><br /><br />E.&.O.E. </td>
          </tr>
          <tr>
          <td>VAT No: <?php echo $com['servcetax']; ?> </td>
          </tr>
            </tfoot>
            </table>
            </table>
            <!-- End Transaction Record  -->
           <table style="font-size:9px">
           <th align="left">Terms</th>
           <tr>
           <td>
           <p>
           1) Bill once made cannot be cancelled.<br>2) All disputes are subject to Kolkata jurisdiction.<br>3) All payment in cash.
           </p>
           </td>
           </tr>
           </table>
          
  </div>
</div>

<SCRIPT LANGUAGE='JavaScript'>
   var x;
    if (confirm("Want to print bill..??") == true) {
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=600,height=500');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
		window.location.href='../product-bill-trans.php';
    } else {
        window.location.href='../product-bill-trans.php';
    }
    </SCRIPT>