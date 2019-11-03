<?php

require_once('dbConnectModel.php');
 /*
function connect ()
{
    try {
        return new PDO(
            sprintf('mysql:host=%s;dbname=%s', DATABASE_CONFIG['host'], DATABASE_CONFIG['database']),
            DATABASE_CONFIG['user'],
            DATABASE_CONFIG['password']
        );
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}*/

function getUsers ()
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM users');
    $query->execute();

    return $query->fetchAll();
}

function getUnUser ($username)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM users WHERE username = ?');
    $query->execute(array($username));
    $resultat = $query->fetch();

    return $resultat;
}

/*
function getUnUserParId ($id)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM users WHERE id = ?');
    $query->execute(array($username));
    $resultat = $query->fetch();

    return $resultat;
}*/

function VerifUser ($pwd_propose, $username)
{
    $db = connect();

    //$mdphash = password_hash($mdp, PASSWORD_DEFAULT)
    $query = $db->prepare('SELECT * FROM users WHERE username = "$username"');
    $query->execute();
    $info_user=$query->fetch(PDO::FETCH_ASSOC);
    $pwd = $info_user['password'];

    if (password_verify($pwd_propose, $pwd)) {
        return True;
    }else{
        return False;
    }

}

function logout() {
    session_destroy();
    header('location : index.php?action=accueil');
}

function addUser($username, $mdp) {
    $mdphash = password_hash($mdp, PASSWORD_DEFAULT);
    $db = connect();

    $query = $db->prepare('INSERT INTO users (username, password) VALUES (:user, :mdp)');
    $query->bindParam(":user", $username);
    $query->bindParam(":mdp", $mdphash);
    $query->execute();
}