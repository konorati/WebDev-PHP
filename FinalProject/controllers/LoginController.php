<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class LoginController implements IController
{
    
    private $_db;
    private $_errs;
    
    public function __construct()
    {
        $this->_db = new UserRepository();
        $this->_errs = array();
    }
    
    public function indexAction($params)
    {
        $username = $password = "";
        $str = "";
        $params = array();

        //session_unset();
        //Check for post
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            //validate data
            $username = $this->test_input($_POST['username']);
            $password = $this->test_input($_POST['password']);

            $exists = $this->_db->userExists($username, "");
            if(!$exists) //username doesn't exist
            {
                array_push($this->_errs, "Error: Incorrect username or password");
                //echo "username exists"; //FOR TESTING
            }
            else //Check password
            {
                $exists = $this->_db->checkPassword($username, $password);
                if(!$exists)
                {
                    array_push($this->_errs, "Error: Incorrect username or password");
                }
            }

            //echo $str;
        }
        if($_SERVER["REQUEST_METHOD"] == "POST" && empty($this->_errs)) //Add user to database and log-in
        {
            //Check if user is an admin
            $admin = $this->_db->checkAdmin($username);
            //Set global userid & admin status
            //session_start();
            $_SESSION['username'] = $username;
            $_SESSION['admin'] = $admin;
            //$p = array();
            //$p['username'] = $username;
            //$p['admin'] = $admin;

            //Redirect to home blog page
            mvc_redirect("home", "index");
        }
        else
        {
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $params['error_type'] = "login";
                $params['errors'] = $this->_errs;
                $errView = new View($params);
                $errView->setName("error");
                $str = $errView->setBody();
            }
            $params['errorView'] = $str;
            return new View($params);
        }
    }
    
    private function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    public function getName()
    {
        return "Login";
    }
}