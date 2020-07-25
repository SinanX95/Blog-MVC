<?php

namespace App\Core;

class Helpers
{
    /**
     * Require a view.
     *
     * @param  string $name
     * @param  array  $data
     */
    public static function view($name, $data = [])
    {
        extract($data);

        return require "app/views/{$name}.view.php";
    }

    /**
     * Redirect to a new page.
     *
     * @param  string $path
     */
    public static function redirect($path)
    {
        header("Location: /{$path}");
    }
}