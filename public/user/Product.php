<?php

require_once("../../includes/dbopen.inc.php");
require_once("../../includes/Session.php"); 
require_once("../../includes/User.Cls.php");
require_once("../../includes/Product.Cls.php");
confirm_logged_in();


$msg='';
$errmsg='';
$searcherrmsg='';
if(isset($_POST['submit']) && $_POST['submit']=="Search")
{
	
	if(empty($_POST['search_Productid'])) {
		
		$searcherrmsg.='Please Specify the Product ID<br>';
		$Productid = "";
		$Product_name = "";
		$Product_type = "";
		$Product_price = "";
		$Product_description = "";
		
	}
	else {
		$Productid = $_POST['search_Productid'];
		$Productobj = new Product();
		
		 $query  = "SELECT * FROM product WHERE Productid='$Productid' "; 
		$result = mysql_query($query);
		if(mysql_num_rows($result) != 0) {
		$row = mysql_fetch_array($result);
			$Productid = $row['Productid'];
			$Product_name = $row['Product_name'];
			$Product_type = $row['Product_type'];
			$Product_price = $row['Product_price'];
			$Product_description = $row['Product_description'];
		}
		else {
				$searcherrmsg.='Product Not Exisit our database<br>';
				$Productid = "";
		$Product_name = "";
		$Product_type = "";
		$Product_price = "";
		$Product_description = "";
		}
	}
}else {
		$Productid = "";
		$Product_name = "";
		$Product_type = "";
		$Product_price = "";
		$Product_description = "";
}
include_once("../../includes/dbclose.inc.php");
?>
<?php require_once("../layouts/user_header.php"); ?>
		 <!-- Begin lefttcolumn -->
		<div id="leftcolumn">
        <table width="190" border="0">
          <tr>
            <td bgcolor="#CCCCFF" align="center"><strong>Main Menu</strong></td>
          </tr>
          <tr>
            <td class="td3" ><font color="#FF6666">Product</font></td>
          </tr>
          <tr>
            <td class="td3"><a href="User.php">Home</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="help.php" target="_new">Help!</a></td>
          </tr>
          <tr>
          <td height="110">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="../images/products.gif" width="100%" /></td>
          </tr>
        </table>       
        	
        </div>
		 <!-- End leftcolumn -->
		 
		 <!-- Begin Right Column -->
		 <div id="rightcolumn">
<table width="100%" border="0">
        <tr>
     <td colspan="2" align="right" bgcolor="#CCCCFF"><span id="clock"></span></td>
  </tr>
  <tr>
    <td colspan="2" class="td1" align="left">
     <p><form action="Product.php" method="post">
       Product ID:
      <input type="text" name="search_Productid" size="40" />
      <input name="submit" type="submit" value="Search"  />
      <p><?php
if(isset($errmsg)){
	echo "<font color=\"FF0000\">".$searcherrmsg."</font>";
}
?></p>
    </form>
      </p>
    </td>
  </tr> 
  <tr>
    <td colspan="2" height="20">&nbsp;</td>
  </tr> 
  <tr>
    <td  colspan="2" valign="middle">
     <form action="Product.php" method="post">
		  <table align="center" >
         <tr>
		      <td>Product ID:</td>
		      <td>
		        <input type="text" disabled="disabled" id="Productid" size="30" name="Productid" class="input"  value="<?php echo $Productid; ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Product Name:</td>
		      <td>
		        <input type="text" id="Product_name" disabled="disabled" size="30" class="input" name="Product_name" value="<?php echo $Product_name; ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Product Type:</td>
		      <td>
		        <input type="text" id="Product_type" disabled="disabled" size="30" class="input" name="Product_type"  value="<?php echo $Product_type; ?>" />
		      </td>
		    </tr>
            <tr>
		      <td>Product Price:</td>
		      <td>
		        <input type="text" id="Product_price" disabled="disabled" size="30" class="input" name="Product_price" value="<?php echo $Product_price; ?>" />
		      </td>
		    </tr>
            <tr>
		      <td>Product Description:</td>
		      <td>
              	<textarea id="Product_description" disabled="disabled" cols="24" rows="6" class="input" name="Product_description"><?php echo $Product_description; ?></textarea>
		      </td>
		    </tr>
		    <tr>
		      <td colspan="2">&nbsp;</td>
		    </tr>
		  </table>
		</form>
    
    </td>
  </tr>
</table>

		 </div>
		 <!-- End Right Column -->
<?php require_once("../layouts/user_footer.php"); ?>