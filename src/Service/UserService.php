<?php

namespace App\Service;

use App\Entity\User;
use Exception;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserService
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher) {
        $this->passwordHasher = $passwordHasher;
    }

    /**
     * @throws Exception
     */
    public function createUser(
        string $firstname,
        string $lastname,
        string $email,
        string $phone,
        string $password,
        array $roles,
        string $type = User::class
    ): User
    {
        if (!class_exists($type)) {
            throw new Exception("Class $type not found");
        }

        $user = new $type();
        $user->setFirstname($firstname);
        $user->setLastname($lastname);
        $user->setEmail($email);
        $user->setPhone($phone);
        $user->setPassword($this->passwordHasher->hashPassword($user, $password));
        $user->setRoles($roles);

        return $user;
    }
}
