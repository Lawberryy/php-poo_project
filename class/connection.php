<?php

class Connection
{
    public PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=spa;host=127.0.0.1', 'root', '');
    }

    public function insert(User $user)
    {
        $query = 'INSERT INTO user (email, password, first_name, last_name) 
                    VALUES (:email, :password, :first_name, :last_name)';

        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'email' => $user->email,
            //'password' => md5($user->password . 'MY_SUPER_SALT'),
            'password' => password_hash($user->password, PASSWORD_DEFAULT), // j'ai décidé d'utiliser password_hash()
            // afin de pouvoir utiliser la fonction associée password_verify() sur la page verify_login.php
            'first_name' => $user->firstName,
            'last_name' => $user->lastName,
        ]);
    }

    public function insertPet(Pet $pet)
    {
        $query_pet = 'INSERT INTO pet (pet_name, pet_type, user_id) 
                    VALUES (:pet_name, :pet_type, :user_id)';

        $statement_pet = $this->pdo->prepare($query_pet);

        return $statement_pet->execute([
            'pet_name' => $pet->petName,
            'pet_type' => $pet->petType,
            'user_id' => $pet->userID
        ]);
    }


    public function getAll(): array {
        $query = 'SELECT * FROM user';

        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUser(): array {

        $mail = $_POST['email_login'];

        $query_user = "SELECT * FROM user WHERE email = '$mail'";

        $statement_user = $this->pdo->prepare($query_user);
        $statement_user->execute();

        return $statement_user->fetch();
    }

    public function getPet(): array {
        $user_id = $_SESSION['userID'];
        $query_pet = "SELECT * FROM pet
                      WHERE user_id = '$user_id'";

        $statement_pet = $this->pdo->prepare($query_pet);
        $statement_pet->execute();

        return $statement_pet->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllPets(): array {
        $query_all_pets = "SELECT * FROM pet JOIN user ON pet.user_id = user.id";

        $statement_all_pets = $this->pdo->prepare($query_all_pets);
        $statement_all_pets->execute();

        return $statement_all_pets->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete(int $id): bool
    {
        $query_delete = 'DELETE FROM pet WHERE id = :id';

        $statement_delete = $this->pdo->prepare($query_delete);

        return $statement_delete->execute([
           'id' => $id,
        ]);
    }
}
