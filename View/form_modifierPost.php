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
        <h1>Modifier un Post</h1><hr>
        <form method="POST" action="index.php?action=modifierPost&id_post=<?= $_GET['id_post']?>">
            <input type="text" id="titre" requested name="titre" placeholder="Titre" value="<?= $post['title']?>">
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
            <textarea requested id="contenu" name="contenu" placeholder="Contenu du post"><?=$post['content']?></textarea>
            <br>
            <input type="file" id="imagePath" name="imagePath" accept="image/png, image/jpeg, image/jpg" value="<?=$post['imagePath']?>" placeholder="fichier.png .jpg .jpeg">
            <br>
            <input type="submit">
        </form>
    </body>
</html>