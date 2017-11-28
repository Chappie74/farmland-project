<!DOCTYPE html>

<html>

    <head>

        <link href="../public/css/bootstrap.css" rel="stylesheet"/>
        <link href="../public/css/styles.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <?php if (isset($title)): ?>
            <title>Farmland<?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Farmland</title>
        <?php endif ?>

        <script src="../public/js/jquery-1.10.2.min.js"></script>
        <script src="../public/js/bootstrap.min.js"></script>
        <script src="../public/js/scripts.js"></script>

        <style type="text/css">
            #profile_pic
            {
                padding:5px;
                border-radius: 10px;
                cursor: pointer;
          }
            .navbar.navbar-default.navbar-static-top{
              margin-bottom:0px;
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
                  <a class="navbar-brand" href="../public/index.php"><span class="glyphicon glyphicon-tree-deciduous">FARMLAND</span></a>
                </div>
                <ul class="nav navbar-nav">
                  <li><a href="../public/index.php"><span class="glyphicon glyphicon-home"> Home</span></a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"> Shop</span></a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-info-sign"> Help</span></a></li>
                </ul>
                <form class="navbar-form navbar-left">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                  <li>
                    <img id = "profile_pic" src=<?php echo "'../public/".$pp."'"; ?> height="50px" width="70px"/>
                  </li>
                      <li><a href="profile.php" style="padding-left:5px; padding-right:5px">View Profile </a></li>
                      <li><a href="../public/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

                </ul>
              </div>
            </nav>

    <div class="container-fluid">
        <div class="row">
