<?php
    session_start();
    // $_SESSION['userID'];
    $prenom = $_SESSION['first_name'];
    $nom = $_SESSION['last_name'];

    if(!isset($_SESSION["isAdmin"])) {
        header('Location: login.php'); // si l'utilisateur essaye d'accéder à la page account en rentrant l'url
        // my-account.php (donc sans être passé par le formulaire de connexion), il sera redirigé vers la page login.php
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My account page</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <img src="images/la-spa.png" alt="logo-la-spa" class="logo">

        <?php
        if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"]) { ?>
            <a href="admin.php" class="btn admin">Page admin</a>
            <a href="logout.php" class="btn logout">Déconnexion</a>
        <?php } else if (!$_SESSION["isAdmin"]) { ?>
            <a href="logout.php" class="btn logout">Déconnexion</a>
        <?php } ?>
    </header>

    <section class="section my-account">

        <h1>Bienvenue sur votre profil <?php echo $prenom . ' ' . $nom ?></h1>

        <h2>Ajouter un animal à votre liste</h2>

        <section class="section-form">

            <form method="post" class="form">
                <input class="input pet_name" type="text" name="pet_name" placeholder="Nom de l'animal" required>
                <select name="pet_type" class="input pet_type">
                    <option value="Meow-meow">Chat</option>
                    <option value="Doggo">Chien</option>
                    <option value="Furet">Furet</option>
                    <option value="Hamster">Hamster</option>
                    <option value="Lapinou">Lapin</option>
                    <option value="Souris">Souris</option>
                </select>
                <br>
                <!-- <input type="text" name="user_id" hidden><br> -->
                <input type="submit" value="Ajouter" class="submit">
            </form>
        </section>

    <?php

        require_once 'class/connection.php';
        require_once 'class/pet.php';

        if($_POST) {
            $pet = new Pet(
                $_POST['pet_name'],
                $_POST['pet_type'],
                $_SESSION['userID'],
            );

            if($pet->verifyPet()) {
                // save to database
                $connection = new Connection();
                $result = $connection->insertPet($pet);
                if ($result) {
                    echo 'Votre animal a été enregistré avec succès !';
                } else {
                    echo 'Erreur interne :(';
                }
            } else {
                echo 'Le formulaire a une erreur';
            }
        }

        $connection_pet = new Connection();
        $pets = $connection_pet->getPet();

    ?>

        <div class="bloc-pet">
            <h2>Vos animaux :</h2>
            <div class="cards">
                <?php foreach($pets as $uniquePet) { ?>
                    <div class="card">
                        <p><span>Nom :</span> <?php echo $uniquePet["pet_name"]; ?></p>
                        <p class=""><span>Type :</span>  <?php echo $uniquePet["pet_type"]; ?></p>
                        <br>
                        <?php echo '<a class="delete" href="delete.php?id=' . $uniquePet['id'] . '">Supprimer de ma liste</a>'; ?>
                    </div>
                <?php } ?>
            </div>
        </div>

    </section>

</body>
</html>
