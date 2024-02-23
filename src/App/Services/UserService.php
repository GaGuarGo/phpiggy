<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;
use Framework\Exceptions\ValidationException;

class UserService
{

    public function __construct(private Database $db)
    {
    }

    public function isEmailTaken(string $email)
    {
        $emailCount =  $this->db->query("SELECT COUNT(*) FROM users WHERE email = :email", ['email' => $email])->count();
        if ($emailCount > 0) {
            throw new ValidationException(['email' => 'Email Taken!']);
        }
    }


    public function create(array $formData)
    {

        $password =  password_hash(password: $formData['password'], algo: PASSWORD_BCRYPT, options: ['cost' => 12]);

        $this->db->query(
            query: "INSERT INTO users(email,password,age,country,social_media_url) VALUES(:email, :password, :age, :country, :url)",
            params: [
                'email' => $formData['email'],
                'password' => $password,
                'age' => $formData['age'],
                'country' => $formData['country'],
                'url' => $formData['socialMediaURL'],
            ],
        );
    }
}