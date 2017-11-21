<!DOCTYPE html>
<html>
<head>
	<title>Error</title>
	<link href="../public/css/bootstrap.css" rel="stylesheet"/>
  	<link href="../public/css/styles.css" rel="stylesheet"/>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	 <script src="../public/js/jquery-1.10.2.min.js"></script>
     <script src="../public/js/bootstrap.min.js"></script>

     <style type="text/css">
     	#message
     	{
     		border-radius: 20px;
     		margin-top:30%;
     		background-color: white;
     		box-shadow: 5px 5px 10px #000000;
     	}

     </style>

</head>
<body background="../public/img/background/farmland1.png">
	<div class="container" >
		<div  class="col-md-3"></div>
		<div id="message" class="col-md-6">
			<p class="lead text-danger text-center">
			    Error Encountered:
			</p>
			<h3 class="text-danger"><?= htmlspecialchars($message) ?></h3>
			

			<a href="javascript:history.go(-1);"><span class="btn btn-sm btn-primary">Back</a>

		</div>
		<br>
		<div class="col-md-3"></div>
	</div>
	
</body>
</html>

