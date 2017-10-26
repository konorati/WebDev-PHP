<?php

class BlogQuery extends QueryBase
{
    private $_query_base = '
                    SELECT *
                    FROM blog 
                    WHERE 1 ';
    private $_insert_base = '
                    INSERT INTO blog (username, title, content)
                    VALUES( :username, :title, :content);';
    private $_query_where = '';
    private $_query_username_search = '';
    private $_query_id_search = -1;
    private $_insert_title = '';
    private $_insert_content = '';
    

    public function setUserNameSearch($username)
    {
        $this->_query_username_search = $username;
    }
    public function setTitleSearch($title)
    {
        $this->_insert_title = $title;
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
        $insert_params['title'] = $this->_insert_title;
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
        if(strlen($this->_query_username_search) > 0)
        {
            $this->_query_where .= "\n AND username = :username ";
            $query_params['username'] = $this->_query_username_search;
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
}