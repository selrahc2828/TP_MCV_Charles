<?php

require __DIR__ . '/../Model/PostsModel.php';

$Categories = getAllCateg();
$mesPosts = getMesPosts($_SESSION['id']);
//print_r($mesPosts);
require __DIR__ . '/../View/ProfileView.php';