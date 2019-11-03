<?php
if (PHP_SESSION_NONE === session_status()) {
    session_start();
}

$defaultPassword = password_hash('root', PASSWORD_DEFAULT);
$defaultUsername = 'root';

if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);

//    if ($username === $defaultUsername && password_verify($password, $defaultPassword)) {
    $_SESSION['user'] = ['username' => $username, 'password' => $password];
//    } else {
//        $error = 'invalid credentials';
//    }
}

if ($_SESSION['user'] !== null) {
    var_dump($_SESSION['user']);
}

function sanitize(string $input): string
{
    $input = trim($input);
    return htmlspecialchars($input);
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Auth</title>
    </head>
    <body>
        <?= $_SESSION['user']['username']; ?>
        <form action="auth.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username">
            <label for="password">Password</label>
            <input type="password" name="password">
            <input type="submit" value="Send">
        </form>
    </body>
</html>
