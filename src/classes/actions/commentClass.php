<?php

namespace App\Class;

require('classes/models/comment.php');

use App\Model\Comment;

class CommentClass
{

    public static function addComment(array $data): array | bool
    {
        $name = filterPostdata($data['name']);
        $email = filterPostdata($data['email']);
        $url = filterPostdata($data['url']);
        $comment = filterPostdata($data['comment']);
        $postId = filterPostdata($data['postId']);
        $error = [];

        if (!$postId) {
            $error['userId'] = "user Id is not set";
        }

        if (empty($name) || empty($email) ||  empty($url) || empty($comment)) {
            $error['empty'] = "required values must be filled";
        }

        if (strlen($name) > 50) {
            $error['nameLength'] =  "name must be less than 50 characters";
        }
        if (strlen($email) > 100) {
            $error['emailLength'] =  "email must be less than 255 characters";
        }
        if (strlen($url) > 255) {
            $error['emailLength'] =  "url must be less than 255 characters";
        }


        if (count($error)) {
            $error['hasError'] = true;
            return $error;
        }

        $data = Comment::addComment($name, $email, $url, $comment, $postId);

        print_r($data);
        return $data;
    }
}
