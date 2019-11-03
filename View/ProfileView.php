<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Profile</title>
    </head>
    <body>
        <h1>Ajouter un Post</h1><hr>
        <form method="POST" action="index.php?action=addPost">
            <input type="text" id="titre" requested name="titre" placeholder="Titre">
            <select name="categorie" id="categorie">
                <?php
                foreach($Categories as $Categorie) {
                ?>
                <option value="<?= $Categorie['id_cat']; ?>">
                    <?= $Categorie['name']; ?>
                </option>
                <?php
            }
            ?>
            </select>
            <br>
            <textarea requested id="contenu" name="contenu" placeholder="Contenu du post"></textarea>
            <br>
            <input type="file" id="imagePath" name="imagePath" accept="image/png, image/jpeg, image/jpg" placeholder="fichier.png .jpg .jpeg">
            <br>
            <input type="submit">
        </form>
        <br><br><hr>
        <h1>Supprimer/Modifier un Post</h1><hr>
            <table border="1" cellpadding="=15">
                <?php
                foreach ($mesPosts as $monPost) { ?>
                <tr>
                    <center>
                        <th>
                            TITRE : <?= $monPost['title']?>
                        </th>
                    </center>
                    <center>
                        <th>
                            CATÉGORIE : <?= $monPost['name']?>
                        </th>
                        <td rowspan="2">
                            <a href='index.php?action=modifierPostform&id_post=<?=$monPost['id_post']?>'>
                                <img src='images/modif.jpg' width=50 height=50/>
                            </a>
                        </td>
                        <td rowspan="2">
                            <a href='index.php?action=supprimerPost&id_post=<?=$monPost['id_post']?>'>
                                <img src='images/supp.jpg' width=50 height=50/>
                            </a>
                        </td>
                    </center>
                </tr>
                <tr>
                    <td>
                        IMAGE : <?= $monPost['imagePath']?>
                    </td>
                    <td>
                        <?= $monPost['content']?>
                    </td>
                </tr>
            <?php } ?>
            </table>
            <!--
        <br><br><hr>
        <h1>Ajouter une Catégorie</h1><hr>
-->
    </body>
</html>
