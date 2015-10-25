<?php

require_once("../../includes/dbopen.inc.php");
require_once("../../includes/Session.php"); 
require_once("../../includes/User.Cls.php");
admin_confirm(); 
confirm_logged_in();

$userobj = new User();
$Userid = $_GET["id"];
		
		$query = "SELECT *
					FROM user 
					WHERE Userid = $Userid ";
					
		  $result_set = mysql_query($query);
		  $row = mysql_fetch_array($result_set);
		  if (isset($row)) {
			$Firstname  = $row['Firstname'];
			$Lastname =  $row['Lastname'];
			$Address =  $row['Address'];
			$Email =  $row['Email'];
			$Mobile =  $row['Mobile'];
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
	    
		
		$Firstname = check_input($_POST['Firstname']);
		$Lastname = check_input($_POST['Lastname']);
		$Address = check_input($_POST['Address']);
		$Email = check_input($_POST['Email']);
		$Mobile = check_input($_POST['Mobile']);
		
		if(!preg_match("/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/",$_POST['Email']))
		{
    		$errmsg.="Invalid email address";
		} else {	
		
			if($userobj->edit_userPersonal($Userid, $Firstname, $Lastname, $Address, $Email, $Mobile))
			{
				$msg.= 'Profile Details successfully updated.<br>';
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
            <td class="td3"><font color="#FF6666">User Personal</font></td>
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
          <td height="160">&nbsp;</td>
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
    <td colspan="2" align="center"><h1>EDIT USER PERSONAL DETAILS HERE</h1></td>
  <tr>
    <td colspan="2" height="10">&nbsp;</td>
  </tr>
  <tr>
  <td  colspan="2" valign="bottom">
    <form action="UserProfileEdit.php?id=<?php echo $row['Userid']; ?>" method="post" name="UserProfileEdit">
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
		      <td>Address:</td>
		      <td>
              <textarea id="Address" cols="24" rows="4" class="input" name="Address"><?php echo $Address; ?></textarea>
		      </td>
		    </tr>
            <tr>
		      <td>Email:</td>
		      <td>
		        <input type="text" id="Email" size="30" name="Email" class="input" value="<?php echo $Email; ?>" /> 
		      </td>
		    </tr>
            <tr>
		      <td>Mobile:</td>
		      <td>
		        <input type="text" id="Mobile" size="30" name="Mobile" class="input"value="<?php echo $Mobile; ?>" /> 
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
		      <td colspan="2">&nbsp;</td>
		    </tr>
            <tr>
          <td height="10">&nbsp;</td>
          </tr>
		  </table>
		</form>
    
    </td>
  </tr>
</table>

		 </div>
		 <!-- End Right Column -->
<?php require_once("../layouts/user_footer.php"); ?>