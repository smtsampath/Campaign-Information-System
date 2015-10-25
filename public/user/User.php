<?php

require_once("../../includes/dbopen.inc.php");
require_once("../../includes/Session.php"); 
require_once("../../includes/User.Cls.php");
confirm_logged_in();


$Userid = $_SESSION['uid'];
$userobj = new User();
//$profileobj = new Profile();
?>
<?php require_once("../layouts/user_header.php"); ?>
        <!-- Begin Left Column -->
        <div id="leftcolumn">
        <table width="190" border="0">
          <tr>
            <td bgcolor="#CCCCFF" align="center"><strong>Main Menu</strong></td>
          </tr>
          <tr>
            <td class="td3"><a href="Progress.php">Enter Progress</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="Product.php">Product</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="Campaign.php">Campaign</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="Profile.php">User Profile</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="help.php" target="_new">Help!</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="../logout.php">Logout</a></td>
          </tr>
          <tr>
          <td height="74">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="../images/insurance-agent.jpg" width="100%" /></td>
          </tr>
        </table>       
        </div>
        <!-- End Lft Column -->
        
        <!-- Begin Right Column -->
        <div id="rightcolumn" >
        <table width="100%" border="0">
        <tr>
        <td align="center" bgcolor="#CCCCFF" ><strong>Logged in <font color="#FF0000"> <?php echo $userobj->get_username($Userid); ?> </font></strong></td>
     <td  align="right" bgcolor="#CCCCFF"><span id="clock"></span></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><h1>WELCOME TO CAMPAIGN INFORMATION SYSTEM</h1></td>
  </tr> 
  <tr>
    <td colspan="2" height="110">&nbsp;</td>
  </tr> 
  <tr>
    <td  colspan="2" valign="bottom"><img src="../images/insurance.jpg" width="100%" /></td>
  </tr>
</table>

        
        </div>
        <!-- End Right Column --> 
<?php require_once("../layouts/user_footer.php"); ?>