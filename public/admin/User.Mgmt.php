<?php

require_once("../../includes/dbopen.inc.php");
require_once("../../includes/Session.php"); 
require_once("../../includes/User.Cls.php");

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
	
	    if(!((strlen($_POST['Username'])>=6))) {
			$errmsg='Username not less than 6 characters<br>';
		}
		else if(!((strlen($_POST['Password'])>=6 && strlen($_POST['Password'])<=8))) {
			$errmsg.='Password should be 6 - 8 characters<br>';
		} else 
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
		$Groupid = check_input($_POST['Groupid']);
		$Dateofjoin = date("Y-m-d");
				
		
		
		$Userobj = new User();
		
			if(!$Userobj->userExist($Username))
			{
			
			
					if($Userobj->createUser($Username, $Password, $Groupid, $Dateofjoin))
					{
						$msg.= 'New User account created.<br>';
					}
					else {
						$errmsg.='!Opps Some thing went wrong.<br>';
					}
		
			}else
			{
				$errmsg.= "User Name already exist";
			}
		
	}	
  }
} 
		$Username = "";
		$Password = "";
		$Groupid = "";


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
            <td class="td3" ><font color="#FF6666">Create User</font></td>
          </tr>
          <tr>
            <td class="td3"><a href="EditUser.php">Edit User</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="DeleteUser.php">Delete User</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="Groups.php">Groups</a></td>
          </tr>
           <tr>
            <td class="td3"><a href="Profile.php">Admin Profile</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="admin.php">Home</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="userHelp.php" target="_new">Help!</a></td>
          </tr>
          <tr>
          <td height="18">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="../images/user-account-control.jpg" width="100%" /></td>
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
    <td colspan="2" align="center"><h1>ENTER NEW USER DETAILS HERE</h1></td>
  </tr> 
  <tr>
    <td colspan="2" height="20">&nbsp;</td>
  </tr> 
  <tr>
    <td  colspan="2" valign="middle">
    <form action="User.Mgmt.php" name="createUser" method="post">
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
		      <td>Username:</td>
		      <td>
		        <input type="text" id="Username" size="30" name="Username" class="input" value="<?php echo $Username; ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Password:</td>
		      <td>
		        <input type="text" id="Password" size="16" name="Password" class="input" value="<?php echo $Password; ?>" /> &nbsp;<input type="button" value="Generate" onClick="randomPassword();">
		      </td>
		    </tr>
           
            <tr>
		      <td>Group ID:</td>
		      <td>
   <input type="text" name="Groupid" id="Groupid"  class="input" maxlength="4" value="<?php echo $Groupid; ?>" size="30"> 
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
          <td height="120">&nbsp;</td>
          </tr>
		  </table>
		</form>
    
    </td>
  </tr>
</table>

		 </div>
		 <!-- End Right Column -->
<?php require_once("../layouts/user_footer.php"); ?>