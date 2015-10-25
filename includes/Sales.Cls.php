<?php

class Sales
{

	
	function AddEstimation($Campaignid, $Productid, $Starting_date, $Ending_date, $Estimated_sales, $Estimated_budget)
	{
		$query = "INSERT INTO sales(Campaignid, Productid, Starting_date, Ending_date, Estimated_sales, Estimated_budget, Achived_sales, Achived_budget) VALUES('$Campaignid', '$Productid', '$Starting_date', '$Ending_date', '$Estimated_sales', '$Estimated_budget', '', '')";
		$result=mysql_query($query);
	   return $result;
	   	
	}
				
	
	
	  function get_sales($Productid)
	  {
		 $query  = "SELECT * FROM sales WHERE Productid='$Productid' "; 
		$result = mysql_query($query);
		if(mysql_num_rows($result) != 0) {
		$row = mysql_fetch_array($result);
			$Campaignid = $row['Campaignid'];
			$Productid = $row['Productid'];
			$Starting_date = $row['Starting_date'];
			$Ending_date = $row['Ending_date'];
			$Estimated_sales = $row['Estimated_sales'];
			$Estimated_budget = $row['Estimated_budget'];
			$Achived_sales = $row['Achived_sales'];
			$Achived_budget = $row['Achived_budget'];
		}
		
		  return $result;
	  }
	
	
    function update_sales($Campaignid, $Productid, $Ending_date, $Achived_sales, $Achived_budget)
    {
        $query = "UPDATE sales SET Campaignid='$Campaignid', Productid='$Productid', Ending_date='$Ending_date', Achived_sales='$Achived_sales',      		
		Achived_budget='$Achived_budget' WHERE Productid='$Productid' AND Campaignid='$Campaignid' ";
		$result = mysql_query($query);
							 
       return $result; 
    }
	
		
}

?>