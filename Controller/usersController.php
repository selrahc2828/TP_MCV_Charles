<?php

require __DIR__ . '/../Model/usersModel.php';

$users = getUsers();

require __DIR__ . '/../View/usersView.php';