<?php

require_once("../../includes/dbopen.inc.php");
require_once("../../includes/Session.php"); 
require_once("../../includes/User.Cls.php");
admin_confirm(); 
confirm_logged_in();

$userobj = new User();
$Userid = $_GET["id"];
		
		$query = "SELECT Username
					FROM user 
					WHERE Userid = $Userid ";
					
		  $result_set = mysql_query($query);
		  $row = mysql_fetch_array($result_set);
		  if (isset($row)) {
			$Username  = $row['Username'];
			
		  } else {
			  mysql_error();
		  }
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

		function check_input($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			$data = mysql_real_escape_string($data);
		  return $data;
		}
	    
		$Username = check_input($_POST['Username']);
		$Password = check_input($_POST['Password']);
		

		if($userobj->edit_userlogin($Userid, $Username, $Password))
		{
			$msg.= 'User Login Details successfully updated.<br>';
		}
		else {
			$errmsg.='!Opps Some thing went wrong.<br>';
		}
		
		
		
		
  }
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
            <td class="td3"><font color="#FF6666">User Login</font></td>
          </tr>
          <tr>
            <td class="td3"><a href="User.Mgmt.php">User Management</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="admin.php">Home</a></td>
          </tr>       
          <tr>
            <td valign="middle"><img src="../images/user-account-control.jpg" width="100%" /></td>
          </tr>
          <tr>
          <td height="60">&nbsp;</td>
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
    <td colspan="2" height="10">&nbsp;</td>
  </tr>
   <tr>
    <td colspan="2" align="center"><h1>EDIT USER LOGIN DETAILS HERE</h1></td>
  <tr>
    <td colspan="2" height="10">&nbsp;</td>
  </tr>
  <tr>
  <td  colspan="2" valign="bottom">
    <form action="UserLoginEdit.php?id=<?php echo $Userid; ?>" method="post" name="UserLoginEdit">
		  <table align="center">
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
          <td height="20">&nbsp;</td>
          </tr>
           <tr>
		      <td>Username:</td>
		      <td>
		        <input type="text" id="Username" size="30" name="Username" class="input" value="<?php echo $Username; ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Password:</td>
		      <td>
		        <input type="text" id="Password" size="16" name="Password" class="input" value="" /> &nbsp;<input type="button" value="Generate" onClick="randomPassword2();">
		      </td>
		    </tr>
            <tr>
		      <td colspan="2" height="20">&nbsp;</td>
		    </tr>
		    </tr>
		    <tr>
              <td >&nbsp;</td>
		      <td align="left">
		        <input type="submit" id="submit" name="submit" value="Update" />
		      </td>
		    </tr>
            <tr>
		      <td colspan="2">&nbsp;</td>
		    </tr>
            <tr>
          <td height="50">&nbsp;</td>
          </tr>
		  </table>
		</form>
    
    </td>
  </tr>
</table>

		 </div>
		 <!-- End Right Column -->
<?php require_once("../layouts/user_footer.php"); ?>