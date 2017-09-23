<html>
<head>
    <title>SIDEBAR</title>
	<link rel="stylesheet" type="text/css" href="../view/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../view/css/home.css"/>
	<script src="js/jquery.js"></script>
	<script type="text/javascript" src="../view/js/jquery-1.10.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../view/css/font-awesome.min.css"/>
</head>

<body>
	<div id="wrapper">
		<div class="row topbar">
			<div class="col-xs-12 bar">
					<center><img class="bbm" src="../view/img/LoginLogo.png"></center>	
			    
			</div>
		</div>

		<div class="row whole">
            <div class="col-xs-10 content" id="content">
               <!-- <div class="col-xs-2 sidebar-outer"> -->
               <!--  <div class="sidebarr col-md-12"> -->
                    <center>
                        <a href= "samplemainview.php" id="link"><div class="active"><span class="glyphicon glyphicon-th-list"></span><p>Main View</p></div></a>
                        <a href="#" id="link"><div ><span class="glyphicon glyphicon-envelope"></span><p>Monthly Budget</p></div></a>
                        <a href="#" id="link"><div><span class="glyphicon glyphicon-shopping-cart"></span><p>Feed</p></div></a>
                        <a href="#" id="link"><div><span class="glyphicon glyphicon-grain"></span><p>Analysis</p></div></a>
                        <a href="#" id="link"><div><span class="glypspanicon glyphicon-user"></span><p>Daily Bill</p></div></a>
                    </center>   
            <!-- </div>  -->
            </div>
		</div>

    </div>
</body>
</html>

<script>
	function goBack() {
        window.history.back();
    } 
</script>