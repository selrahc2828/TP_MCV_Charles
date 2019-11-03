<?php

require __DIR__ . '/../View/form_connection.php';



/*
require __DIR__ . '/../Model/usersModel.php';

if (isset($_POST['user'])&& isset($_POST['mdp'])) {
	echo "ptet coucou";
	if (VerifUser($_POST['mdp'], $_POST['user']) == True) 
	{
		$_SESSION['User'] = $users;
		require __DIR__ . '/../Controller/PostController.php';
		echo "coucou";
	}
	if (VerifUser($_POST['mdp'], $_POST['user']) == False)
	{
		echo "why";
	}
}

require __DIR__ . '/../View/form_connection.php';
echo "pas coucou";