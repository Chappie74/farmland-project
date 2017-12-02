<!DOCTYPE html>

<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../public/css/bootstrap.css" rel="stylesheet"/>

               

        <link href="../public/css/styles.css" rel="stylesheet"/>
        <link rel="stylesheet" href="../public/css/font-awesome.css">                
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" type="text/css" href="../public/css/cart.css">

        <?php 
          if(isset($css))
            echo '<link rel="stylesheet" href="'.$css.'"'. "/>";          
        ?>



        <script src="../public/js/jquery-1.10.2.min.js"></script>        
        <script src="../public/js/bootstrap.min.js"></script>
        <script src="../public/js/cart.js"></script>
        <script src="../public/js/scripts.js"></script>


        <?php if (isset($title)): ?>
            <title>Farmland-<?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Farmland</title>
        <?php endif ?>
        <?php 
          if(isset($script))
          {
              echo '<script type="text/javascript" src="'.$script.'"'. "</script>"; 
          }
        ?>
        <script src="../public/js/scripts.js"></script>
       

        <style type="text/css">
            #profile_pic
            {
                padding:5px;
                border-radius: 10px;
                cursor: pointer;
            }
        </style>
    </head>

    <body>  
            <?php

                $sql = "SELECT profile_picture FROM users WHERE user_id = ? LIMIT 1";
                $sql2 = query("SELECT account_type, cash FROM users WHERE user_id = ? LIMIT 1",$_SESSION["id"]);

                $current_cash = $sql2[0]["cash"];

                $roll = $sql2[0]["account_type"];


                $rows = query($sql,$_SESSION["id"]);

                if($rows[0] != null)
                {
                    $pp = $rows[0]["profile_picture"];
                }                              
                else{
                  $pp = "img/profilePics/chappie.jpg";
                }
                    
            ?>  

            <nav class="navbar navbar-default navbar-static-top">

              <div class="container-fluid">

                <div class="navbar-header">

                  <a class="navbar-brand" href="../public/index.php">FARMLAND</a>

                </div>

                <ul class="nav navbar-nav">


                  <li><a href="../public/index.php">Home</a></li>

                  <li><a href="../public/browse.php">Buy</a></li>


                  <li><a href="../public/sell.php">Sell</a></li>

                </ul>


                <form class="navbar-form navbar-left">

                  <div class="form-group">

                    <input type="text" class="form-control" placeholder="Search">

                  </div>

                  <button type="submit" class="btn btn-info">Search</button>

                </form>

                <ul class="nav navbar-nav navbar-right">

                <li id="cash_amount" class="nav navbar-nav" ><a >$<?= $current_cash ?></a></li>

                  <li><span id="cart_icon" class="glyphicon glyphicon-shopping-cart" onclick= "javascript:location.href='../public/browse.php'"></span></li>

                  <li class="dropdown">

                    <span id="profile_dropdown_icon" class="dropdown-toggle glyphicon glyphicon-chevron-down"  data-toggle="dropdown"></span>  

                    <ul class="dropdown-menu"> 

                      <li><a href="../public/profile.php"><img id="proflie_picture_thumbnail" src=<?php echo "'../public/".$pp."'"; ?>>

                      <span>View Profile</span></a></li>

                      <li class="divider"></li>

                      <?php if ($roll === "admin"): ?>

                        <li><a href="../public/invoice.php">Invoices</a></li>

                        <li><a href="../public/sales.php">Sales</a></li>

                        <li><a href="../public/admin_users.php">Manage Users</a></li>

                        <li><a href="../public/admin_manage_produce.php">Manage Produce</a></li>

                        <li><a href="../public/logout.php">Log Out</a></li>

                      <?php else: ?>

                        <li><a href="../public/invoice.php">Invoices</a></li>

                        <li><a href="../public/sales.php">Sales</a></li>

                        <li><a href="#">Manage Produce</a></li>

                        <li><a href="../public/logout.php">Log Out</a></li>

                      <?php endif; ?> 

                    </ul>

                  </li>

                </ul>

              </div>

            </nav>

            
    <div class="container-fluid">
        <div class="row">

          