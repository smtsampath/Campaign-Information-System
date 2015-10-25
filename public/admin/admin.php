<?php

require_once("../../includes/dbopen.inc.php");
require_once("../../includes/Session.php"); 
require_once("../../includes/User.Cls.php");
admin_confirm(); 
confirm_logged_in();

$uid = $_SESSION['uid'];
$userobj = new User();
?>
<?php require_once("../layouts/user_header.php"); ?>
        <!-- Begin Left Column -->
        <div id="leftcolumn">
        <table width="190" border="0">
          <tr>
            <td bgcolor="#CCCCFF" align="center"><strong>Main Menu</strong></td>
          </tr>
          <tr>
            <td class="td3"><a href="Product.Mgmt.php">Product Managemet</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="Campaign.Mgmt.php">Campaign Managemet</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="Estimated_Campaign.php">Estimated Campaign</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="User.Mgmt.php">User Managemet</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="Reports.php">Reports</a></td>
          </tr>          
          <tr>
            <td class="td3"><a href="../logout.php">Logout</a></td>
          </tr>
          <tr>
          <td height="23">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="../images/home-insurance.jpg" width="100%" /></td>
          </tr>
        </table>       
        </div>
        <!-- End Lft Column -->
        
        <!-- Begin Right Column -->
        <div id="rightcolumn" >
        <table width="100%" border="0">
         <tr>
        <td align="center" bgcolor="#CCCCFF" ><strong>Logged in <font color="#FF0000"> Admin</font></strong></td>
     <td  align="right" bgcolor="#CCCCFF"><span id="clock"></span></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><h1>WELCOME TO CAMPAIGN INFORMATION SYSTEM</h1></td>
  </tr> 
  <tr>
    <td colspan="2" height="80">&nbsp;</td>
  </tr> 
  <tr>
    <td  colspan="2" valign="bottom"><img src="../images/life_insurance.jpg" width="100%" /></td>
  </tr>
</table>

       
        </div>
        <!-- End Right Column --> 
<?php require_once("../layouts/user_footer.php"); ?>