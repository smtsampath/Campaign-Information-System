<?php

require_once("../../includes/dbopen.inc.php");
require_once("../../includes/Session.php"); 
require_once("../../includes/User.Cls.php");
confirm_logged_in();

$userobj = new User();

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
		if(($_POST['Password'] != $_POST['ConfirmPassword'])) {
			$errmsg.='Password Confirmation wrong<br>';
		}		
		else if(!((strlen($_POST['Password'])>=6 && strlen($_POST['Password'])<=8))) {
			$errmsg.='Password should be 6 - 8 characters<br>';
		}
		else {
		function check_input($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			$data = mysql_real_escape_string($data);
		  return $data;
		}
	    
		$Password = check_input($_POST['Password']);
		$ConfirmPassword = check_input($_POST['ConfirmPassword']);
		$Userid = $_SESSION["uid"];
		
		
		
		
		
		if($userobj->update_userlogin($Userid, $Password))
		{
			$msg.= 'Login Details successfully updated.<br>';
		}
		else {
			$errmsg.='!Opps Some thing went wrong.<br>';
		}
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
            <td class="td3"><font color="#FF6666">Change Password</font></td>
          </tr>
          <tr>
            <td class="td3"><a href="EditProfile.php">Edit Profile</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="User.php">Home</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="help.php" target="_new">Help!</a></td>
          </tr>
          <tr>
            <td valign="middle"><img src="../images/user-account-control.jpg" width="100%" /></td>
          </tr>
          <tr>
          <td height="55">&nbsp;</td>
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
    <td colspan="2" height="10">&nbsp;</td>
  </tr>
   <tr>
    <td colspan="2" align="center"><h1>CHANGE YOUR LOGIN DETAILS HERE</h1></td>
  <tr>
    <td colspan="2" height="10">&nbsp;</td>
  </tr>
  <tr>
    <td  colspan="2" valign="middle">
    <form action="Profile.php"  method="post">
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
          <td height="50">&nbsp;</td>
          </tr>
            <tr>
		      <td>New Password:</td>
		      <td>
		        <input type="password" id="Password" size="30" name="Password" class="input" /> 
		      </td>
		    </tr>
            <tr>
		      <td>Confirm Password:</td>
		      <td>
		        <input type="password" id="ConfirmPassword" size="30" name="ConfirmPassword" class="input" /> 
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
          <td height="60">&nbsp;</td>
          </tr>
		  </table>
		</form>
    
    </td>
  </tr>
</table>

		 </div>
		 <!-- End Right Column -->
<?php require_once("../layouts/user_footer.php"); ?>