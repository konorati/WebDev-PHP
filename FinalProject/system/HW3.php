<?php

/* 
 * Kristin Greenman
 * CPTS 483
 * HW #3
 */
mvc_hook();
function uri_string($params)
{
    $string = "";
    if(empty($params)) { return $string; }
    if(is_array($params))
    {
        foreach ($params as $key => $value)
        {
            $string .= $value . ds;
        }
    }
    if(!is_array($params) && !empty($params))
    {
        $string .= $params;
    }
    return $string;
}
function mvc_build_url($controller, $action, $params = array())
{
    $url = base_path . ds . $controller . ds . $action . ds . uri_string($params);
    return $url;
}

function mvc_build_url_quotes($controller, $action, $params = array())
{
    $url = '"' . base_path . ds . $controller . ds . $action . ds . uri_string($params) . '"';
    return $url;
}

function mvc_build_style_url($css)
{
    $url = base_path . ds . "public" . ds . "css" . ds . $css;
    //echo "StyleURl=" . $url; //FOR TESTING
    return $url;
}

function mvc_build_script_url($script)
{
    $url = base_path . ds . "public" . ds . "js" . ds . $script;
    //echo "ScriptURL=" . $url; //FOR TESTING
    return $url;
}

function mvc_build_helper_url($php)
{
    $url = base_path . ds . "controllers" . ds . $php;
    return $url;
}

function mvc_build_img_url($script)
{
    $url = base_path . ds . "public" . ds . "img" . ds . $script;
    //echo "ScriptURL=" . $url; //FOR TESTING
    return $url;
}
function mvc_build_img_url_quotes($script)
{
    $url = '"' . base_path . ds . "public" . ds . "img" . ds . $script . '"';
    //echo "ScriptURL=" . $url; //FOR TESTING
    return $url;
}

function mvc_redirect($controller, $action, $params = array())
{ 
    $controller = ucwords($controller) . "Controller"; //uppercase first letter in the controller name (just in case)
    //echo "Controller=" . $controller; //FOR TESTING
    
    $action = strtolower($action) . "Action";
    //echo "Action=" . $action; //FOR TESTING
    
    if(!is_array($params) && !empty($params))
    {
        $p = $params;
        $params = array();
        $params[0] = $p;
    }
    
    if(class_exists($controller, true))
    {
        //echo "Class exists! = ".$controller; //FOR TESTING
        $some_class = new $controller;
        $some_view = $some_class->$action($params);
        if($some_view != NULL)
        {
            $some_view->setName(strtolower($some_class->getName()));
            $some_view->setBody();
            $some_view->render();
        }
    }
}

function mvc_hook()
{
    global $url;
    $isNull = 1;
    $urlArray = array();
    $urlArray = explode("/", $url); //Separate url up into pieces
    while($isNull && $urlArray[0] != base) { $isNull = array_shift($urlArray); } //Get rid of everything before the controller
    while($isNull && $urlArray[0] == base) { $isNull = array_shift($urlArray); } //Get rid of everything before the controller
    if($isNull && key_exists(0, $urlArray) ) //If a controller is given
    {
        if($urlArray[0] ==  "") { $controller = "register";}
        else {$controller = $urlArray[0];}
        $isNull = array_shift($urlArray);
    }
    else {
        $controller = "register";
        $isNull = array_shift($urlArray);
    }
    //echo "Controller=" . $controller;
    if($isNull && key_exists(0, $urlArray)) //If an action exists set it
    {
        $action = $urlArray[0];
        $isNull = array_shift($urlArray);
    }
    else {
        $action = "index";
    }
    //echo "Action=" . $action; //FOR TESTING
    
    if($isNull)
    {
        $params = $urlArray;
        //echo "Params=" . $params[0]; //FOR TESTING
    }
    else { $params = array(); }
    
    mvc_redirect($controller, $action, $params);
}
    
function __autoload($classname)
{
    //echo "Trying to autoload from " . root . ds . "controllers" . ds . $classname; //FOR TESTING
    if(file_exists($filename = root . ds . "controllers" . ds . $classname . ".php"))
    {
        require_once($filename);
    }
    else if(file_exists($filename = root .ds . "models" . ds .$classname . ".php"))
    {
        require_once($filename);
    }
    else if(file_exists($filename = root .ds . "models" . ds . "queries" . ds . $classname . ".php"))
    {
        require_once($filename);
    }
    else if(file_exists($filename = root . ds . "system" . ds . $classname . ".php"))
    {
        require_once($filename);
    }
}

/*function unregisterGlobals() {
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                    unset($GLOBALS[$key]);
                }
            }
        }
    }
}*/

//unregisterGlobals();
