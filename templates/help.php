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
    body{
      background-image: url("../public/img/background/crops.png");
    }

    .col-md-12{
      background-color: white;
      color:grey;
      box-shadow: 1px 2px 20px 5px gray;
      text-align: center;
    }
    h3{
      font-weight:bold;
    }
    p{
      font-size: 16px;
    }
    .form-group{
      text-align: left;
    }
    .col-md-6{
      text-align: left;
    }
    #name{
      width:150px;
      height:30px;
    }
    #subject{
      width: 170px;
      height: 30px;
    }
    #feedback{
      width: 600px;
      height: 150px;
    }
    .col-md-1{
      padding-bottom:30px
    }

  </style>

</head>

<body>
  <div class="container">
    <br>
    <div class="col-md-12">
      <br><br>
      <h3> What is FARMLAND? </h3>
        <p> FARMLAND is a website created for the sole purpose of connecting Guyanese buyers and sellers of produce<br>
          with each other. Our aim is to function as a singular marketplace for consumers and producers to carry<br>
          out their day to day transactions from the comfort our their own homes.<br>
        </p>
      <br><br>
      <hr>
      <h3> How can you start buying? </h3>
        <p> The fact that you've made it this far means that you have at least already created an account with <br>
          FARMLAND. All you have to do is to head on over to our <a href="#">Marketplace</a>, under "Browse goods",<br>
          and begin buying from the wide variety of products.<br>
          OR<br>
          Just type the name of a product you're looking for in the search bar above and hit enter.<br>
           It's as easy as that!
        </p>
      <br><br>
      <hr>
      <h3> Just here to sell your goods? </h3>
        <p> No problem at all! Just a slightly different step from buying goods. Head over to the <a href="#">Marketplace</a> <br>
            but instead, you'll wanna look under "Sell goods". From here you just have to fill out the necessary<br>
            fields such as the product's <strong>Name</strong> and <strong>Description</strong>, add an image of your product,<br>
            submit, and BOOM! <br>
            Your product is ready to be sold!.
        </p>
      <br><br>
      <hr>
      <h3> Want to help improve FARMLAND? </h3>
        <p> We encourage feedback because we love to hear what our users think. You can help us help you by submitting<br>
          your opinion is the area provided below.<br>
        </p>
      <br>
    <div class="col-md-8">
      <form action="../public/help_page.php" method="POST">
      <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" name="name" required="required"></textarea>
      </div>
      <div class="form-group">
          <label for="subject">Subject:</label>
          <input type="text" class="form-control" id="subject" name="subject" required="required"></textarea>
      </div>
      <div class="form-group">
          <label for="feedback">Feedback:</label>
          <textarea type="text" class="form-control" id="feedback" name="feedback" required="required"></textarea>
      </div>
      <div class="col-md-1">
      	<button type="submit" class="btn btn-primary" id="btn" name="submit"> Submit <br></button>

      </div>
      <div>
        <br>
      </div>
    </form>
    </div>



    </div>








</div>

</body>
<br>

</html>
