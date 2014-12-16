<!DOCTYPE html>
<html>
	<head>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
		<?php include_once("singleton.php"); ?>
		<?php $date = date('Y-m-d', time()); ?>
	    <div id="main">
	        <div class="header">
	            <h1><a style="text-decoration: none; color: #333" href="index.php">Today You Should</a></h1>
	            <h2>The website that tells you what to do !</h2>
	            <h5>Alpha 0.0.1</h5>
	            <a style="color: #000000"href="http://localhost/Today_You_Should/"><i class="fa fa-home fa-5x"></i></a>
	            <br/>
	            <br/>
	            <br/>
	            
	        </div>

	        <div class="content">
	        	<br/>
	        	<!-- <h2>Search your stuff !</h2>
	        	<h3 id="url">Adresse url : </h3> -->
	        	<!-- <p><a href="http://en.wikipedia.org/wiki/Main_Page" target="iframe_a">Click to search stuff !</a></p> -->
	        	<!-- <iframe width="100%" height="300px" src="http://en.wikipedia.org/wiki/Main_Page" frameborder="1" name="iframe_a" id="iframe_a"></iframe> -->
				
	        	<!-- Form to add stuff to the DB -->
	        	<form action="add_stuff.php" method="POST" class="pure-form">
	        		<fieldset class="pure-group">
	        			<legend>Add stuff</legend>
	        			<label for="wiki">Wikipedia : </label>
		        		<br/>
	        			<input required type="text" name="wiki" id="wiki">
	        			<br/>
		        		<br/>
		        		<label for="date">Date : </label>
		        		<br/>
	        			<input required type="date" name="date" id="date" value="<?php echo $date ?>">
	        			<br/>
		        		<br/>
		        		<label for="cat">Catégorie : </label>
		        		<br/>
	        			<select name="cat" id="cat">
							<option value="Movie">Movie</option>
							<option value="TV">TV</option>
							<option value="Book">Book</option>
							<option value="Game">Game</option>
							<option value="Music">Music</option>
				    	</select>
	        			<br/>
		        		<br/>
		        		<input type="submit" value="Ajouter" class="pure-button pure-input-1-5 pure-button-primary">
		        	</fieldset>
	        	</form>

	        	<br/>
	        	<br/>
				
				<!-- Table with ALL the stuff -->
				
				<table class="pure-table pure-table-horizontal">
				    <thead>
				        <tr>
				            <th>#</th>
				            <th>Name</th>
				            <th>Date</th>
				            <th>Change</th>
				            <th>Delete</th>
				        </tr>
				    </thead>

				    <tbody>
				    <?php
				    $stuff_test = $bdd->query("SELECT * FROM stuff ORDER BY date_stuff ASC");
					$stuff = $stuff_test->fetchAll();
					$size = sizeof($stuff);
		        		for ($i=0; $i < $size; $i++) { 
		        			?>
		        			<tr <?php if($i%2!=0){ ?> class="pure-table-odd" <?php } ?>>
					            <td><?php echo $stuff[$i]["id_stuff"];?></td>
					            <td><?php echo $stuff[$i]["name_stuff"];?></td>
					            <td><?php echo $stuff[$i]["date_stuff"];?></td>
					            <td><a style="color: #E89B37;" href="change_stuff.php?id=<?php echo $stuff[$i]["id_stuff"]; ?>"><i class="fa fa-pencil fa-2x"></i></a></td>
					            <td><a style="color: #FF0000;" href="delete_stuff.php?id=<?php echo $stuff[$i]["id_stuff"]; ?>"><i class="fa fa-trash fa-2x"></i></a></td>
				        	</tr>
				        	<?php
		        		}
		        	?> 
				    </tbody>
				</table>
	        </div>
	    </div>
	    <script>
	  //   	$("#iframe_a").load(function(){
	  //   		alert(document.getElementById("iframe_a").contentDocument.location);
	  //   		prompt($(document.getElementById("iframe_a")).attr("src"));
			//     prompt(document.getElementById("iframe_a").contentWindow.location.href);
			//  });

		 //    document.getElementById('iframe_a').onload = function() {
			//     var url = document.getElementById("iframe_a").contentWindow.location.href;
   //  			alert(url);
			// };
    	</script>
	</body>
</html>