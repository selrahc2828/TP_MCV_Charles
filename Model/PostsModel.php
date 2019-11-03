<?php

require_once('dbConnectModel.php');

function getPosts () {
    $db = connect();

    $query = $db->prepare('SELECT * 
    						FROM posts 
    						INNER JOIN categories 
    						ON categories.id_cat = posts.idCategory 
    						INNER JOIN users 
    						ON users.id_user = posts.idUser 
    						ORDER BY posts.id_post DESC;');
    $query->execute();

    return $query->fetchAll();
}

function getUnPost ($id_post) {
	$db = connect ();

	$query = $db->prepare('SELECT *
							FROM posts
							INNER JOIN categories
							ON categories.id_cat = posts.idCategory
							INNER JOIN users
							ON users.id_user = posts.idUser
							WHERE posts.id_post = ?;');
	$query->execute(array($id_post));
	$unPost = $query->fetch();

	return $unPost;
}

function getAllCateg () {
    $db = connect();

    $query = $db->prepare('SELECT * FROM categories');
    $query->execute();
    
    return $query->fetchAll();
}

function getImageURL() {
    $dossier_cible = "images";
    $fichier_cible = $dossier_cible . basename($_FILES['imagePath']['name']);
    $Type_image = strtolower(pathinfo($fichier_cible,PATHINFO_EXTENSION));
    if($Type_image == "jpg" OR $Type_image == "jpeg" OR $Type_image == "png"){
        if($_FILES["imagePath"]["size"] <= 5000000) {
            move_uploaded_file($_FILES['imagePath']['tmp_name'],$fichier_cible);
        }else {
            echo "Le fichier dépasse 5Mo, veuillez utiliser un fichier moins lourd.";
        }
    }else {
        echo "Seul les fichiers .png .jpg et .jpeg sont accepté";
    }
    return $fichier_cible;   
}

function NewPost($titre, $auteur, $contenu, $image, $id_profil, $id_categorie) {
    $db = connect();

    $query = $db->prepare('INSERT INTO posts(title, content, imagePath, idUser, idCategory) VALUES(:title, :content, :imagePath, :idUser, :idCategory)');
    $query->bindParam(":title", $titre);
    $query->bindParam(":imagePath", $image);
    $query->bindParam(":idUser", $id_profil);
    $query->bindParam(":content", $contenu);
    $query->bindParam(":idCategory", $id_categorie);
    $query->execute();

}

function getCommentaires($id_post) {
    $db = connect();

    $query = $db->prepare('SELECT * FROM comments INNER JOIN users ON users.id_user = comments.idAuteur WHERE idPost = :id_post');
    $query->bindParam(":id_post", $id_post);
    $query->execute();

    return $query->fetchAll();
}