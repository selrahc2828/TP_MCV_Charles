<?php

require __DIR__ . '/../Model/usersModel.php';

logout();
header('location: index.php?action=accueil');