<?php

namespace App\Class;

require('helpers/requestFilterHelper.php');
require('../models/auth.php');

use App\Model\Auth;

class AuthClass
{
    public static function login(array $data): bool
    {
        $email = filterPostdata($_POST['email']);
        $password = filterPostdata($_POST['password']);

        if (empty($email) || empty($password)) {
            return "required filed should not be empty";
        }

        if (!validateEmail($email)) {
            return "Email address is not Valid";
        }

        echo Auth::login($email, $password);
    }
}
