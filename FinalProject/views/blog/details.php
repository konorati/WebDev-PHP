<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ $ur = new UserRepository();
    $blog = $view_bag[0][0];
    if(key_exists(1, $view_bag))
    {
        $comments = $view_bag[1];
    }
    else
    {
        $comments = array();
    }
?>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php print mvc_build_url("home", "index")?>">Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php print mvc_build_url("blog", "comment", $blog->id)?>">Add Comment</a>
                    </li>
                    <li>
                     <?php if ($_SESSION['admin'] == 1 || strcmp($_SESSION['username'], $blog->username) == 0): ?> 
                      <a href="<?php print mvc_build_url("blog", "deleteBlog", $blog->id );?>">Delete Blog</a> 
                      <?php endif ?>
                    </li>
                    <li>
                        <a href="<?php print mvc_build_url("home", "index", $blog->username)?>">More</a>
                    </li>
                    <li>
                        <a href="<?php print mvc_build_url("login", "index") ?>">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <div class="container">
    <div class="row">
    
    <div class="col-md-12"> 
      
    <div class ="panel">
        <div class ="panel-body">
    <header class="intro-header">
        <div class="container">
            <div class="row">
                <br>
            <div class="col-md-2 col-sm-3 text-center">
                <a class="story-title" href="#"><img alt="" src="<?php print $ur->getPic($blog->username); ?>" style="width:100px;height:100px" class="img-circle"></a>
            </div>
                <div class="col-lg-8  col-md-10 ">
                    <div class="post-heading">
                        <h1><?php print $blog->title; ?></h1>
                        <h2><span class="meta">Posted by <a href=""><?php print $blog->username; ?></a> at <?php print $blog->b_date; ?></span></h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
            <hr>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <?php print $blog->content; ?>
                </div>
            </div>
        </div>
    </article>

        </div></div></div></div></div>
    <div class="container">
    <div class="row">
    
    <div class="col-md-12"> 
      
    <div class ="panel">
        <div class ="panel-body">

        <?php foreach($comments as $com): ?>
                        <br>
         <div class="col-md-2 col-sm-3 text-center">
                <a class="story-title" href="#"><img alt="" src="<?php print $ur->getPic($com->username); ?>" style="width:100px;height:100px" class="img-circle"></a>
        </div>
               <div class="col-md-10 col-sm-9">
                   <?php print $com->content; ?>
              <div class="row">
                <div class="col-xs-9">
                  <h4><span class="label label-default"><?php print $com->username; ?> <?php //print $com->content; ?></span></h4><h4>
                  <small style="font-family:courier,'new courier';" class="text-muted"><?php print $com->bc_date; ?> 
                      <?php if ($_SESSION['admin'] == 1): ?> 
                      • <a href="<?php $arr = array(); $arr[0] = $com->blog_id; $arr[1] = $com->id; print mvc_build_url("blog", "deleteComment", $arr );?>" class="text-muted">Delete Comment</a> 
                      <?php endif ?></small>
                  </h4></div>
                <div class="col-xs-3"></div>
              </div>
                   <hr>
            </div>
     
        <?php endforeach; ?>
            <div><?php print $view_bag['commentView']; ?></div>
        </div></div></div></div></div>
    <hr>

