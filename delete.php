<?php

    if (isset($_GET['id'])) {
        require_once 'class/connection.php';

        $connection = new Connection();
        $connection->delete($_GET['id']);

        header('Location: my-account.php');
    }
