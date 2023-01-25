<?php

Class Pet
{
    public function __construct(
        public string $petName,
        public string $petType,
        public int $userID
    )
    {
    }


    public function verifyPet(): bool
    {
        $isValid = true;

        // si les champs pet_name et pet_type sont vides
        if ($this->petName === '' || $this->petType === '') {
            $isValid = false;
        }

        return $isValid;
    }
}
