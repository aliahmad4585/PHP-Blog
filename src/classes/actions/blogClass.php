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
        return $data;
    }

    public static function getPosts($page = 1, $postPerPage = 20): array
    {
        $error = [];
        if (!is_numeric($page)) {
            $error['page'] = "page number should be numeric";
        }

        if (count($error)) {
            $error['hasError'] = true;
            return $error;
        }

        $data = Blog::getPosts($page, $postPerPage);
        return $data;
    }

    public static function getPostDetails($postId): array
    {
        $error = [];
        if (!is_numeric($postId)) {
            $error['page'] = "post id should be numeric";
        }

        if (count($error)) {
            $error['hasError'] = true;
            return $error;
        }

        $data = Blog::getPostDetails($postId);
        return $data;
    }
}
