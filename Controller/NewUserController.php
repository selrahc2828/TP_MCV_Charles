<?php


//require __DIR__ . '/../Model/usersModel.php';

addUser($_POST['user'], $_POST['mdp']);

header('location: index.php?action=accueil');