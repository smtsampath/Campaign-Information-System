<?php

require_once("../../includes/dbopen.inc.php");
require_once("../../includes/Session.php"); 
require_once("../../includes/User.Cls.php");
require_once("../../includes/Sales.Cls.php");
confirm_logged_in();

$msg='';
$errmsg='';

if(isset($_POST['submit']) && $_POST['submit']=="Update")
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
		 if(!(strlen($_POST['Campaignid'])==5)) {
			$errmsg.='Please enter Valid CampaignID<br>';
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
	    
		$Campaignid = check_input($_POST['Campaignid']);
		$Productid = check_input($_POST['Productid']);
		$Ending_date = check_input($_POST['Ending_date']);
		$Achived_sales = check_input($_POST['Achived_sales']);
		$Achived_budget = check_input($_POST['Achived_budget']);
	
		
		$Salesobj = new Sales();
		
		if($Salesobj->update_sales($Campaignid, $Productid, $Ending_date, $Achived_sales, $Achived_budget))
		{
			$msg.= 'Achived Campaign Details successfully updated.<br>';
		}
		else {
			$errmsg.='!Opps Some thing went wrong.<br>';
		}
		
	}	
  }
}

		$Campaignid = "";
		$Productid = "";
		$Ending_date = "";
		$Achived_sales = "";
		$Achived_budget = "";

	
		



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
            <td class="td3" ><font color="#FF6666">Enter Progress</font></td>
          </tr>
          <tr>
            <td class="td3"><a href="User.php">Home</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="help.php" target="_new">Help!</a></td>
          </tr>
          <tr>
          <td height="148">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="../images/Thumbs Up Happy.jpg" width="100%" /></td>
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
    <td colspan="2" align="center"><h1>ENTER CAMPAIGN PROGRESS HERE</h1></td>
  </tr> 
  <tr>
    <td colspan="2" height="20">&nbsp;</td>
  </tr> 
  <tr>
    <tr>
    <td  colspan="2" valign="middle">
       <form action="Progress.php" method="post">
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
		      <td colspan="2" >&nbsp;</td>
		    </tr>
		    <tr>
		      <td>Campaign ID:</td>
		      <td>
		        <input type="text" id="Campaignid" size="30" name="Campaignid" class="input" value="<?php echo $Campaignid; ?>" />
		      </td>
		    <tr>
		      <td>Product ID:</td>
		      <td>
		        <input type="text" id="Productid" size="30" name="Productid" class="input" value="<?php echo $Productid; ?>" />
		      </td>
		    </tr>
            <tr>
		      <td>Archived Sales:</td>
		      <td>
		        <input type="text" id="Achived_sales" size="30" name="Achived_sales" class="input" value="<?php echo $Achived_sales; ?>" />
		      </td>
		    </tr>
            <tr>
		      <td>Achived Budget:</td>
		      <td>
		        <input type="text" id="Achived_budget" size="30" name="Achived_budget" class="input" value="<?php echo $Achived_budget; ?>"/>
		      </td>
		    </tr>
            <tr>
		      <td>Achived Date:</td>
		      <td>
		        <input type="Text" name="Ending_date" id="Ending_date" class="input" value="<?php echo $Ending_date; ?>" size="25"> 
               <a href="javascript:NewCssCal('Ending_date','mmmddyyyy')"><img src="../images/cal.gif" width="16" height="16" alt="Pick a date"></a>
		      </td>
		    </tr>
		    <tr>
		      <td colspan="2">&nbsp;</td>
		    </tr>
		    </tr>
		    <tr>
              <td >&nbsp;</td>
		      <td align="left">
		        <input type="submit" id="submit" name="submit" value="Update" />
		      </td>
		    </tr>
            <tr>
		      <td colspan="2" height="30">&nbsp;</td>
		    </tr>
		  </table>
		</form>
    
    </td>
  </tr>
</table>

		 </div>
		 <!-- End Right Column -->
<?php require_once("../layouts/user_footer.php"); ?>