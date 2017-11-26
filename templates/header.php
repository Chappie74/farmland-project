<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
  <link href="../public/css/bootstrap.css" rel="stylesheet"/>
  <link href="../public/css/styles.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <?php if (isset($title)): ?>
        <title>FARMLAND: <?= htmlspecialchars($title) ?></title>
  <?php else: ?>
        <title>FARMLAND</title>
  <?php endif ?>

  <script src="../public/js/jquery-1.10.2.min.js"></script>
  <script src="../public/js/bootstrap.min.js"></script>
  <script src="../public/js/scripts.js"></script>
</head>

<body>

  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-tree-deciduous"></span> FARMLAND </a><br>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span> HOME </a></li>
        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> SHOP </a></li>
        <li><a href="#"><span class="glyphicon glyphicon-info-sign"></span> HELP </a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> PROFILE </a></li>
          <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
      </ul>
    </div>
  </nav>




</body>
</html>
