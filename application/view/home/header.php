<?php 
        $nav = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        if (strpos($nav,'api') !== false) {
            $active= "active";
        } 
        else {
            $active = "#";
        }
        if(strpos($nav,'api') == false)
            $home="active";
        else
            $home="#";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link href="<?php echo URL; ?>css/bootstrap.css" rel="stylesheet">
    <style>
        .navbar-default .navbar-nav > .active > a,
        .navbar-default .navbar-nav > .active > a:hover,
        .navbar-default .navbar-nav > .active > a:focus {
            color: #555;
        }
        input[type="text"]{   
            -webkit-transition: width 1s ease;  
            -moz-transition: width 1s ease;  
            -o-transition: width 1s ease;  
            -ms-transition: width 1s ease;  
            transition: width 1s ease;  
            width: 100px;
        }  

        input[type="text"]:focus, textarea:focus {  
            width: 160px;  
        }
    </style>
</head>
<body>
    <!-- navigation -->
    <nav class="navbar navbar-default" style=" background-color: #000000; border-style: none; border-radius: 0px;">
  <div class="container-fluid">
    <div class="nav navbar-nav" style="border-style: none;">
         <ul class="nav navbar-nav">
      <li class="<?php echo $home?>"><a style="color: #ffffff" href="<?php echo URL; ?>">Hjem</a></li>
      <li class="<?php echo $active?>"><a style="color: #ffffff" href="<?php echo URL; ?>api/home">Api</a></li>
    </div>
</div>
</nav>

