<?php
require_once('session.php');
      
        $sid=$_SESSION['sidrec'];
   
?>
<html>
<head><title>Receipt</title>
    <style type="text/css">
body
{
    background:url(images/<?php echo $selectbg ?>)no-repeat;
    background-size: cover;
}
</style>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,widtd=900, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>List of Passer</title>'); 

   docprint.document.write('</head><body onLoad="self.print()" style="widtd: 900px; font-size:16px; font-family:arial;">');          
   docprint.document.write(content_vlue);    
      
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<style>
#print_content{
width:434px;
margin:0 auto;
}
</style>
</head>

<body>
    
    <div id="print_content">
	<h1 align="center">Grace<h1>
    <h2 align="center">Invoice No: <?php echo $sid ?></h2>
	<?php
		$query=mysqli_query($conn,"SELECT * FROM sales where salesid='$sid'");
		$data=mysqli_fetch_array($query);
		$st=$data['sales_total'];
    $us=$data['userid'];
    $dis=$data['discount'];
    $gt=$data['grandtotal'];
    $pd=$data['paid_amount'];
    $ch=$data['changee'];
		$sdq=mysqli_query($conn,"SELECT * FROM sales_detail where salesid='$sid'");
		$ct=mysqli_num_rows($sdq);

	?>
  <table width="100%" class="table table-striped table-bordered table-hover">
      <thead>
        <th></th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Purchase Qty</th>
        <th>SubTotal</th>
      </thead>
      <tbody>
      <form method="POST" action="">
      <?php
        $query=mysqli_query($conn,"select * from sales_detail where salesid='$sid' ");
        while($row=mysqli_fetch_array($query)){
          $pdid=$row['productid'];
          $qst=mysqli_query($conn,"select * from products where productid='$pdid'");
          $da=mysqli_fetch_array($qst);
          ?>
          <tr>
            <td></td>
            <td><?php echo $da['productname']; ?></td>
            <td><?php echo $row['s_price']; ?></td>
             <td> <?php echo $row['sales_qty'];?></td>
             <td> <?php echo $row['sub_total'];?></td>
            </td>
            <td align="right"><strong><span class="subt">
             
            </span></strong></td>
          </tr>
          <?php
        }
       
      ?>
      <tr></tr>
      <tr>
        <td align="right" colspan="3"><span class="pull-right"><strong>Total</strong></span></td>
        <td></td>
        <td align="left" ><strong><?php echo $st; ?></strong></td>
      </tr>
      <tr>
        <td align="right" colspan="3"><span><strong>Discount</strong></span></td>
        <td></td>
       <td align="left" ><strong><?php echo $dis; ?></strong></td>
      </tr>
      <tr>
        <td align="right" colspan="3"><span><strong>Grand Total</strong></span></td>
        <td></td>
        <td align="left" ><strong><?php echo $gt; ?></strong></td>
      </tr>
      <tr>
        <td align="right" colspan="3"><span><strong>Paid</strong></span></td>
        <td></td>
        <td align="left" ><strong><?php echo $pd; ?></strong></td>
      </tr>
      <tr>
        <td align="right" colspan="3"><span><strong>Change</strong></span></td>
        <td></td>
        <td align="left" ><strong><?php echo $ch; ?></strong></td>
      </tr>
      </form>
      </tbody>
    </table>

</div>
<table align='center'>
    <tr><td><a href='index.php'>Done</a></td><td><a href="javascript:Clickheretoprint()" align="Center">Print</a></td></tr></table>

</body>
</html>
