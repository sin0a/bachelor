<?php

/**
 * Class Home
 *
*/
class Home extends Controller
{
    
    
    public function index()
    {
        // load views
        require APP . 'view/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/footer.php';
    }
}