$(document).ready(function() {
	$("#Search").click(function() {
		var id=document.getElementById("billno").value;
		var frdate=document.getElementById("frmdate").value;
		var todate=document.getElementById("todate").value;
		var chk=document.querySelector('input[id="type"]:checked').value;
		var cat=document.querySelector('input[id="cat"]:checked').value;
		if (cat==1 || cat==2)
		{
		$.ajax({
		      type: "Post",
		      url: "search.php",
			  data: {
			id:id, frdate:frdate, todate:todate,  btn:chk, cat:cat
			},
		      success: function(data) {
					var obj = $.parseJSON(data);      
					var result = "<table border=1 border-collapse: collapse width=100%><tr outerWidth=80px><th>Invoice Number</th> <th>Date</th> <th>Customer Name</th> <th>Tax Amount</th> <th>Bill Amount</th> </tr>"
				    $.each(obj, function() {
				    	result = result + "<tr><td> " + this['serv_bill_no'] + " </td>  <td> " +  this['bill_date'] + "</td>  <td> " + this['CustomerName'] + "</td>   <td align=right> " + this['tax_amt'] + "</td> <td align=right> " + this['Net_Amt'] + "</td> </tr>"; 
				    });
					result = result + "</table>"
					$("#result").html(result);
			  }
		});	
		}
		else if (cat==3)  {
			
			
			$.ajax({
		      type: "Post",
		      url: "stocks.php",
			  /*data: {
			id:id, frdate:frdate, todate:todate,  btn:chk, cat:cat
			},*/
		      success: function(data) {
					
					$("#result").html(data);
			  }
		});	
			
			
			
		}
	});
});
