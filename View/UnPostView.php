<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?= $post['title'] ?></title>
    </head>
    <body>
        <h1>Détails du post : </h1>
        <ul>
            <hr>
            <p>
            	<a href="index.php">Retour à la liste des Posts </a>
            </p>
            
            <table border="1" cellpadding="15">
                <tr>
                    <td><p>Catégorie : <?= $post['name'] ?></p></td>
                    <td>
                        <p>
                            Titre : <?= htmlspecialchars($post['title']) ?>
                        </p>
                    </td>
                    <td>
                        <p>
                            Posté par : <?= $post['username'] ?></p>
                    </td>
                </tr>
                <tr>
                    <?php
                    if(!empty($post['imagePath'])) { ?>
                        <td>
                            <p>
                                <img src="<?= $post['imagePath']?>" alt="image">
                            </p>
                        </td>
                        <td colspan="2">
                            <p>
                                <?= nl2br(htmlspecialchars($post['content'])) ?>
                            </p>
                        </td>
                    <?php
                    }else { ?>
                        <td colspan="3">
                            <p>
                                <?= nl2br(htmlspecialchars($post['content'])) ?>
                            </p>
                        </td>
                    <?php } ?>
                </tr>
            </table>   
        	<h2>Commenter : </h2>
        	<?php 
        	if(isset($_SESSION['username'])) { ?>
        		<form method="POST" action="index.php?action=commenter&id_post=<?= $post['id_post'] ?>&id_auteur=<?= $_SESSION['id'] ?>">
            	<textarea required rows="4" cols="50" id='commentaire' name='commentaire' placeholder='Commentaire'></textarea>
            	<input type='submit'>
        		</form><?php
        	}else { ?>
        		Connectez vous pour commenter
                <hr>
                <h2>Commentaires : </h2><br>
        	<?php
        	} 
            foreach($commentaires as $commentaire) { ?>
                <table border="0" cellpadding="15">
                    <td>
                        <p>
                            Commentaire de : <?= $commentaire['username']?>    
                        </p>
                    </td>
                    <td>
                        <p>
                            <?= $commentaire['content']?>
                        </p>
                    </td>
                </table>
                <br><br>
            <?php } ?>
        </ul>
    </body>
</html>