<?php
include_once 'config.php';

if(isset($_POST['submit'])){
	 $custName=$_POST['ddlcus'];
	 $billno=$_POST['billno'];
	 $billdate=$_POST['billdate'];
	 //$billdate = date("d-m-Y", strtotime($_POST['billdate']));
	 $tax=$_POST['ddltax'];
	 $taxper=$_POST['taxper'];
	 $custAdd=$_POST['txtAdd'];
	 $City=$_POST['txtCity'];
	 $Dist=$_POST['txtDist'];
	// $Pin=$_POST['txtDist'];
	 $Ph=$_POST['txtPh'];
	 $taxamt=$_POST['taxamt'];
	 $total=$_POST['total'];
	 $Net=$_POST['txtNet'];
	 $InWord=$_POST['AmtInWord'];
	 $referns=$_POST['ddlrfrns'];
	
	$res = "INSERT INTO prod_bill_master (serv_bill_no,bill_date,CustomerName,Address1,City,Dist,CellNo,tax_id,taxPer,tax_amt,total_amt,Net_Amt,In_Word,referns) VALUES ('$billno','$billdate','$custName','$custAdd','$City','$Dist','$Ph','$tax','$taxper','$taxamt','$total','$Net','$InWord','$referns')";
	
	
	if(mysql_query($res))
	{
	//mysql_query("SELECT serv_bill_id FROM serv_bill_master WHERE serv_bill_no='$billname'");
	$id=mysql_fetch_assoc(mysql_query("SELECT id FROM prod_bill_master WHERE serv_bill_no='$billno'"));
	$varid=$id['id'];
	
	
$qty = $_POST['qty'];
$rate = $_POST['rate'];
$service = $_POST['Srvs'];
$doby = $_POST['doby'];
$amt = $_POST['amt'];
$i=0;
foreach($qty as $a => $b)
//echo ++$i;
mysql_query( "INSERT INTO product_bill_trans (SlNo,serv_bill_id,serv_id,DoBy,serv_rate,serv_qty,serv_amt) VALUES ('$i','$billno','$service[$a]','$doby[$a]','$rate[$a]','$qty[$a]','$amt[$a]')");
  //mysql_query($add);
  //echo "$service[$a]  -  $rate[$a]  -  $qty[$a] -  $amt[$a] <br />";

}
?>



<div id="divToPrint" style="display:none;">
  <!--<div style="width:1000px;height:300px;background-color:teal;">-->
         <?php
$com=mysql_fetch_assoc(mysql_query("SELECT * FROM company_master"));
$rec=mysql_fetch_assoc(mysql_query("SELECT * FROM prod_bill_master WHERE serv_bill_no='$billno'"));
$trans=mysql_query("SELECT * FROM product_bill_trans WHERE serv_bill_id='$rec[serv_bill_no]'");

?>

           <div style="font-family:Verdana, Geneva, sans-serif" >
           <!-- Company Details -->
           <table width="650px" >
           
           <tr>
           <td><img src="<?php echo $com['image']; ?>" width="125px" height="60px" />  </td>
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
           <tr><td colspan="2" align="center" style="font-size:18px; ">PRODUCT BILL AND TAX INVOICE</td></tr>
           <tr>
           <td>Invoice No: <?php echo $rec['serv_bill_no']; ?> </td>  <td align="right"> Date: <?php echo date("d-m-Y", strtotime($rec['bill_date']));?></td>
           </tr>
           <tr>
           <td colspan="2">To: <?php echo $rec['CustomerName']; ?> <br>
           <?php echo $rec['Address1']; ?>,<?php echo $rec['City']; ?><br>
           Pin- <?php echo $rec['PinCode']; ?><br /> Ph: <?php echo $rec['CellNo']; ?>
           
            </td>
           </tr>
           </table>
           <!-- Transaction Record  -->
            <table width="650px" border="1" style="font-family:'Courier New', Courier, monospace">
            <tr bordercolor="#666666"><th >DESCRIPTION</th> <th>Rate</th><th width="10px" align="right">Qty</th><th width="30px" align="left">AMOUNT</th></tr>
           
          <?php  while($row = mysql_fetch_array($trans))
            {
				echo "<tr>";
				echo "<td >" . $row['serv_id'] .'('.$row['DoBy'] .')'. "</td>";
			 	echo "<td >" . $row['serv_rate'] .'.00'. "</td>";
			 	echo "<td >" . $row['serv_qty'] . "</td>";
			 	echo "<td align=right>" . $row['serv_amt'] .'.00'. "</td>";
				echo "</tr>";
			
			}
            ?>
            <tr>
            <td colspan="3" align="right"> Total </td>
            <td><?php echo $rec['total_amt']; ?>.00</td>
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
          // <td align="right" style="font-size:small"><br /><br />E.&.O.E. </td>
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
		window.location.href='product-bill-trans.php';
    } else {
        window.location.href='product-bill-trans.php';
    }
    </SCRIPT>
    
    
<?php
}

?>

