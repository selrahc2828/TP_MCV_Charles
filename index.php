<?php 
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
	        <meta charset="UTF-8">
	        <meta name="viewport"
	              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	        <!--<meta http-equiv="X-UA-Compatible" content="ie=edge">-->
	        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	        <link rel="stylesheet" type="text/css" href=<?php echo __DIR__;?>"/view/CSS/correction_Bootstrap.css">
		<title>TP blog MVC</title>
	</head>
	<body>

<?php
//echo $_REQUEST['action'];
require_once(__DIR__.'/view/header.php');

$requestedPage = '/';
/*
if (isset($_SERVER['REQUEST_URI'])) {
    $requestedPage = explode('?', $_SERVER['REQUEST_URI']);
}*/
if (isset($_GET['action'])){
	$requestedPage = $_REQUEST['action'];
}else{
	$requestedPage = "accueil";
}
switch ($requestedPage) {

    case 'accueil':
    	require_once(__DIR__ . '/Controller/ShowPostsController.php');
    	break;

    case 'verifyUser':
    	if (!empty($_POST['user']) && !empty($_POST['mdp'])) {
    		require_once(__DIR__ . '/Controller/ConnexionValideController.php');
    	}
    	
    	break;

    case 'connexion':
    	require_once(__DIR__ . '/View/form_connection.php');
    	break;

    case 'Plus':
        if (isset($_GET['id_post'])&&$_GET['id_post']>0) {
            require_once(__DIR__ . '/controller/ShowUnPostController.php');
        }
        else {
            require_once(__DIR__ . '/Controller/ShowPostsController.php');
        }
    	break;

    case 'commenter':
        if(!isset($_SESSION['username'])) {
            require_once(__DIR__ . '/View/form_connection.php');
        }elseif (isset($_GET['id_post']) && $_GET['id_post']>0)
        {
            if (!empty($_POST['commentaire'])) {
                require_once(__DIR__ .'/Controller/CommentaireController.php');
            }else {
                require_once(__DIR__ . '/Controller/ShowPostsController.php');
            }
        }
    	break;

    case 'logout':
        require_once(__DIR__ .'/Controller/LogOutController.php');
    	break;

    case 'Profile':
        require_once(__DIR__ . '/Controller/ProfileController.php');
    	break;

    case'addPost':
        if(!isset($_SESSION['username']) && !empty($_POST['contenu']) && !empty($_POST['titre'])) {
            require_once(__DIR__ . '/View/form_connection.php');
        }else
        require_once(__DIR__ . '/Controller/NewPostController.php');

    case'newUserForm':
        require_once(__DIR__ . '/View/form_inscription.php');
        break;

    case'newUser':
        if(isset($_POST['user'])&&isset($_POST['mdp'])&&isset($_POST['mdpconf'])) {
            if($_POST['mdp'] === $_POST['mdpconf']) {
                require(__DIR__ . '/Model/usersModel.php');
                $usertrouve = getUnUser($_POST['user']);
                if($usertrouve == $_POST['user']) {
                    header('location: index.php?action=newUserForm&user=1');
                }else {
                    require_once(__DIR__ . '/Controller/NewUserController.php');
                }
            }else {
                header('location: index.php?action=newUserForm&mdp=1');
            }
        }
        break;

    case'supprimerPost':
        require_once(__DIR__ . '/Controller/supprimerPostController.php');
        break;

    case'modifierPostform':
        require_once(__DIR__ . '/Controller/form_modifierPost.php');
        break;

    case'modifierPost':
        if(isset($_POST['titre'])&&isset($_POST['categorie'])&&isset($_POST['contenu'])) {
            require_once(__DIR__ . '/Controller/modifierPostController.php');
        }else {
            echo "Remplir Les champs essentiels (titre et contenu).";
        }
        
        break;

    default:
        require_once(__DIR__ . '/View/404.php');
}
?>
	</body>
</html>