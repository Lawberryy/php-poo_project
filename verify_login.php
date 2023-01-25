<?php
    session_start();

    require_once 'class/connection.php';

    $mail = $_POST['email_login'];
    $pass = $_POST['password_login'];

    $connection = new Connection();
    $user_logged_in = $connection->getUser();

    $_SESSION['userID'] = $user_logged_in['id'];
    $_SESSION['first_name'] = $user_logged_in['first_name'];
    $_SESSION['last_name'] = $user_logged_in['last_name'];

    if (password_verify($pass, $user_logged_in['password']) && $user_logged_in['role'] == 1) {
        $_SESSION['isAdmin'] = true;
        header("Location: admin.php");
    } else if(password_verify($pass, $user_logged_in['password']) && $user_logged_in['role'] == 0) {
        $_SESSION['isAdmin'] = false;
        header("Location: my-account.php");
    } else {
        echo 'Votre mot de passe est probablement erroné. Veuillez vous reconnecter svp.';
        echo '<br><br>';
        echo '<a href="login.php" class="btn retour">Retour à la page Login</a>';
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify page</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

</body>
</html>
