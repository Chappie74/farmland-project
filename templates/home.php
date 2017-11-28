<!DOCTYPE html>
<html>
<head>
  <link href="../public/css/bootstrap.css" rel="stylesheet"/>
  <link href="../public/css/styles.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="../public/js/jquery-1.10.2.min.js"></script>
  <script src="../public/js/bootstrap.min.js"></script>
  <script src="../public/js/scripts.js"></script>
  <script src="../public/js/login_script.js"></script>

<style>




    .carousel-caption{
      background-color: black;
      padding-top:5px;
      padding-bottom:5px;
      height:85px;
      bottom:15%;

      border-radius: 25px;
      box-shadow:0px 0px 50px #d34615;
      width:50%;
      left:25%;


    }
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
      display: block;
      max-width: 100%;
      height: 625px; !important;
    }
    a:hover{
      text-decoration: none;
    }
    h3{
      color:#d34615;
    }


</style>

</head>

<body>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <a href="#"><img src="../public/img/shop.png" alt="Shop Now" style="width:100%"></a>
          <a href="#">
            <div class="carousel-caption">
              <h3>GET STARTED BUYING OR SELLING</h3>
            </div>
          </a>
      </div>

      <div class="item">
        <img src="../public/img/vegetables.jpg" alt="Most Sold" style="width:100%">
          <a href="#">
            <div class="carousel-caption">
              <h3>VIEW OUR MOST SOLD PRODUCTS</h3>
            </div>
          </a>
      </div>

      <div class="item">
        <img src="../public/img/supplier.jpg" alt="Best Sellers" style="width:100%">
          <a href="#">
            <div class="carousel-caption">
              <h3>BROWSE OUR BEST SELLERS</h3>
            </div>
          </a>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</body>
