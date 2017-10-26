<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class NewsController implements IController
{
    
    
    public function __construct()
    {
    }
    
    public function indexAction($params)
    {
        return new View($params);
    }
    
    private function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    public function getName()
    {
        return "News";
    }
}
