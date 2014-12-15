<?php
	date_default_timezone_set('Europe/Paris');
	$date = date('Y/m/d', time());
	include_once("singleton.php");
	$stuff_test = $bdd->query("Select * From stuff WHERE date_stuff = '$date'");	//Récupère les infos de clients
	$stuff = $stuff_test->fetch();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Today You Should</title>

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
	            <h1>Today You Should</h1>
	            <h2>The website that tells you what to do !</h2>
	        </div>

	        <div class="content">
	            <h2 class="content-subhead"><?php echo $stuff[6] ?></h2>
	            <h3><a style="color: #000000; text-decoration: none;" href="<?php echo $stuff[5] ?>" target="_blank"><?php echo $stuff[1] ?></a></h3>
	            <img class="pure-img" style="width:400px; height: auto; display: block; margin-left: auto; margin-right: auto;"src="<?php echo $stuff[3] ?>" alt="<?php echo $stuff[1] ?>">
	        	<h4>Description :</h4>
	        	<p><?php echo $stuff[2]?></p>
	        </div>
	    </div>
	</body>
</html>