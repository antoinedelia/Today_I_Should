<?php
	include "singleton.php";

	$wiki = $_POST['wiki'];
	$doc = new DOMDocument;
	$doc->loadHTMLFile($wiki);

	$titre = $doc->getElementsByTagName('i');
	$name = $titre->item(0)->nodeValue;

	$paragraphe = $doc->getElementsByTagName('p');
	$description = $paragraphe->item(0)->nodeValue;

	$first = true;

	foreach ($doc->getElementsByTagName('img') as $node) {
		if (strpos($node->getAttribute('srcset'), "upload") && $first == true) {
			$arr = explode("1.5", substr($node->getAttribute('srcset'), 2));
			$first = $arr[0];
			$img = $first;
			$first=false;
		}
	}
?>

<?php

	$wiki_db = $bdd->query("SELECT * FROM stuff");
	$add=true;
	foreach ($wiki_db as $key => $value)
		if($value['wikipedia_stuff'] == $wiki)
			$add=false;

	if ($add) {
		$req = $bdd->prepare('INSERT INTO stuff (name_stuff, description_stuff, image_stuff, date_stuff, wikipedia_stuff, category_stuff) 
		VALUES (?, ?, ?, ?, ?, ?)');
		
		$req->execute(array(
			$name,
			$description,
			$img,
			$_POST['date'],
			$wiki,
			$_POST['cat']
		));
		header("Location: bdd.php");
	}
	else
		header("Location: bdd.php?error=name_already_in_db");
?>