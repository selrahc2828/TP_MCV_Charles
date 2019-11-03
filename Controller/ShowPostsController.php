<?php


require __DIR__ . '/../Model/PostsModel.php';

$posts = getPosts();

require __DIR__ . '/../View/PostsView.php';