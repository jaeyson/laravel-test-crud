<?php

namespace App\Services;

use Kreait\Firebase\Auth;

class LoginService
{
    /**
    private $email;
    private $password;

    public function setEmail($email): FirebaseService
    {
        $this->email = $email;

        return $this;
    }

    public function setPassword($password): FirebaseService
    {
        $this->password = $password;

        return $this;
    }
    **/

    // public function __construct(Auth $auth): Auth
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    // public function checkName(): SignInResult
    // public function checkName(string $email, string $password)
    public static function checkName(string $email, string $password)
    {
        $this->auth->signInWithEmailAndPassword($email, $password);
    }
}