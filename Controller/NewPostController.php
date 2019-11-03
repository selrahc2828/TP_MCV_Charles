<?php

require __DIR__ . '/../Model/PostsModel.php';

if(isset($_FILES['imagePath'])) {
	$image_URL = getImageURL();
	NewPost($_POST['titre'], $_SESSION['username'], $_POST['contenu'], $image_URL, $_SESSION['id'], $_POST['categorie']);
}else {
	NewPost($_POST['titre'], $_SESSION['username'], $_POST['contenu'], NULL, $_SESSION['id'], $_POST['categorie']);
}


header('location: index.php?accueil');