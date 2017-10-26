
<?php

/* 
 * Kristin Greenman
 * CPTS 483
 * HW #3
 */
define('ds', '/');
define('root', dirname(__FILE__));

//print_r($_SERVER);
//$url = $_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"];
$url = $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
//echo $url; //FOR TESTING


$base = "http://".$_SERVER["HTTP_HOST"].rtrim($_SERVER["SCRIPT_NAME"], "index.php");
$baseword = rtrim($_SERVER["SCRIPT_NAME"], "index.php");
$tok = strtok($baseword, "/");

while ($tok !== false) {
    //echo "Word=$tok<br />";
    $string = $tok;
    $tok = strtok("/");
}
define('base', $string);
//echo "base=".base;

//$base="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?');
define('base_path', rtrim($base, '/'));

//define('base_path', "http://".rtrim($base, '/'));

//echo "base_path=".base_path;
//echo "root=".root;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
require_once(root . ds . 'system' . ds . 'HW3.php');


