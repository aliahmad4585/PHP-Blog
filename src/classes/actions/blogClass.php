<?php

namespace App\Class;

require('classes/models/blog.php');

use App\Model\Blog;

class BlogClass
{
    public static function addPost(array $data): array | bool
    {
        $title = filterPostdata($data['title']);
        $link = filterPostdata($data['link']);
        $description = filterPostdata($data['description']);
        $userId =  $_SESSION['id'] ?? 0;
        $error = [];

        if (!$userId) {
            $error['userId'] = "user Id is not set";
        }

        if (empty($title) || empty($link) ||  empty($description)) {
            $error['empty'] = "required values must be filled";
        }

        if (strlen($title) > 100) {
            $error['titleLength'] =  "title must be less than 100 characters";
        }
        if (strlen($title) > 100) {
            $error['linkLength'] =  "Image link must be less than 255 characters";
        }


        if (count($error)) {
            $error['hasError'] = true;
            return $error;
        }

        $data = Blog::addPost($title, $link, $description, $userId);

        print_r($data);
        return $data;
    }
}
