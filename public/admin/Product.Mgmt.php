<?php

require_once("../../includes/dbopen.inc.php");
require_once("../../includes/Session.php"); 
require_once("../../includes/User.Cls.php");
require_once("../../includes/Product.Cls.php");
admin_confirm(); 
confirm_logged_in();

$msg='';
$errmsg='';
if(isset($_POST['submit']) && $_POST['submit']=="Add")
{
        $fvars = array();
		$fvars = $_POST;
	
		foreach ($fvars as $key=>$value) {
			if(!isset($key) || ($value == ''))
				 $errmsg= "All the fields are required.<br>";	          
		}
	
		
	

	if($errmsg=='')
	{
	
	    if(!(strlen($_POST['Productid'])==5)) {
			$errmsg.='Please enter Valid ProductID<br>';
		}
	 
	 if($errmsg=='')
	 {

		function check_input($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			$data = mysql_real_escape_string($data);
		  return $data;
		}
	    
		$Productid = check_input($_POST['Productid']);
		$Product_name = check_input($_POST['Product_name']);
		$Product_type = check_input($_POST['Product_type']);
		$Product_price = check_input($_POST['Product_price']);
		$Product_description = check_input($_POST['Product_description']);
	
		
		$Productobj = new Product();
		
		if($Productobj->createProduct($Productid, $Product_name, $Product_type, $Product_price, $Product_description))
		{
			$msg.= 'New Product successfully crated.<br>';
		}
		else {
			$errmsg.='!Opps Some thing went wrong.<br>';
		}
		
	}	
  }
}

	
	$Productid = "";
		$Product_name = "";
		$Product_type = "";
		$Product_price = "";
		$Product_description = "";


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
            <td class="td3" ><font color="#FF6666">Add Product</font></td>
          </tr>
          <tr>
            <td class="td3"><a href="EditProduct.php">Edit Product</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="DeleteProduct.php">Delete Product</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="admin.php">Home</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="productHelp.php" target="_new">Help!</a></td>
          </tr>
          <tr>
          <td height="74">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="../images/life-insurance.jpg" width="100%" /></td>
          </tr>
        </table>       
        	
        </div>
		 <!-- End leftcolumn -->
		 
		 <!-- Begin Right Column -->
		 <div id="rightcolumn">
<table width="100%" border="0">
        <tr>
        <td align="center" bgcolor="#CCCCFF" ><strong>Logged in <font color="#FF0000"> Admin</font></strong></td>
     <td  align="right" bgcolor="#CCCCFF"><span id="clock"></span></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><h1>ENTER PRODUCT DETAILS HERE</h1></td>
  </tr> 
  <tr>
    <td colspan="2" height="20">&nbsp;</td>
  </tr> 
  <tr>
    <td  colspan="2" valign="middle">
    <form action="Product.Mgmt.php" method="post">
		  <table align="center" >
          <tr>
		      <td colspan="2" class="td1">
              <?php
if(isset($errmsg)){
	echo "<font color=\"FF0000\">".$errmsg."</font>";
}
if(isset($msg)){
	echo "<font color=\"#009966\">".$msg."</font>";
}
?>
              </td>
		    </tr>
            <tr>
		      <td colspan="2">&nbsp;</td>
		    </tr>
          <tr>
		      <td>Product ID:</td>
		      <td>
		        <input type="text" id="Productid" size="30" name="Productid" class="input"  value="<?php echo $Productid; ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Product Name:</td>
		      <td>
		        <input type="text" id="Product_name" size="30" class="input" name="Product_name" value="<?php echo $Product_name; ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Product Type:</td>
		      <td>
		        <input type="text" id="Product_type" size="30" class="input" name="Product_type"  value="<?php echo $Product_type; ?>" />
		      </td>
		    </tr>
            <tr>
		      <td>Product Price:</td>
		      <td>
		        <input type="text" id="Product_price" size="30" class="input" name="Product_price" value="<?php echo $Product_price; ?>" />
		      </td>
		    </tr>
            <tr>
		      <td>Product Description:</td>
		      <td>
              	<textarea id="Product_description" cols="24" rows="6" class="input" name="Product_description"><?php echo $Product_description; ?></textarea>
		      </td>
		    </tr>
		    <tr>
		      <td colspan="2">&nbsp;</td>
		    </tr>
		    </tr>
		    <tr>
              <td >&nbsp;</td>
		      <td align="left">
		        <input type="submit" id="submit" name="submit" value="Add" />
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