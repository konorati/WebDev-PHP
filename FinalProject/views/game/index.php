<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ ?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
    <script type="text/javascript">

        var myBall = null;
        var myBall2 = null;
        var minX = 0;
        var minY = 0;
        var maxX = 1000;
        var maxY = 500;
        var balls = Array();
        var snows = Array();
        var canvas = null;
        var context = null;
        var cloudImage = new Image();
        var playerCloud = null;
        var multiplier = 1;
        var ground = new Array();
        for(i = 0; i < maxX; i++)
        {
            ground[i] = maxY-10;
        }

        //represents a single star
        function snow(context)
        {
            var self = this;
            self.context = context;
            self.x = 0;
            self.y = 0;
            self.speed = 1;
            self.color = "rgb(255, 255, 255)";
            self.width = 2;

            self.render = function ()
            {
                self.context.fillStyle = self.color;
                self.context.beginPath();
                self.context.arc(self.x, self.y, self.width, 0, Math.PI * 2, true);
                self.context.fill();
            }

            self.move = function ()
            {
                self.y += self.speed;
            }

            self.checkBoundary = function()
            {
                //if(self.y > ground[self.x])
                if(self.y > maxY-5)
                {
                    self.speed = 0;
                    //ground[self.x] = ground[self.x]-1;
                    //self.disable();
                    /*//reset location, size, & speed
                    self.y = 0;
                    self.speed = (Math.floor(Math.random() * 3) + 1) * 1;

                    if(maxX != undefined)
                    {
                        self.x = Math.floor(Math.random() * 200) + 40 + playerCloud.x;
                    }*/
                }
            }
        }

        //represents a cloud
        function playerClouds(context)
        {
            var self = this;
            self.context = context;
            self.x = 0;
            self.y = 0;
            self.width = cloudImage.clientWidth;
            self.height = cloudImage.clientHeight;
            //self.spriteIndex = 0;
            //self.spriteWidth = 66;


            self.render = function()
            {
                self.context.drawImage(cloudImage, self.x, self.y)      //source image
                    
            }
        }

        function makeSnow(context, width, speed, cloud)
        {
            var someSnow = new snow(context);
            someSnow.speed = speed;
            someSnow.width = width;
            someSnow.x = Math.floor(Math.random() * 200) + 40 + cloud.x;
            someSnow.y = Math.floor(Math.random() * 150) + cloud.y + cloud.height + 50;
            return someSnow;
        }

        function beginDraw()
        {
            //TODO: set up any state before main render loop
            
            //add key press event listeners
            window.addEventListener("keypress", keyPressed);
            //document.getElementById("canvas").addEventListener("click", canvasClicked, false);

            cloudImage.src = <?php print mvc_build_img_url_quotes("cloud.jpg") ?>;
            
            canvas = document.getElementById("canvas");
            context = canvas.getContext("2d");

            //set up player ship
            playerCloud = new playerClouds(context);
            //playerCloud.spriteIndex = 8;



            //request repaint
            window.requestAnimationFrame(renderLoop);
        }

        function renderLoop()
        {

            //clear canvas
            context.clearRect(0, 0, maxX, maxY);

            //paint blue
            context.fillStyle = "rgb(135, 206, 250)";
            context.fillRect(0, 0, maxX, maxY);

            //render stars
            for (var i = 0; i < snows.length; i++)
            {
                snows[i].checkBoundary(maxX);
                snows[i].move();
                snows[i].render();
            }

            //render ships
            playerCloud.render();

            //request repaint
            window.requestAnimationFrame(renderLoop);
        }

        function keyPressed(evt)
        {
            if (evt.charCode == 65 || evt.charCode == 97) // 'A' or 'a'
            {
                if(playerCloud.x > 0)
                {
                    playerCloud.x -= 15;
                }
            }
            if(evt.charCode == 68 || evt.charCode == 100)
            {
                if(playerCloud.x + playerCloud.width < maxX)
                {
                    playerCloud.x += 15;
                }   
            }
            if(evt.charCode == 32) //space bar
            {
                            //generate 100 small stars
            for (var i = 0; i < 10 * multiplier; i++)
            {
                var speed = (Math.floor(Math.random() * 4) + 1) * 1;
                var someSnow = makeSnow(context, 2, speed, playerCloud);
                snows.push(someSnow);
            }

            //generate 10 large stars
            for (var i = 0; i < 10 * multiplier; i++) {
                var speed = (Math.floor(Math.random() * 4) + 1) * 1;
                var someSnow = makeSnow(context, 5, speed, playerCloud);
                snows.push(someSnow);
            }
            
                        //generate 10 large stars
            for (var i = 0; i < 10 * multiplier; i++) {
                var speed = (Math.floor(Math.random() * 4) + 1) * 1;
                var someSnow = makeSnow(context, 4, speed, playerCloud);
                snows.push(someSnow);
            }

            //generate 20 medium stars
            for (var i = 0; i < 10 * multiplier; i++) {
                var speed = (Math.floor(Math.random() * 4) + 1) * 1;
                var someSnow = makeSnow(context, 3, speed, playerCloud);
                snows.push(someSnow);
            }
            
                        //generate 20 medium stars
            for (var i = 0; i < 10 * multiplier; i++) {
                var speed = (Math.floor(Math.random() * 4) + 1) * 1;
                var someSnow = makeSnow(context, 6, speed, playerCloud);
                snows.push(someSnow);
            }

            //and 200 tiny stars
            for (var i = 0; i < 10 * multiplier; i++) {
                var speed = (Math.floor(Math.random() * 4) + 1) * 1;
                var someSnow = makeSnow(context, 1, speed, playerCloud);
                snows.push(someSnow);
            }
            }
        }

        /*function canvasClicked(evt)
        {
            //add new ball
            var newBall = new ball(context);
            newBall.x = evt.pageX;
            newBall.y = evt.pageY;
        }*/
        
    </script>
</head>
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
<body onload="beginDraw();">
 <div class="container">
  <div class="row">
    
    <div class="col-md-12"> 
      
      <div class="panel">
        <div class="panel-body">
            
    <canvas id="canvas" width="1000" height="500">
        
    </canvas><div class="row">
        <h4><span class="label label-default">Left -> 'a'   Right -> 'd'  Make it snow!-> space</span></h4></div>
    
        </div></div></div></div></div>
</body>
</html>