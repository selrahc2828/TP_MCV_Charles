<?php

require __DIR__ . '/../Model/PostsModel.php';

$post = getUnPost($_GET['id_post']);
$Categories = getAllCateg();

require __DIR__ . '/../View/form_modifierPost.php';