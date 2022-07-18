<?php

namespace App\Class;

require('helpers/requestFilterHelper.php');
require('classes/models/auth.php');

use App\Model\Auth;

class AuthClass
{
    public static function login(array $data): array | bool
    {
        $email = filterPostdata($_POST['email']);
        $password = filterPostdata($_POST['password']);
        $error = [];
        $error['hasError'] = false;

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
