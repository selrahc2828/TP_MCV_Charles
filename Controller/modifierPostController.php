<?php

require __DIR__ . '/../Model/PostsModel.php';

modifierPost($_GET['id_post'], $_POST['imagePath'], $_POST['titre'], $_POST['contenu'], $_POST['categorie']);
$Categories = getAllCateg();
$mesPosts = getMesPosts($_SESSION['id']);
print_r($mesPosts);
require __DIR__ . '/../View/ProfileView.php';