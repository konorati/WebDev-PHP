

<div class="row centered-form">
  <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Please Login</h3>
      </div>
      <div class="panel-body">
        <form role="form" action="<?php print mvc_build_url("login", "index") ?>" method="post">
                <?php if (key_exists('errorView', $view_bag)) {print $view_bag['errorView'];} ?>
          <div class="form-group">
            <input type="text" name="username" class="form-control input-sm" placeholder="Username">
          </div>

          <div class="form-group">
            <input type="password" name="password" class="form-control input-sm" placeholder="Password">
          </div>

          <div class="checkbox">
            <label>
                <input name="remember" type="checkbox" value="Remember Me"> Remember Me
            </label>
          </div>

          <input type="submit" value="Login" class="btn btn-info btn-block">

        </form>
      </div>
    </div>
    <div class="text-center">
      <a href="<?php print mvc_build_url("register", "index");?>">Don't have an account? Register</a>
    </div>
  </div>
</div>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

