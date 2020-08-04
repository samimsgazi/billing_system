<?php
include_once '../config.php';
$sql = mysql_query("select DISTINCT prod_name from prod_master ORDER By prod_id");


echo "<table border='1' border-color='#ff0000' width=100%>
				<tr>
				<td align='Center' bgcolor='#00BFFF'>Product Name</td>
				<td align='Center' bgcolor='#00BFFF'>Total Stock</td>
				<td align='Center' bgcolor='#00BFFF'>Sale</td>
				<td align='Center' bgcolor='#00BFFF'>Current Stock</td>
				</tr>";
				while($row = mysql_fetch_assoc($sql))
				{  $tstock=0 ;
					$stock=0 ;
					$sale=0;
				// $stock=$stock + $row['Quantity']; ;
				echo "<tr>";
				echo "<td align='Center'>" . $row['prod_name'] . "</td>";
				
				$open = mysql_query("select * from prod_master where prod_name='$row[prod_name]'");
				 while($row1 = mysql_fetch_assoc($open))
				 {
				 $tstock=$tstock + $row1['Quantity'];
				 }
				echo "<td align='Center'>" . $tstock . "</td>";
				
				$sal = mysql_query("select * from product_bill_trans where serv_id='$row[prod_name]'");
				 while($row2 = mysql_fetch_assoc($sal))
				 {
				 $sale=$sale + $row2['serv_qty'];
				 }
				echo "<td align='Center'>" . $sale . "</td>";
				$stock=$tstock - $sale;
				echo "<td align='Center'>" . $stock . "</td>";
				echo "</tr>";
				 }
  
echo "</table>";


?>