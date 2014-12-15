<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Today You Should</title>
		
		<link rel="stylesheet" href="font-awesome-4.2.0/css/font-awesome.min.css">

		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    	<!--[if lte IE 8]>
	        <link rel="stylesheet" href="css/layouts/side-menu-old-ie.css">
	    <![endif]-->
	    <!--[if gt IE 8]><!-->
	        <link rel="stylesheet" href="css/layouts/side-menu.css">
	    <!--<![endif]-->
	</head>
	<body>
		<?php 
			include_once("singleton.php"); 
			$stuff_test = $bdd->query("Select * From stuff WHERE id_stuff = '$_GET[id]'");
			$stuff = $stuff_test->fetch();
		?>
	    <div id="main">
	        <div class="header">
	            <h1>Today You Should</h1>
	            <h2>The website that tells you what to do !</h2>
	        </div>

	        <div class="content">
	        	<form action="change_stuff_confirm.php" method="POST">
	        		<input type="hidden" name="id_hidden" id="id_hidden" value="<?php echo $_GET['id'];?>">
	        		<label for="name">Nom : </label>
	        		<br/>
	        		<input type="text" id="name" name="name" placeholder="Nom" value="<?php echo $stuff[1] ?>">
	        		<br/>
	        		<br/>
	        		<label for="description">Description : </label>
	        		<br/>
	        		<textarea name="description" id="description" cols="100" rows="10" placeholder="Résumé du produit"><?php echo $stuff[2]; ?></textarea>
	        		<br/>
	        		<br/>
	        		<label for="image">URL de l'image : </label>
	        		<br/>
	        		<input type="text" name="image" id="image" size="50" placeholder="URL image" value="<?php echo $stuff[3] ?>">
	        		<br/>
	        		<br/>
	        		<input type="submit" value="Ajouter">
	        	</form>     
	        </div>
	    </div>
	</body>
</html>