<?php

/**
 * Class Upload
 *
*/
// include composer autoload
    require 'C:\xampp\vendor\autoload.php';
	// import the Intervention Image Manager Class
    use Intervention\Image\ImageManager;

    // create an image manager instance with favored driver
    $manager = new ImageManager(array('driver' => 'imagick'));


class Upload extends Controller
{
    
    
    public function index(){
    	// laster inn header.php
    	require APP . 'view/header.php';
    	// image_model.php
    	$model = $this->loadModel('image');
    	// genererer et tilfeldig navn til bilde
        $navn = $model->generateRandomString(7);
    	// laster opp bildet på serveren
    	$uploadOk = $model->uploadFile($navn);
        // filnavn
        $id = $uploadOk[1];
        // full path
        $img = $model->getPath($id);
        // lagrer filtype
        $ext = pathinfo($id, PATHINFO_EXTENSION);
        // fil uten filtype
        $utenExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $img);
        // backup
        $model->backup($img,$utenExt,$ext);
    	// sjekker at opplastningen gikk greit
    	if ($uploadOk[0] == 1){
    		// sender bruker videre til /image/"bildenavn"
    		header('Location: ' .URL_PROTOCOL.URL_DOMAIN.'/upload/image/'.$id);
			exit();

    	}
    	else {
    		require APP . 'view/upload/problem.php';
        	require APP . 'view/footer.php';
        }
    	
    }
    public function url(){
        // image_model.php
        $model = $this->loadmodel('image');
        // api_model.php
        $api = $this->loadmodel('api');
        // Laster opp bildet på serveren
        $img = $api->uploadFromUrl($_POST['urlToUpload']);
        $id = $model->getID($img);
        header('Location: ' .URL_PROTOCOL.URL_DOMAIN.'/upload/image/'.$id);
        exit();
    }
    public function image($id){
    	// laster inn image_model.php
    	$model = $this->loadModel('image');
    	// lagrer full path til bildet
    	$img = $model->getPath($id);
    	// lagrer filtype
    	$ext = pathinfo($id, PATHINFO_EXTENSION);
    	// lagrer bildenavn
    	$utenExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $id);
        // 
    	$imgExt = $model->getPath($utenExt);
        $navn = basename($utenExt);
        // henter bredde
    	$w = $model->getWidth($img);
        // henter høyde
        $h = $model->getHeight($img);
        // Variabel til zoom funksjon
        if($w > $h){
            $zoom = $w/4 + $w;
            $value = $model->scaleHeight($img,$zoom);
            $w1 = $value[0];
            $h1 = $value[1];  
        }
        else if($h > $w){
          $zoom = $h/2 + $h;
          $value = $model->scaleWidth($img,$zoom);
          $w1 = $value[0];
          $h1 = $value[1];
        }
        else{
          $zoom = $h/2 + $h;
          $value = $model->scaleWidth($img,$zoom);
          $w1 = $value[0];
          $h1 = $value[1]; 
        }
        
    	/* TEST OK: konverter*/
          if(isset($_POST["encode"])){
            // Henter verdi fra form
            $encode = $_POST["encode"];
            // legger til full path på navn
            $name = $model->getPath($navn);
            // Sjekker om verdien fra formen er tom
            if(strlen($encode) != 0){
                // konverterer
                $result = $model->encode($img,$name,$_POST["format"],$encode);
                // laster inn bilde på nytt
                $id = basename($utenExt).'.'.$_POST["format"];
                // redirecter til riktig side
                header('Location: ' .URL_PROTOCOL.URL_DOMAIN.'/upload/image/'.$id);
                exit();
            }
        }

    	/* TEST OK: kontrast*/
        if(isset($_POST["contrast"])){
            $contrast = $_POST["contrast"];
            if(strlen($contrast) != 0){
                $model->contrast($img,$contrast);
                $id = basename($img);
            }
        }
        /* Fit */
        if(isset($_POST["fitb"]) && isset($_POST["fith"])){
            $fitb = $_POST["fitb"];
            $fith = $_POST["fith"];
            if(strlen($fitb) != 0 && strlen($fith) != 0){
                $model->fit($img,$fitb,$fith);
                $id = basename($img);
            }
        }

    	/* TEST OK: pixelerate*/
    	//$model->pixelerate($img,50);
    	
    	/* TEST OK: brightness*/
    	//$model->brightness($img,+50);
    	
    	/* TEST OK:  filter grayscale. */
        if(isset($_POST["greyscale"])){
            $greyscale = $_POST["greyscale"];
                $model->greyscale($img);
                $id = basename($img);
        }

    	/* TEST OK: crop
    	$model->crop($img,100,100,25,25);
    	//sett ny skalering etter utskjæring
    	$w = 100;
    	$h = 100;*/

    	/* TEST OK: resize
    	$model->resize($img,250,250);*/

    	/* TEST OK: resizeHeight og width
    	$model->resizeWidth($img,500);

    	$model->resizeHeight($img,500);*/

        /* TEST OK: sharpen
        $model->sharpen($img,70);*/
        if(isset($_POST["sharpen"])){
            $sharpen = $_POST["sharpen"];
            if(strlen($sharpen) != 0){
                $model->sharpen($img,$sharpen);
                $id = basename($img);
            }
        }

        /* Blur */
        if(isset($_POST["blur"])){
            $blur = $_POST["blur"];
            if(strlen($blur) != 0){
                $model->blur($img,$blur);
                $id = basename($img);
            }
        }

    	/* TEST ERROR: TIMEOUT
    	$model->opacity($img,50); */

        /* TEST OK: flip */
        if(isset($_POST["flip"])){
            $flip = $_POST["flip"];
            if(strlen($flip) != 0){
                $model->flip($img,$flip);
                $id = basename($img);
            }
        }

        /* TEST OK: gamma */
        if(isset($_POST["gamma"])){
            $gamma = $_POST["gamma"];
            if(strlen($gamma) != 0){
                $model->gamma($img,$gamma);
                $id = basename($img);
            }
        }
        //$model->gamma($img,1.2);

        /* TEST OK: invert */
        //$model->invert($img);

        /* TEST: crop*/
        //$feil = $model->crop($img,$width,$height,5,5);
        //echo $feil;

    	// skalering av bildet til vising, hvis bildet erover 500px bred
    	// eller høy, vill denne skalere ned bildet uten å endre det.
    	if($w > 1200 || $w < 500){
    		$value = $model->scaleWidth($img,1000);
    		$w = $value[0];
    		$h = $value[1];
    	}
    	if($h > 900 ){
    		$value = $model->scaleHeight($img,900);
    		$w = $value[0];
    		$h = $value[1];
    	}
    	// hvis bredde eller høyde ikke er over 500px, vis bildet som det er.
    	else{
    		$w = $w;
    		$h = $h;
    	}
    	// load views
        require APP . 'view/header.php';
        require APP . 'view/upload/index.php';
        require APP . 'view/footer.php';
    }
    
}
