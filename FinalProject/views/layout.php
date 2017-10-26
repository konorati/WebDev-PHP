<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Blog</title>
    <script type="text/javascript" src="<?php print mvc_build_script_url('jquery.min.js'); ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php print mvc_build_style_url('bootstrap.min.css'); ?>" />  
    <script type="text/javascript" src="<?php print mvc_build_script_url('bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php print mvc_build_script_url('userDetails.js'); ?>"></script>
    
    <style>
        body{
          background: url("<?php print mvc_build_img_url("tree_bark.png"); ?>");
          padding-top: 70px;
              
        }

        .centered-form .panel{
          background: rgba(255, 255, 255, 0.8);
          box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
        }

        .centered-form{
          margin-top: 60px;
        }
    </style>
</head>
<body>
    <h1><?php print $mvc_header; ?></h1>
    <?php print $mvc_body; ?>

</body>
</html>