<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
          <a href="<?php print mvc_build_url("login", "index") ?>">Logout</a>
        </li>
      </ul>
    </div>
  </div>
  </nav>


<script type="text/javascript">
 $(document).ready(function(){
    $.ajax({
            url: "http://api.usatoday.com/open/articles/topnews/news?count=10&days=7&page=0&encoding=json&api_key=qehhtgkv6xvhrz7rfp9u5p32",
            data: {
            },
            dataType: "json",
            success: function(data) {
                    // create an unordered list of headlines
                    
            
                    $.each(data.stories, function() {
                            var ul = "";
                            ul += "<div class='row'> <br> <div class='col-md-2 col-sm-3 text-center'>";
                            ul += "<a class='story-title' href='http://www.usatoday.com'><img alt='' src=" + <?php echo mvc_build_img_url_quotes("usatoday.jpg"); ?> + " style='width:120px;height:100px' class='img'></a></div>";
                            ul += "<div class='col-md-10 col-sm-9'>";
                        
                            ul += "<h3>" + this.title + "</h3>";
                            
                            ul += "<div class='row'><div class='col-xs-9'><h4><span class='label label-default'>" + this.description + "</span></h4>";
                            
                            ul += "<h4><small style='font-family:courier,'new courier';' class='text-muted'>" + this.pubDate + "  •  ";
                            ul += "<a href='" + this.link + "' class='text-muted'> Read More </a></small></h4></div><br><br>";
                            ul += "</div></div><hr>";
                            $('.news').append(ul);
                    });
                    // append this list to the document body
                    
            },
            error: function() {
                     // handle the error
            }
    });
});
</script>

</header>
<div class="container">
  <div class="row">
    
    <div class="col-md-12"> 
      
      <div class="panel">
        <div class="panel-body">
            <div class="news">
            </div>
        </div>
      </div>
    </div>
  </div>
</div>