<?php
    $ur = new UserRepository();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<header>
    
    <script type="text/javascript">
     $(document).ready(function(){
        
        $('.userbutton').click(function(){
            var name = $(this).attr('id');
            //var name = this.id;
            var id = "#details-";
            id += name;
            var url = <?php echo mvc_build_url_quotes("editUser", "details") ?>;
            //var url2 = "http://localhost/HW/Greenman-Final/editUser/details/";
            $(id).load(url , {'username': name});
        });
      });
    </script>
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
          
          <?php foreach ($view_bag as $user): ?>
          <div class="row">    
            <br>
            <div class="col-md-2 col-sm-3 text-center">
                <a class="story-title" href="#"><img alt="" src="<?php print $ur->getPic($user->username); ?>" style="width:100px;height:100px" class="img-circle"></a>
            </div>
            <div class="col-md-10 col-sm-9">
              <h3><?php print $user->username; ?></h3>
              <div class="row">
                  <div class="col-xs-9">
                          <?php print "<div class='details' id='details-".$user->username."'>"?></div>
                   <button class="userbutton btn btn-info" id="<?php print $user->username ?>" >Edit User</button>
                   </div>
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

