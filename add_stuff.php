<?php
	include "singleton.php";
	$req = $bdd->prepare('INSERT INTO stuff (name_stuff, description_stuff, image_stuff) 
	VALUES (?, ?, ?)');
	
	$req->execute(array(
	$_POST['name'],
	$_POST['description'],
	$_POST['image']
	));
	header("Location: bdd.php");
?>