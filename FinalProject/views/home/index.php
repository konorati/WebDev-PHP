<?php 
    $ur = new UserRepository();
?>

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
          
          
          
          <!--/stories-->
          
          <?php foreach ($view_bag as $blog): ?>
          <div class="row">    
            <br>
            <div class="col-md-2 col-sm-3 text-center">
                <a class="story-title" href="#"><img alt="" src="<?php print $ur->getPic($blog->username); ?>" style="width:100px;height:100px" class="img-circle"></a>
            </div>
            <div class="col-md-10 col-sm-9">
              <h3><?php print $blog->title; ?></h3>
              <div class="row">
                <div class="col-xs-9">
                  <h4><span class="label label-default"><?php print substr($blog->content, 0, 50)."..."; ?></span></h4><h4>
                  <small style="font-family:courier,'new courier';" class="text-muted"><?php print $blog->username; ?>  • <?php print $blog->b_date; ?>  • <a href="<?php print mvc_build_url("blog", "details", $blog->id );?>" class="text-muted">Read More</a></small>
                  </h4></div>
                <div class="col-xs-3"></div>
              </div>
              <br><br>
            </div>
          </div>
          <hr>
          <?php endforeach; ?>
          <!--/stories-->         
        </div>
      </div>
                                                                                       
	                                                
                                                      
   	</div><!--/col-12-->
  </div>
</div>
                                                
                                                                                
<hr>
