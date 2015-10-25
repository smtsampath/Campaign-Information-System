<?php

require_once("../../includes/dbopen.inc.php");
require_once("../../includes/Session.php"); 
require_once("../../includes/User.Cls.php");
require_once("../../includes/Product.Cls.php");
require_once("../../includes/Sales.Cls.php");
admin_confirm(); 
confirm_logged_in();

?>
<?php require_once("../layouts/user_header.php"); ?>
		 <!-- Begin Right Column -->
		 <div id="report_block2">
<table width="100%" border="0">
    <tr>
      <td class="td1"  align="center" ><a href="admin.php"><strong>Home</strong></a></td>
      <td class="td4"  align="center" ><font color="#FF6666"><strong>Sales Reports</strong></font></td> 
      <td class="td4"  align="center" ><a href="Reports2.php"><strong>Campaign Summery</strong></a></td>
      <td class="td1"  align="center" ><a href="help.php" target="_new"><strong>!Help</strong></a></td>      
     <td align="right"  bgcolor="#CCCCFF"><span id="clock"></span></td>
  </tr>
  <tr>
    <td class="td1" align="center" colspan="5">
     <p><form action="Reports.php" method="post">
      Sales Reports (Product ID):
      <input type="Text" name="Productid" id="Productid"  class="input"   size="25"> 
      <input name="submit" type="submit" id="submit" value="View"  />
    </form>
      </p>
    </td>
  </tr> 
  <tr>
    <td colspan="5" height="5">&nbsp;</td>
  </tr> 
  <tr>
    <td  colspan="5" valign="middle">
    
    <table>
             <tr>
             <?php
	if(isset($_POST['submit']) && $_POST['submit']=="View")
{
	$Productid = $_POST['Productid'];
	
?>
               <th class="td1">Time Period</th>
               <th class="td1">Product Name</th>
               <th class="td1">Product Type</th>
               <th class="td1">Product Price</th>
               <th class="td1">Estimated Sales</th>
               <th class="td1">Achived Sales</th>
               <th class="td1">Total Sales</th>
            </tr>
   
          <tr>
 	
<?php
	$query ="SELECT sales.Productid, product.Product_name, product.Product_type, Product_price, sales.Estimated_sales, sales.Starting_date, sales.Ending_date, sales.Achived_sales  FROM sales, product WHERE sales.Productid=('$Productid')";
	$result = mysql_query($query);
	
	for ($count = 0; $row = mysql_fetch_array($result); $count++) {
		$total_sales = ($row['Achived_sales'] * $row['Product_price']);		
	?>	
  <td class="td2"><?php echo $row['Starting_date'] . " to " . $row['Ending_date']?></td> 
  <td class="td2"><?php echo $row['Product_name'] ?></td> 
  <td class="td2"><?php echo $row['Product_type'] ?></td> 
  <td class="td2" align="right"><?php echo $row['Product_price'] ?></td> 
  <td class="td2" align="right"><?php echo $row['Estimated_sales'] ?></td> 
  <td class="td2" align="right"><?php echo $row['Achived_sales'] ?></td> 
  <td class="td2" align="right"><?php echo $total_sales; ?></td>
		
</tr>
<?php } 
}?> 

</table></td></tr>
</table>

		 </div>
		 <!-- End Right Column -->
<?php  include_once("../../includes/dbclose.inc.php");?>
<?php require_once("../layouts/user_footer.php"); ?>