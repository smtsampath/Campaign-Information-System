
<?php

class Group
{

	function createGroup($Groupid, $Group_name)
	{
		$query = "INSERT INTO `group` (`Groupid`, `Group_name`) VALUES ('$Groupid', '$Group_name')";
		$result=mysql_query($query);
	   return $result;
	   	
	}
	
	function groupExist($Groupid)
	{
		$valid=false;
		$query  = "SELECT * FROM  `group`  WHERE Groupid = ('$Groupid') "; 
		$result = mysql_query($query);
		if(mysql_fetch_array($result) != 0)
		{
			$valid = true;
		}
		return $valid;
	}
	
	
}

?>