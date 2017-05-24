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
        require APP . 'view/home/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/footer.php';
    }
    public function error(){
    	$error = "Ugyldig fil/lenke";
    	// load views
        require APP . 'view/home/header.php';
        require APP . 'view/home/error.php';
        require APP . 'view/footer.php';
    }
}
