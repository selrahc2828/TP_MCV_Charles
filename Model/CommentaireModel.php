<?php

require_once('dbConnectModel.php');

function addCommentaire($idPost, $idAuteur, $Commentaire)
{
	$db = connect();

	$query = $db->prepare('INSERT INTO comments(idPost, idAuteur, content)
							VALUES(:idPost, :idAuteur, :Commentaire)');
	$query->bindParam(":idPost", $idPost);
	$query->bindParam(":idAuteur", $idAuteur);
	$query->bindParam(":Commentaire", $Commentaire);
	$query->execute();
	print_r($query);
}