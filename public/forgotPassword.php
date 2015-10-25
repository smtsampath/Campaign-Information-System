<?php

require_once("../includes/dbopen.inc.php");
require_once("../includes/User.Cls.php");


$msg='';
$errmsg='';
if(isset($_POST['submit']) && $_POST['submit']=="Submit")
{
	
	if ($_POST['Email']=='') {
		$errmsg = 'Please Fill in Email.';
		$Email = "";
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
		  
	  $Email = check_input($_POST['Email']);
	  
	  //Make sure it's a valid email address, last thing we want is some sort of exploit!
	  if(!preg_match("/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/",$Email))
	  {
		  $errmsg.="Invalid email address";
	  } else 
	  {
		  // Lets see if the email exists
		  $sql = "SELECT COUNT(*) FROM user WHERE Email  = '$Email'";
		  $result = mysql_query($sql);
		  if (!mysql_result($result,0,0)>0) {
			  $errmsg.='Email Not Found!';
		  }
		  else {
		  
			//Generate a RANDOM MD5 Hash for a password
			$random_password = sha1(uniqid(rand()));
			
			//Take the first 8 digits and use them as the password we intend to email the user
			$emailpassword = substr($random_password, 0, 8);
			
			//Encrypt $emailpassword in MD5 format for the database
			$newpassword = sha1($emailpassword);
		
			// Make a safe query
			$query = sprintf("UPDATE `user` SET `Password` = '%s' 
							  WHERE `Email` = '$Email'",
			 mysql_real_escape_string($newpassword));
			 mysql_query($query);
	
			//Email out the infromation
			$subject = "Your New Password"; 
			$message = "Your new password is as follows:
			---------------------------- 
			Password: $emailpassword
			---------------------------- 
			Please make note this information has been encrypted into our database 
			
			This email was automatically generated."; 
						   
			if(!mail($Email, $subject, $message)){ 
			   $errmsg.="Sending Email Failed, Please Contact Site Admin!"; 
			}else{ 
				  $msg.='New Password Sent!.';
				  $Email = "";
			} 
		 }
	  }
	}

	
		

} else {
	$Email = "";
}
?>
<?php require_once("layouts/header.php"); ?>
<!-- Begin Left Column -->
        <div id="leftcolumn">
        <table width="190" border="0">
          <tr>
            <td bgcolor="#CCCCFF" align="center"><strong>Main Menu</strong></td>
          </tr>
          <tr>
            <td class="td3"><a href="index.php">Home</a></td>
          </tr>
          <tr>
            <td class="td3"><a href="login.php">Login Page</a></td>
          </tr>
          <tr>
          <td height="44">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="images/all-insurance.png" width="100%" /></td>
          </tr>
        </table>     
        </div>
        <!-- End Lft Column -->
        
        <!-- Begin Right Column -->
        <div id="rightcolumn" >
        <table width="100%" border="0">
         <tr>
     <td colspan="2" align="right" bgcolor="#CCCCFF"><span id="clock"></span></td>
  </tr>
  <tr>
    <td colspan="2" height="80">
   <div id="block3">
      Please enter your valid email address, and we will send you a new password.
      </div>
      <div id="block2">
		<form action="forgotPassword.php" method="post">
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
		      <td class="td1">Email:</td>
		      <td class="td2">
		        <input type="text" id="Email" size="30" class="input" name="Email" value="<?php echo $Email; ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td colspan="2">&nbsp;</td>
		    </tr>
		    </tr>
		    <tr>
            <td >&nbsp;</td>
		      <td colspan="2">
		        <input type="submit" id="submit" name="submit" value="Submit" />
       		      </td>
		    </tr>
            <tr>
		      <td colspan="2">&nbsp;</td>
		    </tr>
		  </table>
        </form>
       
      </div>
    </td>
    
  </tr> 
  <tr>
		      <td colspan="2"><img src="images/life-safety-net.jpg" width="100%" /></td>
		    </tr>
</table>

       
        </div>
        <!-- End Right Column --> 
      
      
<?php require_once("layouts/footer.php"); ?>