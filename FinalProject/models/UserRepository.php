<?php

class UserRepository
{
    private $_db;
    
    //Note: only one constructor is allowed
    public function __construct()
    {
        $this->_db = DatabaseFactory::getDefaultPdoObject();
    }
    
    public function getUsers($username = "", $password = "", $email = "")
    {
        $query = new UserQuery();
        $query->setUserNameSearch($username);
        $query->setPasswordSearch($password);
        $query->setEmailSearch($email);
        return $query->execute();
    }
    
    public function userExists($username, $email)
    {
        $result = $this->getUsers($username, "", $email);
        if (empty($result))
        {
            return false;
        }
        return true;
    }
    
    public function checkPassword($username, $password)
    {
        $result = $this->getUsers($username, $password, "");
        if(empty($result))
        {
            return false;
        }
        return true;
    }
    
    public function checkAdmin($username)
    {
        $query = new UserQuery();
        $query->setUserNameSearch($username);
        $query->setadminSearch(1);
        $result = $query->execute();
        
        if(!empty($result))
        {
            return 1;
        }
        return 0;
    }
    
    public function addUser($username, $password, $email, $firstname, $lastname, $thumb)
    {
        $statement = new UserQuery();
        $statement->setUserNameSearch($username);
        $statement->setEmailSearch($email);
        $statement->setPasswordSearch($password);
        $statement->setfirstnameSearch($firstname);
        $statement->setlastnameSearch($lastname);
        $statement->setthumbSearch($thumb);
        
        $statement->executeInsert();
    }
    
    public function editUser($username, $password, $email, $firstname, $lastname, $admin)
    {
        $statement = new UserQuery();
        $statement->setUserNameSearch($username);
        $statement->setEmailSearch($email);
        $statement->setPasswordSearch($password);
        $statement->setfirstnameSearch($firstname);
        $statement->setlastnameSearch($lastname);
        $statement->setadminSearch($admin);
        
        $statement->executeUpdate();
    }
    
    public function getPic($username)
    {
        $query = new UserQuery();
        $query->setUserNameSearch($username);
        $result = $query->execute();
        return $result[0]->thumb;
    }
}