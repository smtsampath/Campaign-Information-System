<?php

require_once("../../includes/dbopen.inc.php");
require_once("../../includes/Session.php"); 
require_once("../../includes/User.Cls.php");
require_once("../../includes/Group.Cls.php");
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
	
	    if(!((strlen($_POST['Groupid'])==4))) {
			$errmsg='Group not must be 4 characters<br>';
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
	    
		$Groupid = check_input($_POST['Groupid']);
		$Group_name = check_input($_POST['Group_name']);
				
		
		
		$Groupobj = new Group();
		
			if(!$Groupobj->groupExist($Groupid))
			{
			
			
					if($Groupobj->createGroup($Groupid, $Group_name))
			{
				$msg.= 'Group has been created.<br>';
			}
			else {
				$errmsg.='!Opps Some thing went wrong.<br>';
			}
		
			}else
			{
				$errmsg.= "Group Name already exsist";
			}
		
		
		
		
		
	}	
  }
} 
		$Groupid = "";
		$Group_name = "";	

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
            <td class="td3"><a href="DeleteUser.php">Delete User</a></td>
          </tr>
          <tr>
            <td class="td3"><font color="#FF6666">Groups</font></td>
          </tr>
          <tr>
            <td class="td3"><a href="Profile.php">Admin Profile</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="admin.php" >Home</a></td>
          </tr>
          <tr>
          <td height="10">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="../images/groups.jpg" width="100%" /></td>
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
    <td colspan="2" align="center"><h1>ENTER GROUP DETAILS HERE</h1></td>
  </tr> 
  <tr>
    <td colspan="2" height="50">&nbsp;</td>
  </tr> 
  <tr>
    <td  colspan="2" valign="middle">
    <form action="Groups.php" method="post">
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
		      <td colspan="2" height="10">&nbsp;</td>
		    </tr>
          <tr>
		      <td>Group ID:</td>
		      <td>
		        <input type="text" name="Groupid" id="Groupid"  class="input" value="<?php echo $Groupid; ?>" size="30"> 
               
		      </td>
		    </tr>
		    <tr>
		      <td>Group Name:</td>
		      <td>
		        <input type="text" id="Group_name" size="30" name="Group_name" class="input"  value="<?php echo $Group_name; ?>" />
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
            <tr>
          <td height="110">&nbsp;</td>
          </tr>
		  </table>
		</form>
    
    </td>
  </tr>
</table>

		 </div>
		 <!-- End Right Column -->
<?php require_once("../layouts/user_footer.php"); ?>