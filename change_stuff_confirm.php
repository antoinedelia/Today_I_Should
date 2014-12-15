<?php
	include "singleton.php";
	$req = $bdd->prepare("UPDATE stuff 
	SET name_stuff=?, description_stuff=?, image_stuff=?
	Where id_stuff = '$_POST[id_hidden]'");
			
			$req->execute(array(
				$_POST['name'],
				$_POST['description'],
				$_POST['image']
			));
	header("Location: bdd.php");
?>
