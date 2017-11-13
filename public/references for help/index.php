<?php

    // configuration
    require("../includes/config.php"); 

    $rows = query("SELECT * FROM assets WHERE id = ?",$_SESSION['id']);    
    $positions = [];
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        if ($stock !== false)
        {
            $positions[] = [
            "name" => $stock["name"],
            "price" => $stock["price"],
            "shares" => $row["shares"],
            "symbol" => $row["symbol"]
            ];
        }
    }   
    $rows = query("SELECT * FROM users WHERE id = ? LIMIT 1;",$_SESSION['id']);
    $cash = number_format($rows[0]["cash"],2);
    

    render("../templates/portfolio.php", ["title" => "Portfolio", "results" => $positions, "cash" => $cash]);
?>