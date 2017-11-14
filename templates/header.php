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

    </head>

    <body>

        <div class="container">

            <div class="row">
                <a href="../public/index.php"><img alt="C$50 Finance" src="../public/img/logo.png"/></a>
            </div>  

            <nav class="navbar navbar-default">
              <div >
                <div class="navbar-header">                  
                  <a class="navbar-brand" href="../public/index.php"><span class="glyphicon glyphicon-home"></span></a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li><a href="../public/quote.php">Quote</a></li>
                    <li><a href="../public/buy.php">Buy</a></li>
                    <li><a href="../public/history.php">History</a></li>
                    
                  </ul>
                  
                  <ul class="nav navbar-nav navbar-right">
                    <?php if (empty($_SESSION["id"])): ?>
                        <li><a href="../public/login.php">Login</a></li>
                        <li><a href="../public/register.php">Register</a></li>
                    <?php else: ?>
                        <li><a href="../public/logout.php">Logout</a></li> 
                    <?php endif; ?>       
                  </ul>
                </div>
              </div>
        </nav>
    </div>    

    <div class="row">
