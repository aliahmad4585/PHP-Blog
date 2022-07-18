<?php

namespace App\Model;

require('classes/models/connection.php');

use App\Class\Model\Database;

class Auth
{

    public static function register($fullName, $email, $password)
    {
        $pdo = Database::getDatabaseConnect();

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
        $pdo = Database::getDatabaseConnect();
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
        $pdo = Database::getDatabaseConnect();
        $sql = 'select count(*) as userCount from users where email = :email  and password= :password';
        $stmt = $pdo->prepare($sql);
        $p = ['email' => $email, 'password' => $password];
        $stmt->execute($p);
        if ($stmt->fetchColumn() != 0) {
            return true;
        }

        return false;
    }
}
