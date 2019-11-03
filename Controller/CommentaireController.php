<?php


require __DIR__ . '/../Model/CommentaireModel.php';
echo $_GET['id_post'];
echo $_GET['id_auteur'];
echo $_POST['commentaire'];
addCommentaire($_GET['id_post'],$_GET['id_auteur'],$_POST['commentaire']);
//header('location: index.php?action=accueil');