<?php

namespace App\Class;

session_start();
require('helpers/requestFilterHelper.php');
require('classes/models/auth.php');

use App\Model\Auth;

class AuthClass
{
    public static function login(array $data): array | bool
    {
        $email = filterPostdata($data['email']);
        $password = filterPostdata($data['password']);
        $error = [];

        if (empty($email) || empty($password)) {
            $error['empty'] = "password or email is  empty";
        }

        if (!validateEmail($email)) {
            $error['invalidEmail'] =  "Email address is not Valid";
        }

        if (count($error)) {
            $error['hasError'] = true;
            return $error;
        }

        $data = Auth::login($email, $password);

        if ($data['isLoggedIn']) {
            $_SESSION["id"] = $data['id'];
            $_SESSION["name"] = $data['name'];
            $_SESSION["isLoggedIn"] = $data['isLoggedIn'];
        }
        return $data;
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
