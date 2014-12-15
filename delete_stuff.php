<?php
	include "singleton.php";
	$bdd->query("DELETE FROM stuff Where id_stuff = '$_GET[id]'");
	header("Location: bdd.php");
?>