<?php

namespace App\Model;

require('classes/models/connection.php');

class Auth
{

    public static function register($fullName, $email, $password)
    {
        $pdo = Database::getConnection();

        try {
            if (self::checkUserAlreadyExistsOrNot($email)) {
                return "Email already Exists";
            }

            $hashPassword = password_hash($password, PASSWORD_BCRYPT);

            $sql = "insert into users (name, email, `password`) values(:name,:email,:password)";

            try {
                $handle = $pdo->prepare($sql);
                $params = [
                    ':name' => $fullName,
                    ':email' => $email,
                    ':password' => $hashPassword,
                ];

                $handle->execute($params);

                $message = 'User has been created successfully';
            } catch (PDOException $e) {

                return $e->getMessage();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $message;
    }


    private static function checkUserAlreadyExistsOrNot(string $email): bool
    {
        $pdo = Database::getConnection();
        $sql = 'select * from users where email = :email';
        $stmt = $pdo->prepare($sql);
        $p = ['email' => $email];
        $stmt->execute($p);

        if ($stmt->fetchColumn() != 0) {
            return true;
        }

        return false;
    }

    public static function login($email, $password)
    {
        $pdo = Database::getConnection();
        $sql = 'select id, name, email, password from users where email = :email';
        $stmt = $pdo->prepare($sql);
        $p = ['email' => $email];
        $stmt->execute($p);

        $user =  $stmt->fetchAll();

        if (count($user)) {

            $userPassword =  $user[0]['password'];
            if (password_verify($password, $userPassword)) {
                $user[0]['isLoggedIn'] = true;
                return $user[0];
            }
        }

        return [
            'hasError' => true,
            'isLoggedIn' => false,
            'message' => "user not found"
        ];
    }
}
