<?php //Test de la BDD
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=today_you_should', 'root', '',	//On appelle la BDD
		array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',	//BDD EN UTF8
			PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING	//Pour afficher les erreurs
			));
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
?>