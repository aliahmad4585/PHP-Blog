<?php

namespace App\Model;

class Blog
{

    public static function addPost($title, $link, $description, $userId)
    {
        $pdo = Database::getConnection();

        try {

            $created_at = date('Y-m-d H:m:s');
            $updated_at = date('Y-m-d H:m:s');

            $sql = "insert into posts (post_title, post_image_link, post_content, user_id, created_at, updated_at) values(:title, :link, :description, :userId, :created_at, :updated_at)";

            try {
                $handle = $pdo->prepare($sql);
                $params = [
                    ':title' => $title,
                    ':link' => $link,
                    ':description' => $description,
                    ':userId' => $userId,
                    ':created_at' => $created_at,
                    ':updated_at' => $updated_at
                ];

                $handle->execute($params);

                return [
                    'hasError' => false,
                    'message' => 'post has been created successfully'
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

    public static function getPosts($page, $postPerPage)
    {
        try {
            $offset = ($page - 1) * $postPerPage;
            $pdo = Database::getConnection();
            $sql = 'select p.*, u.name from posts p join users u on u.id = p.user_id order by p.created_at desc limit ' . $offset . ', ' . $postPerPage . '';
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $posts =  $stmt->fetchAll();

            return $posts;
        } catch (PDOException $e) {

            $message = $e->getMessage();
        }

        return [
            'hasError' => true,
            'message' => $message
        ];
    }

    public static function getPostDetails($postId)
    {
        try {
            $pdo = Database::getConnection();
            $sql = 'select p.*, u.name from posts p join users u on u.id = p.user_id where p.id = :id';
            $stmt = $pdo->prepare($sql);
            $params = [
                ':id' => $postId,
            ];
            $stmt->execute($params);
            $post =  $stmt->fetchAll();

            if (count($post)) {
                return $post[0];
            }
            $message = "No post found";
        } catch (PDOException $e) {

            $message = $e->getMessage();
        }

        return [
            'hasError' => true,
            'message' => $message
        ];
    }
}
