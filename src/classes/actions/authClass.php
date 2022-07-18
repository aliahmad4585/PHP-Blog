<?php

namespace App\Class;

require('helpers/requestFilterHelper.php');
require('classes/models/auth.php');

use App\Model\Auth;

class AuthClass
{
    public static function login(array $data): bool
    {
        $email = filterPostdata($_POST['email']);
        $password = filterPostdata($_POST['password']);

        if (empty($email) || empty($password)) {
            echo "password or email is  empty";
        }

        if (!validateEmail($email)) {
            echo "Email address is not Valid";
        }

        return  Auth::login($email, $password);
    }

    public static function register(array $data): string
    {

        $fullName = filterPostdata($data['fullName']);
        $email = filterPostdata($data['email']);
        $password = filterPostdata($data['password']);
        $confirmPassword = filterPostdata($data['confirmPassword']);

        if (empty($fullName) || empty($email) || empty($password)) {
            return "required filed should not be empty";
        }

        if (!validateEmail($email)) {
            return "Email address is not Valid";
        }

        if ($password !== $confirmPassword) {
            return "Password confirm password should be match";
        }

       $message =  Auth::register($fullName, $email, $password);

        return $message;
    }
}
