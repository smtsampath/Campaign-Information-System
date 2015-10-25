<?php

require_once("../../includes/dbopen.inc.php");
require_once("../../includes/Session.php"); 
require_once("../../includes/User.Cls.php");
require_once("../../includes/Campaign.Cls.php");
confirm_logged_in();

$msg='';
$errmsg='';
$searcherrmsg='';
if(isset($_POST['submit']) && $_POST['submit']=="Search")
{
	
	if(empty($_POST['search_Campaignid'])) {
		
		$searcherrmsg.='Please Specify the Campaign ID<br>';
		$Campaignid = "";
		$Campaign_name = "";
		$Campaign_type = "";
		$Campaign_budget = "";
		$Campaign_description = "";
		
	}
	else {
		$Campaignid = $_POST['search_Campaignid'];
		$Campaignobj = new Campaign();
		
		 $query  = "SELECT * FROM Campaign WHERE Campaignid='$Campaignid' "; 
		$result = mysql_query($query);
		if(mysql_num_rows($result) != 0) {
		$row = mysql_fetch_array($result);
			$Campaignid = $row['Campaignid'];
			$Campaign_name = $row['Campaign_name'];
			$Campaign_type = $row['Campaign_type'];
			$Campaign_budget = $row['Campaign_budget'];
			$Campaign_description = $row['Campaign_description'];
		}
		else {
		$searcherrmsg.='Campaign Not Exisit our database<br>';
		$Campaignid = "";
		$Campaign_name = "";
		$Campaign_type = "";
		$Campaign_budget = "";
		$Campaign_description = "";
		}
	}
}else {
		$Campaignid = "";
		$Campaign_name = "";
		$Campaign_type = "";
		$Campaign_budget = "";
		$Campaign_description = "";
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
            <td class="td3" ><font color="#FF6666">Campaign</font></td>
          </tr>
          <tr>
            <td class="td3"><a href="User.php">Home</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="help.php" target="_new">Help!</a></td>
          </tr>
          <tr>
          <td height="83">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="../images/marketing.jpg" width="100%" /></td>
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
     <p><form action="Campaign.php" method="post">
       Campaign ID:
      <input type="text" name="search_Campaignid" size="40" />
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
     <form action="Campaign.php" method="post">
		  <table align="center" >
         <tr>
		      <td>Campaign ID:</td>
		      <td>
		        <input type="text" disabled="disabled" id="Campaignid" size="30" name="Campaignid" class="input"  value="<?php echo $Campaignid; ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Campaign Name:</td>
		      <td>
		        <input type="text" id="Campaign_name" disabled="disabled" size="30" class="input" name="Campaign_name" value="<?php echo $Campaign_name; ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Campaign Type:</td>
		      <td>
		        <input type="text" id="Campaign_type" disabled="disabled" size="30" class="input" name="Campaign_type"  value="<?php echo $Campaign_type; ?>" />
		      </td>
		    </tr>
            <tr>
		      <td>Campaign Budget:</td>
		      <td>
		        <input type="text" id="Campaign_budget" disabled="disabled" size="30" class="input" name="Campaign_budget" value="<?php echo $Campaign_budget; ?>" />
		      </td>
		    </tr>
            <tr>
		      <td>Campaign Description:</td>
		      <td>
              	<textarea id="Campaign_description" disabled="disabled" cols="24" rows="6" class="input" name="Campaign_description"><?php echo $Campaign_description; ?></textarea>
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