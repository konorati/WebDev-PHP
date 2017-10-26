<div class="row centered-form">
  <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Please sign up <small>It's free!</small></h3>
        
      </div>
      <div class="panel-body">
        <form role="form" action="<?php print mvc_build_url("register", "index") ?>" method="post">
            <?php if (key_exists('errorView', $view_bag)) {print $view_bag['errorView'];} ?>
            <div class="form-group">
            <input type="text" name="username" class="form-control input-sm" placeholder="Username" required>
          </div>
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="text" name="first_name" class="form-control input-sm" placeholder="First Name" required>
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="text" name="last_name" class="form-control input-sm" placeholder="Last Name" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <input type="email" name="email" class="form-control input-sm" placeholder="Email Address" required>
          </div>

          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="password" name="password" class="form-control input-sm" placeholder="Password" required>
              </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="password" name="password_confirmation" class="form-control input-sm" placeholder="Confirm Password" required>
              </div>
            </div>
          </div>

          <input type="submit" name="Register" value="Register" class="btn btn-info btn-block">

        </form>
      </div>
    </div>
    <div class="text-center">
      <a href="<?php print mvc_build_url("login", "index");?>">Already have an account? Login</a>
    </div>
  </div>
</div>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

