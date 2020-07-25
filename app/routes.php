<?php

$router->get('/^blog(\/\d{4}(\/\d{2}(\/\d{2}(\/[a-z0-9-]+)?)?)?)?$/', function($uri) {
    $keys = array("controller", "year", "month", "day", "slug");
    $values = explode('/', $uri);
    $temporary = array_intersect_key( $keys, $values );
    $params = array_combine(array_values($temporary), $values);

    $uri = http_build_query($params);

    if (isset($params['slug'])) return "BlogController@single@{$uri}";
    if (isset($params['day'])) return "BlogController@archive@{$uri}";
    if (isset($params['month'])) return "BlogController@archive@{$uri}";
    if (isset($params['year'])) return "BlogController@archive@{$uri}";
    if (isset($params['controller'])) return "BlogController@home";
});

// Custom 404 Handler
$router->set404(function () {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    echo '404, route not found!';
});