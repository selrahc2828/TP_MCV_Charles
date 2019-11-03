<?php


require __DIR__ . '/../Model/PostsModel.php';

$post = getUnPost($_GET['id_post']);
$commentaires = getCommentaires($_GET['id_post']);
/*
require __DIR__ . '/../Model/usersModel.php';

$auteur = getUnUserParId($post['idUser']);
*/
require __DIR__ . '/../View/UnPostView.php';