
<?php
require_once("../includes/dbopen.inc.php");
require_once("../includes/User.Cls.php");
require_once("../includes/Session.php"); 

if(logged_in() && ($_SESSION['admin'] == 1)) {
	header("location:admin/admin.php");
}

if(logged_in() && ($_SESSION['admin'] == 0)) {
	header("location:user/user.php");
}
	
//the form has been filled so we check value entered//
if(isset($_POST["submit"]) && ($_POST["submit"]=="Login"))
{
	
    $errmsg='';
	
	if(empty($_POST['username']) || empty($_POST['password']) ) {
		  $errmsg='All the fields are required<br>';
	} 
	else {
	$userobj = new User();
	
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);
	
	 
		if($userobj->isvaliduser($username, $password))
		{
				setcookie('user', "$username", time()+60*60*24*30);
				$userid=$userobj->get_userid($username);
				if($userid)
				{
					$_SESSION['uid'] = $userid;					
				}
			
				$admin=$userobj->admin_satus($username);
				if($admin==1)
				{
					$_SESSION['uid'] = $userid;
					$_SESSION['admin'] = $admin;
					header("location:admin/admin.php");
					exit();
										
				}
				else
				{
					$_SESSION['uid'] = $userid;
					header("location:user/user.php");
					exit();
				}	
		}
		else
		{
			$errmsg="Username/password combination incorrect.<br>";
		}
	  
	}
 
}
$username = "";

include_once("../includes/dbclose.inc.php");
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
          <td height="145">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="images/home-insurance.jpg" width="100%" /></td>
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
    <div id="block">
      <span class="inset">
		<img src="images/icon_big_login.gif" alt="login" />
	  </span>
      <h1>Login Page</h1>
      <p>Please enter your userID and password.</p>
      </div>
      <div id="block2">
		<form action="login.php" method="post">
        <table align="center" >
            <tr>
		      <td colspan="2" class="td1"><font color="#FF0000">
              <?php
  		  		if(isset($errmsg))  { echo $errmsg; }   
				?></font>
              </td>
		    </tr>
            <tr>
		      <td colspan="2">&nbsp;</td>
		    </tr>
		    <tr>
		      <td class="td1">Username:</td>
		      <td class="td2">
		        <input type="text" id="username" size="30" class="input" name="username" value="<?php echo $username; ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td class="td1">Password:</td>
		      <td class="td2">
		        <input type="password" id="password" size="30"  class="input" name="password" />
		      </td>
          </tr>
		    <tr>
		      <td colspan="2">&nbsp;</td>
		    </tr>
		    </tr>
		    <tr>
            <td >&nbsp;</td>
		      <td colspan="2">
		        <input type="submit" id="submit" name="submit" value="Login" />
                <a href="forgotPassword.php">forgot password?</a>
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
</table>

       
        </div>
        <!-- End Right Column --> 
      
      
<?php require_once("layouts/footer.php"); ?>
