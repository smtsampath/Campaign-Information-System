<?php

require_once("../../includes/dbopen.inc.php");
require_once("../../includes/Session.php"); 
require_once("../../includes/User.Cls.php");
require_once("../../includes/Campaign.Cls.php");
admin_confirm(); 
confirm_logged_in();

$msg='';
$errmsg='';
if(isset($_POST['submit']) && $_POST['submit']=="Create")
{
        $fvars = array();
		$fvars = $_POST;
	
		foreach ($fvars as $key=>$value) {
			if(!isset($key) || ($value == ''))
				 $errmsg= "All the fields are required.<br>";	          
		}
	
		
	

	if($errmsg=='')
	{
	
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
		$Campaign_name = check_input($_POST['Campaign_name']);
		$Campaign_type = check_input($_POST['Campaign_type']);
		$Campaign_budget = check_input($_POST['Campaign_budget']);
		$Campaign_description = check_input($_POST['Campaign_description']);
	
		
		$Campaignobj = new Campaign();
		
		if($Campaignobj->createCampaign($Campaignid, $Campaign_name, $Campaign_type, $Campaign_budget, $Campaign_description))
		{
			$msg.= 'New Campaign successfully crated.<br>';
		}
		else {
			$errmsg.='!Opps Some thing went wrong.<br>';
		}
		
	}	
  }
}

	
	$Campaignid = "";
		$Campaign_name = "";
		$Campaign_type = "";
		$Campaign_budget = "";
		$Campaign_description = "";


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
            <td class="td3" ><font color="#FF6666">Add Campaign</font></td>
          </tr>
          <tr>
            <td class="td3"><a href="EditCampaign.php">Edit Campaign</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="DeleteCampaign.php">Delete Campaign</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="campaignHelp.php" target="_new">Help!</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="admin.php">Home</a></td>
          </tr>
          <tr>
          <td height="145">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="../images/home_insurance.jpg" width="100%" /></td>
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
    <td colspan="2" align="center"><h1>ENTER Campaign DETAILS HERE</h1></td>
  </tr> 
  <tr>
    <td colspan="2" height="20">&nbsp;</td>
  </tr> 
  <tr>
    <td  colspan="2" valign="middle">
    <form action="Campaign.Mgmt.php" method="post">
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
		        <input type="text" id="Campaignid" size="30" name="Campaignid" class="input"  value="<?php echo $Campaignid; ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Campaign Name:</td>
		      <td>
		        <input type="text" id="Campaign_name" size="30" class="input" name="Campaign_name" value="<?php echo $Campaign_name; ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Campaign Type:</td>
		      <td>
		        <input type="text" id="Campaign_type" size="30" class="input" name="Campaign_type"  value="<?php echo $Campaign_type; ?>" />
		      </td>
		    </tr>
            <tr>
		      <td>Campaign Budget:</td>
		      <td>
		        <input type="text" id="Campaign_budget" size="30" class="input" name="Campaign_budget" value="<?php echo $Campaign_budget; ?>" />
		      </td>
		    </tr>
            <tr>
		      <td>Campaign Description:</td>
		      <td>
              	<textarea id="Campaign_description" cols="24" rows="6" class="input" name="Campaign_description"><?php echo $Campaign_description; ?></textarea>
		      </td>
		    </tr>
		    <tr>
		      <td colspan="2">&nbsp;</td>
		    </tr>
		    </tr>
		    <tr>
              <td >&nbsp;</td>
		      <td align="left">
		        <input type="submit" id="submit" name="submit" value="Create" />
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