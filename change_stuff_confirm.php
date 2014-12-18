<?php
	include "singleton.php";

	$titre_db = $bdd->query("SELECT * FROM stuff");
	$add=true;
	foreach ($titre_db as $key => $value)
		if($value['name_stuff'] == $_POST['name'] && $_POST['name'] != $_POST['name_hidden'])
			$add=false;


	if ($add) {
		$req = $bdd->prepare("UPDATE stuff 
		SET name_stuff=?, description_stuff=?, image_stuff=?, date_stuff=?, wikipedia_stuff=?, category_stuff=?
		Where id_stuff = '$_POST[id_hidden]'");
				
		$req->execute(array(
			$_POST['name'],
			$_POST['description'],
			$_POST['image'],
			$_POST['date'],
			$_POST['wiki'],
			$_POST['cat']
		));
		header("Location: bdd.php");
	}
	else
		header("Location: bdd.php?error=name_already_in_db");
?>
