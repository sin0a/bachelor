<?php

/**
 * Class Home
 *
*/
class Reset extends Controller
{
    
    
    public function index()
    {
    	$model = $this->loadModel('image');
    	if (isset($_GET["id"])) {
    		// ID
    		$id = $_GET["id"];
    		// Filtype
    		$ext = pathinfo($id, PATHINFO_EXTENSION);
    		// Bare filnavn: 12345
    		$utenExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $id);
    		// Full path: PATH/12345backup.EXT
    		$backup = $model->getPath($utenExt.'backup.'.$ext);
    		// Path: PATH/12345
    		$path = $model->getPath($utenExt);
    		// rewrite
    		$model->rewrite($backup,$ext,$path);
    		// Sender bruker tilbake
    		header('Location: ' .URL_PROTOCOL.URL_DOMAIN.'/upload/image/'.$id);
        	exit();
        }
    }
}
