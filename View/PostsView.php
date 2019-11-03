<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Posts</title>
    </head>
    <body>
        <h1>Posts list</h1>
        <ul>
            <?php 
            foreach ($posts as $post) {
                $categ = $post['name'];
                $titre = $post['title'];
                $user = $post['username'];
                $image = $post['imagePath'];
                $contenu = $post['content'];
                $idpost = $post['id_post'];
                $idauteur = $post['id_user'];
                ?>
                <hr>
                <table border="1" cellpadding="15">
                    <tr>
                        <td><p><?= $categ ?></p></td>
                        <td>
                            <p>
                                <?= $titre ?>
                                <br>
                                <a href="index.php?action=Plus&id_post=<?= $idpost ?>"> Voir en détail </a>
                            </p>
                        </td>
                        <td><p><?= $idauteur.$user ?></p></td>
                    </tr>
                    <tr>
                        <td><p><?= $image ?></p></td>
                        <td colspan="2"><p><?= $contenu ?></p></td>
                    </tr>
                </table>

            <?php 
            } ?>
        </ul>
    </body>
</html>
