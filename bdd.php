<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Today I Should</title>
		
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
		<?php include_once("singleton.php"); ?>
	    <div id="main">
	        <div class="header">
	            <h1>Today I Should</h1>
	            <h2>The website that tells you what to do !</h2>
	        </div>

	        <div class="content">
	        	<form action="add_stuff.php" method="POST">
	        		<label for="name">Nom : </label>
	        		<br/>
	        		<input required type="text" id="name" name="name" placeholder="Nom">
	        		<br/>
	        		<br/>
	        		<label for="description">Description : </label>
	        		<br/>
	        		<textarea required name="description" id="description" cols="100" rows="10" placeholder="Résumé du produit"></textarea>
	        		<br/>
	        		<br/>
	        		<label for="image">URL de l'image : </label>
	        		<br/>
	        		<input required type="text" name="image" id="image" size="50" placeholder="URL image">
	        		<br/>
	        		<br/>
	        		<input type="submit" value="Ajouter">
	        	</form>

	        	<br/>
	        	<br/>

				<table class="pure-table pure-table-horizontal">
				    <thead>
				        <tr>
				            <th>#</th>
				            <th>Nom</th>
				            <th>Modifier</th>
				            <th>Supprimer</th>
				        </tr>
				    </thead>

				    <tbody>
				    <?php
				    $stuff_test = $bdd->query("Select * From stuff");	//Récupère les infos de clients
					$stuff = $stuff_test->fetchAll();
					$size = sizeof($stuff);
		        		for ($i=0; $i < $size; $i++) { 
		        			?>
		        			<tr>
					            <td><?php echo $stuff[$i]["id_stuff"];?></td>
					            <td><?php echo $stuff[$i]["name_stuff"];?></td>
					            <td><a style="color: #E89B37;" href="change_stuff.php?id=<?php echo $i+1?>"><i class="fa fa-pencil fa-2x"></i></a></td>
					            <td><a style="color: #FF0000;" href="delete_stuff.php?id=<?php echo $i+1?>"><i class="fa fa-trash fa-2x"></i></a></td>
				        	</tr>
				        	<?php
		        		}
		        	?> 
				    </tbody>
				</table>    
				<br/>  
				<a style="color: #000000"href="http://localhost/Today_I_Should/"><i class="fa fa-home fa-5x"></i></a>
	        </div>
	    </div>
	</body>
</html>