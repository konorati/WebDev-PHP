<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class NewBlogController implements IController
{   
    private $_db;
    
    public function __construct()
    {
        $this->_db = new BlogRepository();
    }
    
    public function indexAction($params)
    {

            return new View($params);
    }
    
    public function newAction($params)
    {
        $content = $title = '';
        //{
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $username = $_SESSION['username'];
            $title = $this->test_input($_POST['title']);
            $content = $this->test_input($_POST['content']);
            
            $this->_db->addBlog($username, $title, $content);
            mvc_redirect("home", "index");
        }
        //}
    }
    
    public function getName()
    {
        return "NewBlog";
    }
    
    private function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}