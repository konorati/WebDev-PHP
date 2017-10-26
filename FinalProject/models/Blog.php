<?php

class Blog
{
    public $username;
    public $title;
    public $content;
    public $b_date;
    public $admin;
    public $thumb;
    
    public function __construct() 
    {
        $this->username = "";
        $this->title = "";
        $this->content = "";
        $this->b_date = "";
        $this->admin = "";
        $this->thumb = "";
    }
}
