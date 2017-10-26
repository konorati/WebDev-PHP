<?php

class BlogRepository
{
    private $_db;
    
    //Note: only one constructor is allowed
    public function __construct()
    {
        $this->_db = DatabaseFactory::getDefaultPdoObject();
    }
    
    public function getBlog($username = "", $id = -1)
    {
        $query = new BlogQuery();
        $query->setUserNameSearch($username);
        $query->setIdSearch($id);
        return $query->execute();
    }
    
    public function addBlog($username, $title, $content)
    {
        $statement = new BlogQuery();
        $statement->setUserNameSearch($username);
        $statement->setTitleSearch($title);
        $statement->setContentSearch($content);
        
        $statement->executeInsert();
    }
}