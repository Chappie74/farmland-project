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


        <script src="../public/js/jquery-1.10.2.min.js"></script>

        

        <script src="../public/js/bootstrap.min.js"></script>
        <script src="../public/js/Chart.min.js"></script>
        <script src="../public/js/scripts.js"></script>

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
                border-radius: 0px;
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

                  
                <li><a href="../public/invoice.php">Invoices</a></li>
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
                <li id="cart_link"><a href="#">Cart</a></li>  
                  <li class="dropdown" style="padding:0px">                    
                    <img id = "profile_pic" src=<?php echo "'../public/".$pp."'"; ?> height="50px" width="70px" class="dropdown-toggle" data-toggle="dropdown" />
                    <ul class="dropdown-menu">                      
                      <li><a href="../public/profile.php"><img src="../public/img/user.png" height="25px" width="25px"><span>  View Profile</span></a></li>                      
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
                    <div class="fa fa-ellipsis-v " data-toggle="modal" data-target="#myModal" style="font-size:24px;padding-left:10px;padding-right:10px;margin-left:-20px;" ></div>
                    <ul >
                      <li><a href="../public/empty_cart.php">Empty Cart</a></li>
                      <li><a href="" >Check Out</a></li>
                    </ul>
                  </div>                  
                </div>                
              </div><br>

              <div id="cart-body">
                                
              </div>
              <div style="height:300px"></div> 
              <div class="row cart-footer">Checkout</div>


            </div>   

<div class="container">
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Comfirm Purchase</h4>
        </div>
        <div class="modal-body">
          Are you sure you want to purchase all items in cart?
          <div class="row text-center" >   
          <br>         
          <button class="btn btn-primary">Yes</button>
          <button class="btn btn-primary">No</button>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



    <div class="container-fluid">
        <div class="row">

          