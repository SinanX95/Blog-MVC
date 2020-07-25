<?php

// echo phpversion();

require 'vendor/autoload.php';
require 'core/bootstrap.php';

use App\Core\{Router, Request};

Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method());






//$pattern = "/^(blog)\/(\d{4})\/(\d{2})\/(\d{2})\/([a-z0-9-]+)$/";


/*
if(preg_match($pattern, Request::uri(), $matches))
{
    $matches = array_slice($matches, 1);
    var_dump($matches); 

    if($matches[1] > 2020)
    {
        echo "invalid year";
    }
}
*/


// $pattern = "/^blog(\/\d{4}(\/\d{2}(\/\d{2}(\/[a-z0-9-]+)?)?)?)?$/";
// if (preg_match_all($pattern, Request::uri(), $matches, PREG_OFFSET_CAPTURE)) {
//     var_dump($matches);
// }

/*
$pattern = "/^blog(\/\d{4}(\/\d{2}(\/\d{2}(\/[a-z0-9-]+)?)?)?)?$/";
if (preg_match_all($pattern, Request::uri(), $matches, PREG_OFFSET_CAPTURE)) {


    $params = array_map(function ($match, $index) use ($matches) {

        // We have a following parameter: take the substring from the current param position until the next one's position (thank you PREG_OFFSET_CAPTURE)
        if (isset($matches[$index + 1]) && isset($matches[$index + 1][0]) && is_array($matches[$index + 1][0])) {
            return trim(substr($match[0][0], 0, $matches[$index + 1][0][1] - $match[0][1]), '/');
        } // We have no following parameters: return the whole lot

        return isset($match[0][0]) ? trim($match[0][0], '/') : null;
    }, $matches, array_keys($matches));

    var_dump($matches);
    var_dump($params);
}

echo "***************************************************";

$message= trim(Request::uri(), "/");
preg_match('/^blog(\/\d{4}(\/\d{2}(\/\d{2}(\/[a-z0-9-]+)?)?)?)?$/', $message, $matches);
var_dump($matches);
$text = $matches[0];
$text = explode('/', $text);
var_dump($text);
*/


//Router::load('app/routes.php');

/*
$str = "blog/9999/30/30/slug-slug-slug";
$pattern = "/blog\/([0-9]{4})\/([0-9]{2})\/([0-9]{2})\/([a-z0-9-]*)/";
print_r(preg_match($pattern, $str, $matches)); // Outputs 1

print_r($matches);
*/

/*
function getCurrentUri()
{
    $uri = rawurldecode($_SERVER['REQUEST_URI']);

    return $uri;
}

$str = getCurrentUri();

//$str = "blog/9999/30/30/slug-slug-slug";
$pattern = "/blog\/([0-9]{4})\/([0-9]{2})\/([0-9]{2})\/([a-z0-9-]*)$/";
//$pattern = "/[blog\/|blog]{4,5}$/";

if(preg_match($pattern, $str, $matches))
{
    print_r($matches); 
}
*/


/*
Create URL Slug from Post Title

Maybe you can add a strtolower there?

<?php
function create_slug($string){
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   return $slug;
}
echo create_slug('does this thing work or not');
//returns 'does-this-thing-work-or-not'
?>

https://overreacted.io/
https://github.com/Nerdmind/Blog/blob/master/core/include/home.php
https://github.com/chriskonnertz/bbcode/blob/master/src/ChrisKonnertz/BBCode/BBCode.php
https://gist.github.com/afsalrahim/bc8caf497a4b54c5d75d
https://github.com/nikic/FastRoute

* https://stackoverflow.com/questions/28450488/the-advantage-of-using-the-execute-array-versus-the-direct-bind-param-method
* https://github.com/besimgurbuz/cms-with-php
* https://github.com/daveh/php-mvc/tree/master/Core
* https://www.wordfence.com/learn/understanding-php-vulnerabilities/
* https://github.com/colshrapnel/safemysql
* https://www.google.com/search?client=firefox-b-d&sxsrf=ALeKk02DtCaSVej-yAQ8MbrgyM0YCUKs1w%3A1595187389721&ei=vaAUX5DOK62V1fAP5seN4AI&q=bindvalue+with+table+php&oq=bindvalue+ with+table+php&gs_lcp=CgZwc3ktYWIQAzIICCEQFhAdEB46BAgAEEc6BggAEBYQHlCQDFi2EmDwE2gAcAF4AIABngGIAZUDkgEDMC4zmAEAoAEBqgEHZ3dzLXdpesABAQ&sclient=psy-ab&ved=0ahUKEwjQoNuNiNrqAhWtShUIHeZjAywQ4dUDCAs&uact=5
* https://stackoverflow.com/questions/52093670/dynamically-include-header-php-file-that-hold-js-and-css-resources
* https://courses.cs.washington.edu/courses/cse190m/12sp/cheat-sheets/php-regex-cheat-sheet.pdf
* https://stackoverflow.com/questions/1387547/what-is-the-most-scalable-php-based-directory-structure-for-a-large-site
* https://stackoverflow.com/questions/6966052/structure-for-a-mvc-php-application
* https://github.com/php-pds/skeleton
* https://github.com/KnpLabs/php-github-api/blob/2.x/lib/Github/HttpClient/Builder.php
* https://stackoverflow.com/questions/33705976/when-should-i-use-static-methods


* https://github.com/kamranahmedse/design-patterns-for-humans
* https://stackoverflow.com/tags/pdo/info
* https://github.com/colshrapnel/safemysql



https://gist.github.com/mindplay-dk/4254018
https://www.alainschlesser.com/structuring-php-exceptions/

https://old.reddit.com/r/webdev/comments/hwourm/friendly_reminder_that_visually_styling_a_button/
*/
