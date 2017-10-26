<?php

class CommentQuery extends QueryBase
{
    private $_query_base = '
                    SELECT *
                    FROM blogcomment 
                    WHERE 1 ';
    private $_insert_base = '
                    INSERT INTO blogcomment (username, blog_id, content)
                    VALUES( :username, :blogId, :content);';
    private $_delete_base = '
                    DELETE FROM blogcomment
                    WHERE id = :id';
    private $_query_where = '';
    private $_query_username_search = '';
    private $_query_blogId_search = -1;
    private $_query_id_search = -1;
    private $_insert_content = '';
    

    public function setUserNameSearch($username)
    {
        $this->_query_username_search = $username;
    }
    public function setBlogIdSearch($blogId)
    {
        $this->_query_blogId_search = $blogId;
    }
    public function setContentSearch($content)
    {
        $this->_insert_content = $content;
    }
    
    public function setIdSearch($id)
    {
        $this->_query_id_search = $id;
    }
    
    public function executeInsert()
    {
        $insert_params = array();
        $insert_params['username'] = $this->_query_username_search;
        $insert_params['blogId'] = $this->_query_blogId_search;
        $insert_params['content'] = $this->_insert_content;

        $sql = $this->_insert_base;
        $statement = $this->db->prepare($sql);
        $statement->execute($insert_params);
    }
    /**
     * @desc executes the query, returns a list of movies
     * @return array
     */
    public function execute()
    {
        
        //figure out what query parameters we need to send to the DB
        $query_params = array();
        if($this->_query_blogId_search >= 0)
        {
            $this->_query_where .= "\n AND blog_id = :blogId ";
            $query_params['blogId'] = $this->_query_blogId_search;
        }
        
        if($this->_query_id_search >= 0)
        {
            $this->_query_where .= "\n AND id = :id ";
            $query_params['id'] = $this->_query_id_search;
        }
        
        //Build the complete query
        $sql = $this->_query_base
                . $this->_query_where;
        
        //send the statement to the DB
        $statement = $this->db->prepare($sql);
        $statement->execute($query_params);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        
        //convert results to array of objects and return
        $result = array();
        while($row = $statement->fetch())
        {
            $result[] = $row;
        }
        return $result;
    }
    
    function executeDelete()
    {
        $deleteParams = array();
        $deleteParams['id'] = $this->_query_id_search;
        $sql = $this->_delete_base;
        $statement = $this->db->prepare($sql);
        $statement->execute($deleteParams);
    }
}