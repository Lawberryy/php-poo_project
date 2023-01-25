<?php
    session_start();
    $prenom = $_SESSION['first_name'];
    $nom = $_SESSION['last_name'];

    if (!$_SESSION["isAdmin"]) {
        header('Location: my-account.php'); // on emmène l'utilisateur sur sa page account car il n'est pas censé
                                                  // accéder à la page admin
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin page</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <img src="images/la-spa.png" alt="logo-la-spa" class="logo">

        <?php
        if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"]) { ?>
            <a href="my-account.php" class="btn account">Ma page account</a>
            <a href="logout.php" class="btn logout">Déconnexion</a>
        <?php } ?>
    </header>

    <section class="section admin">
        <h1>Bienvenue sur votre page admin <?php echo $prenom . ' ' . $nom ?></h1>

<?php
    require_once 'class/connection.php';
    require_once 'class/pet.php';
    require_once 'class/user.php';

    $connection_pet = new Connection();
    $pets = $connection_pet->getAllPets();

    $allUsers = $connection_pet->getAll();

?>
        <div class="listes">
            <div>
                <h2>Liste de tous les utilisateurs</h2>
                <div class="liste-users">
                    <table>
                        <tr class="ligne-1">
                            <td>Utilisateurs</td>
                        </tr>
                        <?php foreach($allUsers as $uniqueUser) { ?>
                            <tr>
                                <td><?php echo $uniqueUser["first_name"] . ' ' . $uniqueUser["last_name"]; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            <div>
                <h2>Liste des animaux associés à leur humain</h2>
                <div id="liste-user-pet">
                    <table>
                        <tr class="ligne-1">
                            <td>Nom de l'humain</td>
                            <td>Nom de l'animal</td>
                            <td>Type de l'animal</td>
                        </tr>
                        <?php foreach($pets as $uniquePet) { ?>
                            <tr>
                                <td><?php echo $uniquePet["first_name"] . ' ' . $uniquePet["last_name"]; ?></td>
                                <td><?php echo $uniquePet["pet_name"]; ?></td>
                                <td><?php echo $uniquePet["pet_type"]; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>


    </section>

</body>
</html>
