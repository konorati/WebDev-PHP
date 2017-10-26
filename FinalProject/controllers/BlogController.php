<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class BlogController implements IController
{   
    private $_db;
    private $_cdb;
    
    public function __construct()
    {
        $this->_db = new BlogRepository();
        $this->_cdb = new CommentRepository();
    }
    
    public function indexAction($params)
    {
        return new View($params);
    }
    
    public function detailsAction($params)
    {
        $result = $this->_db->getBlog("", $params[0]);
        $comment = $this->_cdb->getComment($params[0]);
        $bag = array();
        $bag[0] = $result;
        $bag[1] = $comment;
        $bag['commentView'] = "";
        return new View($bag, "details");
    }
    
    public function deleteCommentAction($params)
    {
        $this->_cdb->deleteComment($params[1]);
        mvc_redirect("blog", "details", $params[0]);
    }
    
    public function commentAction($params)
    {
        $str = $content = '';
        if($_SERVER["REQUEST_METHOD"] == "POST") //User has entered a comment
        {
            $content = $this->test_input($_POST['content']);
            $username = $_SESSION['username'];
            $b_id = $params[0];
            if (strlen($content) > 0)
            {
                $this->_cdb->addComment($username, $b_id, $content);
                mvc_redirect("blog", "details", $params[0]);
            }
            else
            {
                $params['commentView'] = $str;
                $result = $this->_db->getBlog("", $params[0]);
                $comment = $this->_cdb->getComment($params[0]);
                $params[0] = $result;
                $params[1] = $comment;
                return new View($params, "details");
            }
        }
        else //Show comment entry form
        {
            $comView = new View($params);
            $comView->setName("comment");
            $str = $comView->setBody();
            $params['commentView'] = $str;
            $result = $this->_db->getBlog("", $params[0]);
            $comment = $this->_cdb->getComment($params[0]);
            $params[0] = $result;
            $params[1] = $comment;
            return new View($params, "details");
        }
    }
    public function getName()
    {
        return "Blog";
    }
    
    private function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}