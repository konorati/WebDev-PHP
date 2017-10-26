<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class HomeController implements IController
{   
    private $_db;
    
    public function __construct()
    {
        $this->_db = new BlogRepository();
    }
    
    public function indexAction($params)
    {
        //echo "SessUser:".$_SESSION['username']; //FOR TESTING
        //echo "SessAdmin:".$_SESSION['admin']; //FOR TESTING
        //if (session_status() == PHP_SESSION_NONE || !isset($_SESSION['admin'])) {
        //    mvc_redirect("login", "index");
        //}
        //else 
        //{
            $uname = "";
            if(!empty($params))
            {
                $uname = $params[0];
            }
            $result = $this->_db->getBlog($uname);
            //$params['admin'] = $_SESSION['admin'];
            //$params['blogs'] = $result;
            return new View($result);
        //}
    }
    
    public function myBlogAction($params)
    {
        //if (session_status() == PHP_SESSION_NONE) {
        //    mvc_redirect("login", "index");
        ///}
        //else
        //{
            $username = $_SESSION['username'];
            $params = $this->_db->getBlog($username);
            return new View($params);
        //}
    }
    
    public function getName()
    {
        return "Home";
    }
}