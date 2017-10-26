<?php

class UserQuery extends QueryBase
{
    private $_query_base = '
                    SELECT *
                    FROM user 
                    WHERE 1 ';
    private $_insert_base = '
                    INSERT INTO user (username, password, email, firstname, lastname, thumb, admin)
                    VALUES( :username, :password, :email, :firstname, :lastname, :thumb, 0);';
    private $_update_base = ' 
                    UPDATE user
                    SET ';
    private $_query_where = '';
    private $_query_username_search = '';
    private $_query_email_search = '';
    private $_query_password_search = '';
    private $_query_firstname_search = '';
    private $_query_lastname_search = '';
    private $_query_admin_search = 0;
    private $_query_thumb_search = '';
    

    public function setUserNameSearch($username)
    {
        $this->_query_username_search = $username;
    }
    
    public function setEmailSearch($email)
    {
        $this->_query_email_search = $email;
    }
    
    public function setPasswordSearch($password)
    {
        $this->_query_password_search = $password;
    }
    
    public function setfirstnameSearch($firstname)
    {
        $this->_query_firstname_search = $firstname;
    }
    
    public function setlastnameSearch($lastname)
    {
        $this->_query_lastname_search = $lastname;
    }
    
    public function setadminSearch($admin)
    {
        $this->_query_admin_search = $admin;
    }
    
    public function setthumbSearch($thumb)
    {
        $this->_query_thumb_search = $thumb;
    }
    
    public function executeInsert()
    {
        $insert_params = array();
        $insert_params['username'] = $this->_query_username_search;
        $insert_params['email'] = $this->_query_email_search;
        $insert_params['password'] = $this->_query_password_search;
        $insert_params['firstname'] = $this->_query_firstname_search;
        $insert_params['lastname'] = $this->_query_lastname_search;
        $insert_params['thumb'] = $this->_query_thumb_search;

        $sql = $this->_insert_base;
        $statement = $this->db->prepare($sql);
        $statement->execute($insert_params);
    }
    
    public function executeUpdate()
    {
        $update_params = array();
        if(strlen($this->_query_email_search) > 0)
        {
            $this->_update_base .= "email = :email, ";
            $update_params['email'] = $this->_query_email_search;
        }
        if(strlen($this->_query_firstname_search) > 0)
        {
            $this->_update_base .= "firstname = :firstname, ";
            $update_params['firstname'] = $this->_query_firstname_search;
        }
        if(strlen($this->_query_lastname_search) > 0)
        {
            $this->_update_base .= "lastname = :lastname, ";
            $update_params['lastname'] = $this->_query_firstname_search;
        }
        $this->_update_base .= "admin = :admin ";
        $update_params['admin'] = $this->_query_admin_search;
        $this->_update_base .= "\n WHERE username = :username;";
        $update_params['username'] = $this->_query_username_search;
        $sql = $this->_update_base;
        $statement = $this->db->prepare($sql);
        $statement->execute($update_params);
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
        if(strlen($this->_query_email_search) > 0)
        {
            $this->_query_where .= "\n AND email = :email ";
            $query_params['email'] = $this->_query_email_search;
        }
        if(strlen($this->_query_password_search) > 0)
        {
            $this->_query_where .= "\n AND password = :password ";
            $query_params['password'] = $this->_query_password_search ;
        }
        if($this->_query_admin_search == 1)
        {
            $this->_query_where .= "\n AND admin = 1 ";
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