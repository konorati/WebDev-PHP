<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class RegisterController implements IController
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
        $username = $first_name = $last_name = $password = $passwordconfirm = $email = $thumb = "";
        $str = "";
        $params = array();

        //session_unset();
        //Check for post
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            //validate data
            $username = $this->test_input($_POST['username']);
            $first_name = $this->test_input($_POST['first_name']);
            $last_name = $this->test_input($_POST['last_name']);
            $password = $this->test_input($_POST['password']);
            $passwordconfirm = $this->test_input($_POST['password_confirmation']);
            $email = $this->test_input($_POST['email']);
            $thumb = $this->getThumb();
            if(strcmp($password, $passwordconfirm) != 0)
            {
                array_push($this->_errs, "Error: Passwords must match");
            }
            else 
            {
                $exists = $this->_db->userExists($username, "");
                if($exists) //username already exists
                {
                    array_push($this->_errs, "Error: Username already exists");
                    //echo "username exists"; //FOR TESTING
                }
                $exists = $this->_db->userExists("", $email);
                if($exists) //email already exists
                {
                    array_push($this->_errs, "Error: Email already exists");
                    //echo "email exists"; //FOR TESTING
                }
            }
            
            //echo $str;
        }
        if($_SERVER["REQUEST_METHOD"] == "POST" && empty($this->_errs)) //Add user to database and log-in
        {
            //Add user to database
            $this->_db->addUser($username, $password, $email, $first_name, $last_name, $thumb);

            //Set global userid & admin status
            //setcookie("username", $username);
            //setcookie("admin", 0);
            //startSession();
            $_SESSION['username'] = $username;
            $_SESSION['admin'] = 0;
            //$p = array();
            //$p['username'] = $username;
            //$p['admin'] = 0;

            //Redirect to home blog page
            mvc_redirect("home", "index");
        }
        else
        {
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $params['error_type'] = "registration";
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
    
    private function getThumb()
    {
        $str = "http://api.randomuser.me/portraits/thumb/";
        $gender = rand(0,1);
        if($gender == 0) {$gender = "men/";}
        else {$gender = "women/";}
        $str .= $gender;
        $num = rand(1,60);
        $str .= $num . ".jpg";
        return $str;      
    }
    
    public function getName()
    {
        return "Register";
    }
}