<?php

require_once("../../includes/dbopen.inc.php");
require_once("../../includes/Session.php"); 
require_once("../../includes/User.Cls.php");
require_once("../../includes/Campaign.Cls.php");
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
      <td class="td4"  align="center" ><a href="Reports.php"><strong>Sales Reports</strong></a></td> 
      <td class="td4"  align="center" ><font color="#FF6666"><strong>Campaign Summery</strong></font></td> 
      <td class="td1"  align="center" ><a href="help.php" target="_new"><strong>!Help</strong></a></td>   
     <td align="right"  bgcolor="#CCCCFF"><span id="clock"></span></td>
  </tr>
  <tr>
    <td class="td1" align="center" colspan="5">
     <p><form action="Reports2.php" method="post">
      Campaign Summery (CampaignID):
      <input type="Text" name="Campaignid" id="Campaignid"  class="input"   size="25"> 
      <input name="submit" type="submit" id="submit" value="Generate"  />
    </form>
      </p>
    </td>
  </tr> 
  <tr>
    <td colspan="5" height="20">&nbsp;</td>
  </tr> 
  <tr>
    <td  colspan="5" valign="middle">
    
    <table>
             <tr>
             <?php
	if(isset($_POST['submit']) && $_POST['submit']=="Generate")
{
	$Campaignid = $_POST['Campaignid'];
	
?>
               <th class="td1">Time Period</th>
               <th class="td1">Campaign Name</th>
               <th class="td1">Campaign Type</th>
               <th class="td1">Estimated Budget</th>
               <th class="td1">Achived Budget</th>
               <th class="td1">Summery</th>
            </tr>
   
          <tr>
 	
<?php
	$query ="SELECT sales.Campaignid, campaign.Campaign_name, campaign.Campaign_type, sales.Estimated_budget, sales.Starting_date, sales.Ending_date, sales.Achived_budget  FROM sales, Campaign WHERE sales.Campaignid=('$Campaignid')";
	$result = mysql_query($query);
	
	for ($count = 0; $row = mysql_fetch_array($result); $count++) {
	?>	
  <td class="td2"><?php echo $row['Starting_date'] . " to " . $row['Ending_date']?></td> 
  <td class="td2"><?php echo $row['Campaign_name'] ?></td> 
  <td class="td2"><?php echo $row['Campaign_type'] ?></td> 
  <td class="td2" align="right"><?php echo $row['Estimated_budget'] ?></td> 
  <td class="td2" align="right"><?php echo $row['Achived_budget'] ?></td> 
  <td class="td2"><?php 
  
  					if($row['Estimated_budget']< $row['Achived_budget']) {
						echo "The Campaign has not crossed the Estimated Level";
					}
					else {
						echo "The Campaign crossed the Estimated Level";
					}
  				?></td> 

		</tr>
<?php } 
}?> 

</table></td></tr>
</table>

		 </div>
		 <!-- End Right Column -->
<?php  include_once("../../includes/dbclose.inc.php");?>
<?php require_once("../layouts/user_footer.php"); ?>