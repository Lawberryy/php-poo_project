<?php

    session_start(); // démarrage de la session
    session_unset(); // efface toutes les variables de session
    $_SESSION = [];
    session_destroy(); // détruit la session en cours
    header('Location: login.php'); // on emmène l'utilisateur deconnecté sur la page de login
