<?php

class User
{

	function createUser($Username, $Password, $Groupid, $Dateofjoin)
	{
		$Password = sha1($Password);
		$query = "INSERT INTO user(Username, Password,  Admin, Groupid, Dateofjoin) VALUES('$Username', '$Password', '', '$Groupid', '$Dateofjoin')";
		$result=mysql_query($query);
	   return $result;
	   	
	}
	
	function userExist($Username)
	{
		$valid=false;
		$query = "SELECT * FROM user WHERE Username='$Username' ";
		$result = mysql_query($query);	
		if(mysql_num_rows($result) > 0 )
		{
			$valid = true;
		}
		return $valid;
	}
	
	
	function isvaliduser($username, $password)
	{
		$valid=false;
		$password=trim(sha1($password));
		$query = "SELECT * FROM user WHERE Username='$username' && Password='$password' ";
		$result = mysql_query($query);
		$count = mysql_num_rows($result);
		 if($count>0)
		 {
		  	 $valid = true;
		 }
	   return $valid;
	}
		
	
	function get_userid($username)
	{
	    $query  = "SELECT userid FROM user WHERE Username='$username' "; 
		$result = mysql_query($query);
		if($row=mysql_fetch_array($result))
		{
			$id = $row['userid'];
		}
		return $id;
	}
	
	function get_username($Userid)
	{
	    $query  = "SELECT Username FROM user WHERE Userid=$Userid "; 
		$result = mysql_query($query);
		if($row=mysql_fetch_array($result))
		{
			$Username = $row['Username'];
		}
		return $Username;
	}
	
	function admin_satus($username)
	{
	    $query  = "SELECT Admin FROM user WHERE Username='$username' "; 
		$result = mysql_query($query);
		if($row=mysql_fetch_array($result))
		{
			$admin = $row['Admin'];
		}
		return $admin;
	}
	
	function get_profid($userid)
	{
	    $query = "SELECT profileid FROM profile WHERE Userid= $userid ";
		$result = mysql_query($query);
		if($row=mysql_fetch_array($result))
		{
			$id = $row['Profileid'];
		}
		return $id;
	}
	
	
	 function edit_userlogin($Userid, $Username, $Password)
    {
        $Password = sha1($Password);
		$query = "UPDATE user SET Username='$Username', Password='$Password' WHERE Userid='$Userid'";
		$result = mysql_query($query);
       return $result; 
    }
	
	
	function edit_userPersonal($Userid, $Firstname, $Lastname, $Address, $Email, $Mobile) {
		$query = "UPDATE user SET Firstname='$Firstname', Lastname='$Lastname', Address='$Address', Email='$Email', Mobile='$Mobile' WHERE Userid=$Userid";
		$result = mysql_query($query);
								 
		 return $result; 
	
	}
	
	function edit_userGroup($Userid, $Groupid)
    {
		$query = "UPDATE user SET Groupid='$Groupid' WHERE Userid='$Userid'";
		$result = mysql_query($query);
       return $result; 
    }
	
	 function update_userPersonal($Userid, $Firstname, $Lastname, $Address, $Email, $Mobile)
    {
        
		$query = "UPDATE user SET Firstname='$Firstname', Lastname='$Lastname', Address='$Address', Email='$Email', Mobile='$Mobile' WHERE Userid=$Userid";
		$result = mysql_query($query);
							 
       return $result; 
    }
	
	
	 function update_userlogin($Userid, $Password)
    {
        $Password = sha1($Password);
		$query = "UPDATE user SET Password='$Password' WHERE Userid=$Userid";
		$result = mysql_query($query);
       return $result; 
    }
	
	
    function delete_user($Username, $Firstname, $Lastname)
    {
        $query = "DELETE FROM user WHERE Username='$Username' LIMIT 1 ";
		$result = mysql_query($query);					 
       return $result;	
    }
			
	
}

?>