<?php
class Campaign
{

	function createCampaign($Campaignid, $Campaign_name, $Campaign_type, $Campaign_budget, $Campaign_description)
	{
		$query = "INSERT INTO campaign(Campaignid, Campaign_name, Campaign_type, Campaign_budget, Campaign_description) VALUES('$Campaignid', '$Campaign_name', '$Campaign_type', '$Campaign_budget','$Campaign_description')";
		$result=mysql_query($query);
	   return $result;
	   	
	}	
	
	
	
	function isvalidCampaign($Campaignid)
	{
		$valid=false;
		$password=trim(sha1($password));
		$query = "SELECT * FROM Campaign WHERE Campaignid='$Campaignid'";
		$result = mysql_query($query);
		$count = mysql_num_rows($result);
		 if($count>0)
		 {
		  	 $valid = true;
		 }
	   return $valid;
	}
		
	
	
    function update_Campaign($Campaignid, $Campaign_name, $Campaign_type, $Campaign_budget, $Campaign_description)
    {
        $query = "UPDATE campaign SET Campaignid='$Campaignid', Campaign_name='$Campaign_name', Campaign_type='$Campaign_type',      		
		Campaign_budget='$Campaign_budget', Campaign_description='$Campaign_description' WHERE Campaignid='$Campaignid' ";
		$result = mysql_query($query);					 
       return $result; 
    }
	
    function delete_Campaign($Campaignid, $Campaign_name, $Campaign_type, $Campaign_budget, $Campaign_description)
    {
        $query = "DELETE FROM campaign WHERE Campaignid='$Campaignid' LIMIT 1 ";
		$result = mysql_query($query);					 
       return $result;	
    }
	
		
	
}

?>