<?php

require __DIR__ . '/../Model/usersModel.php';
$user = $_POST['user'];
$resultat = getUnUser($user);

$password_Vrai = (password_verify($_POST['mdp'], $resultat['password']));

if($password_Vrai) {
	$_SESSION['username'] = $user;
	$_SESSION['id'] = $resultat['id'];
	header('location: index.php?action=accueil');
}else{
	header('location: index.php?action=connexion');
}