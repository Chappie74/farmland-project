<?php 

// configuration
    require("../includes/config.php"); 
    $css_file = "../public/css/sell_t.css";
    $script_file = "../public/js/sell_t.js";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {

    	$img = $_FILES["product_image"];
        $product_name = trim(strtolower($_POST["product_name"])); 
        $category = $_POST["category"];
        $amount = floor($_POST["amount"]);
        $price = abs($_POST["price"]);

                //file upload variables      
    	$fileName = $_FILES["product_image"]["name"];
    	$fileTmpName = $_FILES["product_image"]["tmp_name"];
    	$fileError = $_FILES["product_image"]["error"];
        $accepted_size = 1049600;
    	$fileSize = $_FILES["product_image"]["size"];
    	$fileType = $_FILES["product_image"]["type"];
        $fileExtension = explode(".", $fileName);
        $fileExtension = strtolower(end($fileExtension));
        $allowedExt = array("jpg","jpeg", "png", "bmp", "gif");

        if($fileError === 0)
        {
            if(in_array($fileExtension, $allowedExt))
            {
                if($fileSize <= $accepted_size)
                {
                    $fileNewName = sha1(md5(uniqid("", true).uniqid("", true).$fileName.$fileSize)).".".$fileExtension;
                    $fileDestination = "img/product_pics/".$fileNewName;
                    move_uploaded_file($fileTmpName, $fileDestination);

                    $sql = "SELECT category_id FROM categories WHERE name = ? LIMIT 1";
<<<<<<< HEAD
<<<<<<< HEAD

=======
                    $rows = query($sql,$category);//query the category id
                   
                    $results = query($sql,$product_name,$rows[0]["category_id"],$fileDestination); //insert product information
>>>>>>> parent of af91e2d... Merge remote-tracking branch 'origin/rework' into rework

                    $insert_array1 = array(
                        'name' =>$product_name,
                        'category_id' => $rows[0]["category_id"],
                        'image' => $fileDestination,
                    );
                          
=======
                    $rows = query($sql,$category);//query the category id
                    
>>>>>>> parent of 50b10b9... sell functionality atempt
                    $sql = "INSERT INTO products (name,category_id, image) VALUES (?,?,?);";
                    $results = query($sql,$product_name,$rows[0]["category_id"],$fileDestination); //insert product information

                    
<<<<<<< HEAD

=======
>>>>>>> parent of af91e2d... Merge remote-tracking branch 'origin/rework' into rework
                    $last_product_id = query("SELECT LAST_INSERT_ID() AS id");
<<<<<<< HEAD


                     $insert_array2 = array(
                        'user_id' =>$_SESSION["id"], 
                        'product_id' => $last_product_id[0]["id"],
                        'amount' => $amount,
                        'date_listed' => CURRENT_DATE(),
                        'price' =>$price, 
                    );
                    
                    $sql = "INSERT INTO products_for_sale (user_id,product_id,amount,date_listed, price) VALUES (?,?,?,?,?)";
                    data->query($sql,$insert_array2);
<<<<<<< HEAD

    

=======
                    

                    $sql = "INSERT INTO products_for_sale (user_id,product_id,amount,date_listed, price) VALUES (?,?,?,CURRENT_DATE(),?)";
                    $results = query($sql, $_SESSION["id"], $last_product_id[0]["id"],$amount,$price);    
>>>>>>> parent of 50b10b9... sell functionality atempt
=======
                    
                       
>>>>>>> parent of af91e2d... Merge remote-tracking branch 'origin/rework' into rework
                    redirect("index.php");               
                    
                }else   
                apologize("File is too large. 1MB limit.");
            }else
            apologize("Invalid file extension. Only images allowed.");
        }else
        apologize("There was an error uploading file.");    	
    }

    $sql = "SELECT * FROM categories ORDER BY name;";
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> parent of af91e2d... Merge remote-tracking branch 'origin/rework' into rework
    rows = new Database();
    row->query($sql);;

<<<<<<< HEAD
=======
    $rows = query($sql);
>>>>>>> parent of 50b10b9... sell functionality atempt
=======
>>>>>>> parent of af91e2d... Merge remote-tracking branch 'origin/rework' into rework
    // dump($rows);
    render("../templates/sell_t.php", ["title" => "Sell a product",
    									"categories" => $rows,
    									"css" => $css_file,
    									"script" => $script_file
    								]);
?>    