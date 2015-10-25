<?php

class Product
{


	function createProduct($Productid, $Product_name, $Product_type, $Product_price, $Product_description)
	{
		$query = "INSERT INTO product(Productid, Product_name, Product_type, Product_price, Product_description) VALUES('$Productid', '$Product_name', '$Product_type', '$Product_price','$Product_description')";
		$result=mysql_query($query);
	   return $result;
	   	
	}
	
	
	

	function isvalidProduct($Productid)
	{
		$valid=false;
		$password=trim(sha1($password));
		$query = "SELECT * FROM product WHERE Productid='$Productid'";
		$result = mysql_query($query);
		$count = mysql_num_rows($result);
		 if($count>0)
		 {
		  	 $valid = true;
		 }
	   return $valid;
	}
		
	
	
	  function get_product($Productid)
	  {
		 $query  = "SELECT * FROM product WHERE Productid='$Productid' "; 
		$result = mysql_query($query);
		if(mysql_num_rows($result) != 0) {
		$row = mysql_fetch_array($result);
			$Productid = $row['Productid'];
			$Product_name = $row['Product_name'];
			$Product_type = $row['Product_type'];
			$Product_price = $row['Product_price'];
			$Product_description = $row['Product_description'];
		}
		
		  return $result;
	  }
	
	
    function update_product($Productid, $Product_name, $Product_type, $Product_price, $Product_description)
    {
        $query = "UPDATE Product SET Productid='$Productid', Product_name='$Product_name', Product_type='$Product_type',      		
		Product_price='$Product_price', Product_description='$Product_description' WHERE Productid='$Productid' ";
		$result = mysql_query($query);
							 
       return $result; 
    }
	

    function delete_product($Productid, $Product_name, $Product_type, $Product_price, $Product_description)
    {
        $query = "DELETE FROM Product WHERE Productid='$Productid' LIMIT 1 ";
		$result = mysql_query($query);					 
       return $result;	
    }
	
		
	
}

?>