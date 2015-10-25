<?php

require_once("../../includes/dbopen.inc.php");
require_once("../../includes/Session.php"); 
require_once("../../includes/User.Cls.php");
require_once("../../includes/Sales.Cls.php");
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
		$Starting_date = check_input($_POST['Starting_date']);
		$Ending_date = check_input($_POST['Ending_date']);
		$Estimated_sales = check_input($_POST['Estimated_sales']);
		$Estimated_budget = check_input($_POST['Estimated_budget']);
		
		
		$Salesobj = new Sales();
		
		if($Salesobj->AddEstimation($Campaignid, $Productid, $Starting_date, $Ending_date, $Estimated_sales, $Estimated_budget))
		{
			$msg.= 'New Estimation successfully crated.<br>';
		}
		else {
			$errmsg.='!Opps Some thing went wrong.<br>';
		}
		
	}	
  }
}
else {
			$Campaignid = "";
			$Productid = "";
			$Starting_date = "";
			$Ending_date = "";
			$Estimated_sales = "";
			$Estimated_budget = "";
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
            <td class="td3" ><font color="#FF6666">Add Estimation</font></td>
          </tr>
          <tr>
            <td class="td3"><a href="admin.php">Home</a></td>
          </tr>
          <tr>
          <td height="180">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="../images/insurance-estimate.jpg" width="100%" /></td>
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
    <td colspan="2" align="center"><h1>ENTER ESTIMATED CAMPAIGN DETAILS HERE</h1></td>
  </tr> 
  <tr>
    <td colspan="2" height="20">&nbsp;</td>
  </tr> 
  <tr>
    <td  colspan="2" valign="middle">
    <form action="Estimated_Campaign.php" method="post">
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
		      <td>Campaign ID:</td>
		      <td>
		        <input type="text" id="Campaignid" size="30" name="Campaignid" class="input" maxlength="30" value="" />
		      </td>
		    </tr>
		    <tr>
		      <td>Product ID:</td>
		      <td>
		        <input type="text" id="Productid" size="30" name="Productid" class="input" maxlength="30" value="" />
		      </td>
		    </tr>
            <tr>
		      <td>Starting Date:</td>
		      <td>
		        <input type="Text" name="Starting_date" id="Starting_date"  class="input" maxlength="11" value="" size="25"> 
               <a href="javascript:NewCssCal('Starting_date','mmmddyyyy')"><img src="../images/cal.gif" width="16" height="16" alt="Pick a date"></a>
		      </td>
		    </tr>
            <tr>
		      <td>Ending Date:</td>
		      <td>
		        <input type="Text" name="Ending_date" id="Ending_date" maxlength="11" class="input" value="" size="25"> 
               <a href="javascript:NewCssCal('Ending_date','mmmddyyyy')"><img src="../images/cal.gif" width="16" height="16" alt="Pick a date"></a>
		      </td>
		    </tr>
            <tr>
		      <td>Estimated Sales:</td>
		      <td>
		        <input type="text" id="Estimated_sales" size="30" name="Estimated_sales" class="input" maxlength="30" value="" />
		      </td>
		    </tr>
            <tr>
		      <td>Estimated Budget:</td>
		      <td>
		        <input type="text" id="Estimated_budget" size="30" name="Estimated_budget" class="input" maxlength="30" value="" />
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