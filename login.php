<?php
    session_start(); // démarre la session
    // echo $_SESSION['isAdmin'];
    if(isset($_SESSION["isAdmin"])) {
        header('Location: my-account.php'); // si la personne est connectée (en tant qu'admin ou non),
                                                  // on la renvoit sur sa page account car elle n'est pas censée
                                                 // avoir accès à la page login, elle doit se déconnecter avant.
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login page</title>

    <link rel="stylesheet" href="style.css">
</head>
<body class="background">

    <header>
        <img src="images/la-spa.png" alt="logo-la-spa" class="logo">
    </header>

    <section class="section-login">

        <h1>Page de Login</h1>

        <h2>Inscrivez-vous</h2>

        <section class="section-form">

            <form method="post" class="form sign-up">
                    <input class="input" type="email" name="email" placeholder="Entrez votre e-mail" required>
                    <input class="input pw" type="password" name="password" placeholder="Entrez votre mot de passe" required><br>
                    <input class="input" type="text" name="first_name" placeholder="Entrez votre prénom" required>
                    <input class="input" type="text" name="last_name" placeholder="Entrez votre nom" required><br>
                    <input class="submit" type="submit" value="S'inscrire">
            </form>
        </section>

        <?php

            require_once 'class/user.php';
            require_once 'class/connection.php';

            if($_POST) {
                $user = new User(
                    $_POST['email'],
                    $_POST['password'],
                    $_POST['first_name'],
                    $_POST['last_name'],
                );

                if($user->verify()) {
                    // save to database
                    $connection = new Connection();
                    $result = $connection->insert($user);
                    if ($result) {
                        echo 'Vous avez été enregistré avec succès ! Vous pouvez dès à présent vous connecter.';
                    } else {
                        echo 'Erreur interne :(';
                    }
                } else {
                    echo 'Le formulaire a une erreur';
                }
            }

        ?>

        <hr>

        <h2>Connectez-vous</h2>

        <section class="section-form">

            <form method="post" action="verify_login.php" class="form sign-in">
                <input class="input" type="email" name="email_login" placeholder="E-mail" required>
                <input class="input" type="password" name="password_login" placeholder="Mot de passe" required>
                <input class="submit" type="submit" value="Se connecter">
            </form>
        </section>
    </section>
</body>
</html>


