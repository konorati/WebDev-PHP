<?php

class CommentRepository
{
    private $_db;
    
    //Note: only one constructor is allowed
    public function __construct()
    {
        $this->_db = DatabaseFactory::getDefaultPdoObject();
    }
    
    public function getComment($blogId = -1, $commentId = -1)
    {
        $query = new CommentQuery();
        $query->setBlogIdSearch($blogId);
        $query->setIdSearch($commentId);
        return $query->execute();
    }
    
    public function addComment($username, $blogId, $content)
    {
        $statement = new CommentQuery();
        $statement->setUserNameSearch($username);
        $statement->setBlogIdSearch($blogId);
        $statement->setContentSearch($content);
        
        $statement->executeInsert();
    }
    
    public function deleteComment($commentId)
    {
        $statement = new CommentQuery();
        $statement->setIdSearch($commentId);
        $statement->executeDelete();
    }
}