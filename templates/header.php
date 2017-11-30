<!DOCTYPE html>

<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../public/css/bootstrap.css" rel="stylesheet"/>
        <link href="../public/css/styles.css" rel="stylesheet"/>
        <link rel="stylesheet" href="../public/css/font-awesome.css"> 
        <link href='https://fonts.googleapis.com/css?family=Archivo Narrow' rel='stylesheet'>               
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" type="text/css" href="../public/css/cart.css">
        <?php 
          if(isset($css))
            echo '<link rel="stylesheet" href="'.$css.'"'. "/>";          
        ?>

        <?php if (isset($title)): ?>
            <title>Farmland-<?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Farmland</title>
        <?php endif ?>

        <script src="../public/js/jquery-1.10.2.min.js"></script>
        <script src="../public/js/bootstrap.min.js"></script>
        <?php 
          if(isset($script))
          {
              echo '<script type="text/javascript" src="'.$script.'"'. "</script>"; 
          }
        ?>
        <script src="../public/js/scripts.js"></script>
        <script src="../public/js/cart.js"></script>
       

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
                $rows = query($sql,$_SESSION["id"]);

                if($rows[0] != null)
                {
                    $pp = $rows[0]["profile_picture"];
                }                              
                else
                    $pp = "img/profilePics/chappie.jpg";
            ?>           
            <nav class="navbar navbar-default navbar-static-top">
              <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand" href="../public/index.php">Dashboard</a>
                </div>
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Home</a></li>
                  <li><a href="#">Page 1</a></li>
                  <li><a href="../public/sell.php">Sell</a></li>
                  <li><a href="../public/browse.php">Browse</a></li>
                </ul>
                <form class="navbar-form navbar-left">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                  </div>
                  <button type="submit" class="btn btn-info">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">   
                  <li class="dropdown" style="padding:0px">                    
                    <img id = "profile_pic" src=<?php echo "'../public/".$pp."'"; ?> height="50px" width="70px" class="dropdown-toggle" data-toggle="dropdown" />
                    <ul class="dropdown-menu">                      
                      <li><a href="../public/profile.php"><img src="../public/img/user.png" height="25px" width="25px"><span>  View Profile</span></a></li>
                      <li><a href="#">Page 1-3</a></li>
                      <li><a href="../public/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
                  </li>                 
                </ul>
              </div>
            </nav>

            <div class="cart-container"> 
              <div class="row cart-header">
                <div class="col-sm-5">
                  Cart
                </div>
                <div class="col-sm-5">
                  Total:
                </div>
                <div class="dropdown">
                <div class="col-sm-2 text-center " id="ellipsis">                  
                    <div class="fa fa-ellipsis-v " style="font-size:24px;padding-left:10px;padding-right:10px;margin-left:-20px;" data-toggle="dropdown"></div>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li><a href="#">Empty Cart</a></li>
                      <li><a href="#">Check Out</a></li>
                    </ul>
                  </div>                  
                </div>                
              </div><br>

              <div class="row">
                <div class="col-sm-12">
                  <div class="row no_left item_details">
                    <img src="img/product_pics/3ab1468ecca6b4dbde0feabf4299834b18806082.jpg" class="img-responsive thumbnail col-sm-2" height="40" width="40">
                    <div class="col-sm-10">
                      This is the items details
                    </div>
                  </div>
                </div>
                
                <div class="row price_details">
                  <div class="col-sm-12">
                    <div class="col-md-7 " >
                      3.00/Unit
                    </div>
                    <div class="col-md-5 plus-minus-container">                      
                          <div id="minus" class="col-sm-4"><i class="fa fa-minus " style="font-size:14px"></i></div>       
                          <input class="col-sm-4 text-center" type="number" value="1" id="quantity" name="quantity" min="0" max="100">           
                          <div id="plus" class="col-sm-4"><i class="fa fa-plus" style="font-size: 14px"></i></div>        
                    </div>
                  </div>
                </div>
              </div>
            </div>

    <div class="container-fluid">
        <div class="row">

          