<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class EditUserController implements IController
{
    private $_db;
    private $_errs;
    
    public function __construct()
    {
        $this->_db = new UserRepository();
        $this->_errs = array();
    }
    
    public function indexAction($params)
    {
        $result = $this->_db->getUsers();
        return new View($result);
    }
    
    public function editAction($params)
    {
        $username = $firstname = $lastname = $email = $adminstr = $password = "";
        $username = $params[0];
        if(isset($_POST['firstname']))
        {
            $firstname = $_POST['firstname'];
        }
        if(isset($_POST['lastname']))
        {
            $lastname = $_POST['lastname'];
        }
        if(isset($_POST['email']))
        {
            $email = $_POST['email'];
        }
        if(isset($_POST['password']))
        {
            $password = $_POST['password'];
        }
        $adminstr = $_POST['admin'];
        if(strcmp($adminstr, "yes") == 0)
        {
            $admin = 1;
        }
        else
        {
            $admin = 0;
        }
        $this->_db->editUser($username, $password, $email, $firstname, $lastname, $admin);
        mvc_redirect("editUser", "index");
    }
    
    public function detailsAction($params)
    {
        //echo "Im here"; //FOR TESTIN
        $username = $firstname = $lastname = $email = '';
        $admin = 0;
        $res = array();

        //check for a page number
        if(!empty($_REQUEST['username']))
        {
            //TODO: convert to integer
            $username = $_REQUEST['username'];
        }
        //$username = $params[0];
        $res = $this->_db->getUsers($username);

        foreach($res as $user):?>
        <div class="alert alert-info alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <form role="form" action="<?php print mvc_build_url("editUser", "edit", $user->username) ?>" method="post">
                <div class="form-group">
                  <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">First Name</span>
                       <input type="text" name="firstname" class="form-control" placeholder="<?php print $user->firstname; ?>" aria-describedby="basic-addon1">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Last Name</span>
                       <input type="text" name="lastname" class="form-control" placeholder="<?php print $user->lastname; ?>" aria-describedby="basic-addon1">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Email</span>
                       <input type="text" name="email" class="form-control" placeholder="<?php print $user->email; ?>" aria-describedby="basic-addon1">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">New Password</span>
                       <input type="password" name="password" class="form-control" placeholder="" aria-describedby="basic-addon1">
                  </div>
                </div>
 
                    <div class="form-group">
                    <div class="input-group">
                        <h3><label class="label label-default">Admin Access:</label></h3>
                 <div class="row">
                  <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <input type="radio" name="admin" value="yes" <?php if($user->admin == 1) print "checked" ?> aria-label="...">
                      </span>
                      <input type="text" class="form-control" aria-label="..." value="Yes">
                    </div><!-- /input-group -->
                  </div><!-- /.col-lg-6 -->
                  <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <input type="radio" name="admin" value="no" <?php if($user->admin != 1) print "checked" ?> aria-label="...">
                      </span>
                      <input type="text" class="form-control" aria-label="..." value="No">
                    </div><!-- /input-group -->
                  </div><!-- /.col-lg-6 -->
                  </div>
                    </div>
                </div><!-- /.row -->
                <h3><input type="submit" value="Submit" class="btn btn-lg btn-default btn-block"></h3>
                </form>
        </div>
        <?php endforeach;
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
        return "EditUser";
    }
}