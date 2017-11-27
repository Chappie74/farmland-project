<?php 

// configuration
    require("../includes/config.php"); 
    $css_file = "../public/css/sell_t.css";
    $script_file = "../public/js/sell_t.js";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
    	$img = $_FILES["img"];

    	$fileName = $_FILES["img"]["name"];
    	$fileTmpName = $_FILES["img"]["tmp_name"];
    	$fileError = $_FILES["img"]["error"];
    	$fileSize = $_FILES["img"]["size"];
    	$fileType = $_FILES["img"]["type"];

    	dump($img);
    }

    $sql = "SELECT * FROM categories ORDER BY name;";
    $rows = query($sql);
    // dump($rows);
    render("../templates/sell_t.php", ["title" => "Sell a product",
    									"categories" => $rows,
    									"css" => $css_file,
    									"script" => $script_file
    								]);
?>    