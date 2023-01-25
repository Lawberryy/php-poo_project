<?php

class User
{
    public function __construct(
        public string $email,
        public string $password,
        public string $firstName,
        public string $lastName
    )
    {
    }

    public function verify(): bool
    {
        $isValid = true;
        // si le champ email est vide OU password vide OU first name vide OU last name vide
        if ($this->email === '' || $this->password === '' || $this->firstName === '' || $this->lastName === '') {
            $isValid = false;
        }

        return $isValid;
    }
}
