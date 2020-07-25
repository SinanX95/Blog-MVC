<?php

namespace App\Controllers;

use App\Core\{App, Helpers};

class BlogController
{
    public function home()
    {
        $posts = App::get('database')->selectAllFromTable('posts'); // get all posts from db
        $title = "Home Page"; // I should get the title from db instead of writing it statically

        $params = array("posts" => $posts,
                        "title" => $title);

        return Helpers::view('index', $params); // return $posts array with related view file
    }

    public function archive($uri)
    {
        parse_str($uri, $uriParams); // convert associative string back to array
        array_splice($uriParams, 0, 1); // remove first element from the array
        $posts = App::get('database')->selectPostsByDate($uriParams); // get posts by date from db
        $title = implode("/", $uriParams);

        $params = array("posts" => $posts,
                        "title"  => $title);

        return Helpers::view('archive', $params); // return $posts array with related view file
    }

    public function single($uri)
    {
        parse_str($uri, $uriParams); // convert associative string back to array
        array_splice($uriParams, 0, 1); // remove first element from the array
        $post = App::get('database')->selectPost($uriParams); // get posts by date from db

        $params = array("post" => $post);

        return Helpers::view('single', $params); // return $posts array with related view file
    }
}