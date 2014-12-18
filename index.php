<?php
	// Set timezone to Paris (because I'm French, deal with it)
	date_default_timezone_set('Europe/Paris');
	// Get the date
	$date = date('Y/m/d', time());
	include_once("singleton.php");
	// Get the stuff according to the date (ona day = one stuff)
	$stuff_test = $bdd->query("Select * From stuff WHERE date_stuff = '$date'");
	$stuff = $stuff_test->fetch();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Today You Should</title>

		<link rel="stylesheet" href="font-awesome-4.2.0/css/font-awesome.min.css">

		<!-- Pure CSS available here : http://purecss.io/ -->
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">

		<!--[if lte IE 8]>
	    	<link rel="stylesheet" href="css/layouts/side-menu-old-ie.css">
		<![endif]-->
    	<!--[if gt IE 8]><!-->
        	<link rel="stylesheet" href="css/layouts/side-menu.css">
    	<!--<![endif]-->
	</head>
	<body>
	    <div id="main">
	        <div class="header">
	        	<!-- The title -->
	            <h1><a style="text-decoration: none; color: #333" href="index.php">Today You Should</a></h1>
	            <!-- The slogan -->
	            <h2>The website that tells you what to do !</h2>
	            <h5>Alpha 0.0.1</h5>
	            <a style="color: #000000" href="http://localhost/Today_You_Should/bdd.php"><i class="fa fa-database fa-5x"></i></a>
				<br/>
				<br/>
				<br/>

	        </div>

	        <div class="content">
	            <h2 class="content-subhead"><?php echo $stuff[6] ?></h2>
	            <h3><a style="color: #000000; text-decoration: none;" href="<?php echo $stuff[5] ?>" target="_blank"><?php echo $stuff[1] ?></a></h3>
	            <img class="pure-img" style="width:400px; height: auto; display: block; margin-left: auto; margin-right: auto;"src="http://<?php echo $stuff[3] ?>" alt="<?php echo $stuff[1] ?>">
	        	<h4>Description :</h4>
	        	<p><?php echo $stuff[2]?></p>
	        </div>
	    </div>
	</body>
</html>