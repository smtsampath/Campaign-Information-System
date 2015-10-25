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
	
	$Edit = "Edit";
	if(empty($_POST['search_username'])) {
		
		$searcherrmsg.='Please Specify the User Name<br>';
		$Username="";
		$Firstname = "";
		$Lastname = "";
		$Username = "";
		$Groupid	 = "";
		$Edit = "";
	}
	else {
		$Username = $_POST['search_username'];
		$Userobj = new User();
		
		 $query  = "SELECT * FROM user WHERE Username='$Username' "; 
		$result = mysql_query($query);
		if(mysql_num_rows($result) != 0) {
		$row = mysql_fetch_array($result);
			$Userid = $row['Userid'];	
			$Firstname = $row['Firstname'];			
			$Lastname = $row['Lastname'];
			$Username = $row['Username'];
			$Groupid	 = $row['Groupid'];
			
		}
		else {
				$searcherrmsg.='User Not Exsist our database<br>';
				$Username="";
				$Firstname = "";
		$Lastname = "";
		$Username = "";
		$Groupid	 = "";
		$Edit = "";
				
		}
	}
}else {
		$Firstname = "";
		$Lastname = "";
		$Username = "";
		$Groupid	 = "";
		$Edit = "";
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
            <td class="td3"><font color="#FF6666">Edit User</font></td>
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
            <td valign="middle"><img src="../images/user-account-control.jpg" width="100%" /></td>
          </tr>
          <tr>
          <td height="30">&nbsp;</td>
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
    <td colspan="2" align="center" class="td1">
     <p><form action="EditUser.php" method="post">
      User Name:
      <input type="text" name="search_username" size="40" />
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
    <table>
             <tr>
               <th class="td1">Firstname</th>
               <th class="td1">Lastname</th>
               <th class="td1">Username</th>
               <th class="td1">Group</th>
               <th class="td1">Login</th>
               <th class="td1">Personal</th>
               <th class="td1">Group</th>
            </tr>
   
          <tr>
  <td class="td2" align="center"><?php echo $Firstname; ?></td> 
  <td class="td2" align="center"><?php echo $Lastname; ?></td> 
  <td class="td2" align="center"><?php echo $Username; ?></td>  
  <td class="td2" align="center"><?php echo $Groupid; ?></td> 
  <td class="td2" align="center"><a href="UserLoginEdit.php?id=<?php echo $row['Userid']; ?>"><?php echo $Edit; ?></a></td>
  <td class="td2" align="center"><a href="UserProfileEdit.php?id=<?php echo $row['Userid']; ?>"><?php echo $Edit; ?></a></td>
  <td class="td2" align="center"><a href="UserGroupEdit.php?id=<?php echo $row['Userid']; ?>"><?php echo $Edit; ?></a></td>		
</tr>
<tr>
    <td colspan="2" height="125">&nbsp;</td>
</tr>

</table>
    
    </td>
  </tr>
  <tr>
    <td valign="middle" colspan="2"><img src="../images/profile_banner.jpg" width="100%" /></td>
 </tr>
</table>

		 </div>
		 <!-- End Right Column -->
<?php require_once("../layouts/user_footer.php"); ?>