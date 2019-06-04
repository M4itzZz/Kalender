<?php
 $json = array();
 $requete = "SELECT * FROM events ORDER BY id";
 try {
 	require "db_config.php";
 } catch(Exception $e) {
    exit('Ei saa andmebassiga ühendust!');
 }
 $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
 echo json_encode($resultat->fetchAll(PDO::FETCH_ASSOC));
?>