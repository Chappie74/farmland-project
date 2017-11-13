<?php
	require("../includes/config.php"); 

	if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["submit"]))
    {
    	if(isset($_GET["symbol"]))
    	{
    		$symbol = strtoupper($_GET["symbol"]);
    		$results = lookup($symbol);

    		if($results === false)
    		{
    			apologize("Symbol was not found. Please try again.");
    		}
    		else
    		{
    			render("latest_price.php", ["data" => $results]);	
    		}
    	}
    	else
    	{
    		apologize("Symbol field cannot be empty.");
    	}
    	
    }
    else
    {
    	render("submit_symbol.php");
    }


?>