<!DOCTYPE html>
<head>
  <link href="../public/css/bootstrap.css" rel="stylesheet"/>
  <link href="../public/css/styles.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="../public/js/jquery-1.10.2.min.js"></script>
  <script src="../public/js/bootstrap.min.js"></script>
  <script src="../public/js/scripts.js"></script>
  <script src="../public/js/login_script.js"></script>

  <style>
  .container
{
width:800px;
overflow:hidden;
display:inline-block;
}
.side-bar
{
background:#74AFAD;
position:absolute;
height:100%;
width:200px;
color:#fff;
transition: margin-left 0.5s;
}

.side-bar ul
{
list-style:none;
padding:0px;

}

.side-bar ul li.menu-head
{
font-family: 'Lato', sans-serif;
padding:20px;
}


.side-bar ul li.menu-head a
{
color:#fff;
text-decoration:none;
height:50px;
}


.side-bar ul .menu-head  a
{
color:#fff;
text-decoration:none;
height:50px;
}

.side-bar ul .menu li  a
{
color:#fff;
text-decoration:none;
display:inline-table;
width:100%;
padding-left:20px;
padding-right:20px;
padding-top:10px;
padding-bottom:10px;
}

.side-bar ul .menu li  a:hover
{
border-left:3px solid #ECECEA;
padding-left:17px;
background-color: #d34615;
}

.side-bar ul .menu li  a.active
{
padding-left:17px;
background:#D9853B;
border-left:3px solid #ECECEA;
}

.side-bar ul .menu li  a.active:before {
content:"";
position: absolute;
width: 0;
height: 0;
border-top: 20px solid transparent;
border-bottom: 20px solid transparent;

border-left: 7px solid #D9853B;
margin-top: -10px;
margin-left: 180px;
}


.content
{
padding-left: 200px;
transition: padding-left 0.5s;
}

.active > .side-bar
{
margin-left:-150px;
transition: margin-left 0.5s;
}

.active > .content
{
padding-left:50px;
transition: padding-left 0.5s;
}
  </style>
</head>

<body>
<div class="container">
	<div class="row">
		<div class="wrapper">
    	    <div class="side-bar">
                <ul>
                    <li class="menu-head">
                        CLASH OF CLANS <a href="#" class="push_menu"><span class="glyphicon glyphicon-align-justify pull-right"></span></a>
                    </li>
                    <div class="menu">
                        <li>
                            <a href="#">Featured Goods <span class="glyphicon glyphicon-fire pull-right"></span></a>
                        </li>
                        <li>
                            <a href="#">Browse all Goods<span class="glyphicon glyphicon-search pull-right"></span></a>
                        </li>
                        <li>
                            <a href="#">Sell Goods <span class="glyphicon glyphicon-star pull-right"></span></a>
                        </li>
                        <li>
                            <a href="#">Cart<span class="glyphicon glyphicon-shopping-cart pull-right"></span></a>
                        </li>
                    </div>

                </ul>
    	    </div>
            <div class="content">
                <div class="col-md-12">

                </div>
            </div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
    $(".push_menu").click(function(){
         $(".wrapper").toggleClass("active");
    });
});
</script>
</body>
