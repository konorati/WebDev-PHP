
<header>
  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="<?php print mvc_build_url("home", "index")?>"  class="navbar-brand">Home</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar" role="navigation">
      <ul class="nav navbar-nav">
        <li>
          <a href="<?php print mvc_build_url("home", "myBlog")?>">My Blogs</a>
        </li>
        <li>
          <a href="<?php print mvc_build_url("newBlog", "index")?>">New Blog</a>
        </li>
        <?php if($_SESSION['admin'] == 1): ?>
        <li>
          <a href="<?php print mvc_build_url("editUser", "index")?>">Edit Users</a>
        </li>
        <?php endif; ?>
        <li>
          <a href="<?php print mvc_build_url("news", "index")?>">News</a>
        </li>
        <li>
          <a href="<?php print mvc_build_url("game", "index")?>">Snow</a>
        </li>
        <li>
          <a href="<?php print mvc_build_url("login", "index") ?>">Logout</a>
        </li>
      </ul>
    </div>
  </div>
  </nav>
</header>


<div class="container">
  <div class="row">
    
    <div class="col-md-12"> 
      
      <div class="panel">
          <div class="panel-body">
              
            <form role="form" action="<?php print mvc_build_url("newBlog", "new", $view_bag[0]) ?>" method="post">
               <div class="form-group">
                <input type="text" name="title" class="form-control input-lg" placeholder="Title">
               </div>
              <div class="form-group">
                  <textarea name="content" class="form-control input-lg" rows=10 placeholder="Blog Content"></textarea>
              </div>
              <input type="submit" value="Submit" class="btn btn-info btn-block">
            </form>
         </div>
      </div>                                                
    </div><!--/col-12-->
  </div>
</div>
                                                
                                                                                
<hr>   
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */