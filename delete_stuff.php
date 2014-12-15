<?php
	include "singleton.php";
	$bdd->query("DELETE FROM stuff Where IdArticle = '$_GET[id]'");
	header("Location: bdd.php");
?>