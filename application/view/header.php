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

    <!-- JS -->
    <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
    <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

    <!-- CSS -->
    <link href="<?php echo URL; ?>css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <!-- navigation -->
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="nav navbar-nav">
         <ul class="nav navbar-nav">
      <li class="<?php echo $home?>"><a href="<?php echo URL; ?>">Hjem</a></li>
      <li class="<?php echo $active?>"><a href="<?php echo URL; ?>api/home">Api</a></li>
    </div>
</div>
</nav>

