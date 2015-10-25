<?php

require_once("../../includes/dbopen.inc.php");
require_once("../../includes/Session.php"); 
require_once("../../includes/User.Cls.php");
admin_confirm(); 
confirm_logged_in();

$msg='';
$errmsg='';
$searcherrmsg='';
if(isset($_POST['submit']) && $_POST['submit']=="Search")
{
	
	if(empty($_POST['search_Username'])) {
		
		$searcherrmsg.='Please Specify the User Name<br>';
		$Firstname = "";
		$Lastname = "";
		$Username = "";
		
	}
	else {
		$Username = $_POST['search_Username'];
		$userobj = new User();
		
		$query  = "SELECT * FROM user WHERE Username='$Username' "; 
		$result = mysql_query($query);
		if(mysql_num_rows($result) != 0) {
		$row = mysql_fetch_array($result);
			$Firstname = $row['Firstname'];
			$Lastname = $row['Lastname'];
			$Username = $row['Username'];
		}
		else {
				$searcherrmsg.='User Not Exsist our database<br>';
				$Firstname = "";
				$Lastname = "";
				$Username = "";
		}
	}
}else {
		$Firstname = "";
		$Lastname = "";
		$Username = "";
}

if(isset($_POST['submit']) && $_POST['submit']=="Delete")
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
	    
		$Firstname = check_input($_POST['Firstname']);
		$Lastname = check_input($_POST['Lastname']);
		$Username = check_input($_POST['Username']);

		
		$userobj = new User();
		
		if($userobj->delete_user($Username, $Firstname, $Lastname))
		{
			$msg.= 'user Details successfully updated.<br>';
			$Firstname = "";
		$Lastname = "";
		$Username = "";
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
            <td class="td3" ><a href="User.Mgmt.php">Create User</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="EditUser.php">Edit User</a></td>
          </tr>
          <tr>
            <td class="td3"><font color="#FF6666">Delete User</font></td>
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
          </tr>
          <tr>
          <td height="20">&nbsp;</td>
          </tr>
          <tr>
            <td valign="middle"><img src="../images/user-account-control.jpg" width="100%" /></td>
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
    <td colspan="2" class="td1" align="left">
     <p><form action="Deleteuser.php" method="post">
      User Name:
      <input type="text" name="search_Username" size="40" />
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
    <td colspan="2" height="40">&nbsp;</td>
  </tr> 
  <tr>
    <td  colspan="2" valign="middle">
    <form action="Deleteuser.php"  method="post">
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
          <td height="40">&nbsp;</td>
          </tr>
          <tr>
		      <td>Username:</td>
		      <td>
		        <input type="text" id="Username" size="30" name="Username" class="input" value="<?php echo $Username; ?>"/>
		      </td>
		    </tr>
		    <tr>
		      <td>First Name:</td>
		      <td>
		        <input type="text" id="Firstname" size="30" name="Firstname" class="input" value="<?php echo $Firstname; ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Last Name:</td>
		      <td>
		        <input type="text" id="Lastname" size="30" name="Lastname" class="input" value="<?php echo $Lastname; ?>" /> 
		      </td>
		    </tr>
		    <tr>
		      <td colspan="2">&nbsp;</td>
		    </tr>
		    </tr>
		    <tr>
              <td >&nbsp;</td>
		      <td align="left">
		        <input type="submit" id="submit" name="submit" value="Delete" />
		      </td>
		    </tr>
            <tr>
          <td height="70">&nbsp;</td>
          </tr>
		  </table>
		</form>
    
    </td>
  </tr>
</table>

		 </div>
		 <!-- End Right Column -->
<?php require_once("../layouts/user_footer.php"); ?>