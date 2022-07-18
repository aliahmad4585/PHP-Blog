<?php

namespace App\Model;

class Comment
{
    public static function addComment($name, $email, $url, $comment, $postId)
    {
        $pdo = Database::getConnection();

        try {

            $created_at = date('Y-m-d H:m:s');
            $updated_at = date('Y-m-d H:m:s');

            $sql = "insert into comments (comments, email, name, url, post_id ,created_at, updated_at) values(:comments, :email, :name, :url, :postId, :created_at, :updated_at)";

            try {
                $handle = $pdo->prepare($sql);
                $params = [
                    ':comments' => $comment,
                    ':email' => $email,
                    ':name' => $name,
                    ':url' => $url,
                    ':postId' => $postId,
                    ':created_at' => $created_at,
                    ':updated_at' => $updated_at
                ];

                $handle->execute($params);

                return [
                    'hasError' => false,
                    'message' => 'comment has been created successfully'
                ];
            } catch (PDOException $e) {

                $message = $e->getMessage();
            }
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }

        return [
            'hasError' => true,
            'message' => $message
        ];
    }
}
