<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class GameController implements IController
{   
    
    public function __construct()
    {
    }
    
    public function indexAction($params)
    {
        return new View($params);
    }
    

    public function getName()
    {
        return "Game";
    }
    
}
