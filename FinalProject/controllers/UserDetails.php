<?php

//get database variable
$db = new UserRepository();

$username = $firstname = $lastname = $email = '';
$admin = 0;
$result = array();

//check for a page number
if(!empty($_REQUEST['username']))
{
    //TODO: convert to integer
    $username = $_REQUEST['username'];
    $res = $db->getUsers($username);
}

?>
<?php foreach($res as $user):?>
    <form role="form" action="<?php print mvc_build_url("editUser", "edit") ?>" method="post">
          <div class="form-group">
            <input type="text" name="firstname" class="form-control input-sm" placeholder="<?php print $user->firstname; ?>">
          </div>

          <div class="form-group">
            <input type="text" name="lastname" class="form-control input-sm" placeholder="<?php print $user->lastname; ?>">
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control input-sm" placeholder="<?php print $user->email; ?>">
          </div>
          <div class="form-group">
              <label> Admin:
                <input name="admin" type="radio" value="yes">Yes
                <input type="radio" name="admin" value="no">No
              </label>
          </div>
          <input type="submit" value="Submit" class="btn btn-info btn-block">
        </form>
<?php endforeach; ?>