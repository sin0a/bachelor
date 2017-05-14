<?php

/**
 * Class Upload
 *
*/
// include composer autoload
    require 'C:\xampp\vendor\autoload.php';
	// import the Intervention Image Manager Class
    use Intervention\Image\ImageManager as Image;;

    // create an image manager instance with favored driver
    //$manager = new ImageManager(array('driver' => 'imagick'));


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
        $possible_type = array("gif", "png", "jpg","jpeg");
        $ischanged = 0;
        // Hvis filtypen er støttet av intervention, returner ingenting
        if(in_array($ext, $possible_type)){
        
        	$w = $model->getWidth($img);
            // henter høyde
            $h = $model->getHeight($img);
            
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
             if(isset($_POST["pixelerate"])){
                $pixelerate = $_POST["pixelerate"];
                if(strlen($pixelerate) != 0){
                    $model->pixelerate($img,$pixelerate);
                    $id = basename($img);
                }
            }
        	
        	/* TEST OK: brightness*/
            if(isset($_POST["brightness"])){
                $brightness = $_POST["brightness"];
                if(strlen($brightness) != 0){
                    $model->brightness($img,$brightness);
                    $id = basename($img);
                }
            }
            /* TEST OK: Rotate*/
            if(isset($_POST["rotate"])){
                $rotate = $_POST["rotate"];
                if(strlen($rotate) != 0 && $rotate > -366 && $rotate < 366){
                    $model->roter($img,$rotate);
                    $id = basename($img);
                }
            }
        	
        	/* TEST OK:  filter grayscale. */
            if(isset($_POST["greyscale"]) && $_POST["greyscale"] == 1){
                $greyscale = $_POST["greyscale"];
                    $model->greyscale($img);
                    $id = basename($img);
            }
            /* TEST OK:  filter invert. */
            if(isset($_POST["invert"]) && $_POST["invert"] == 1){
                $invert = $_POST["invert"];
                    $model->invert($img);
                    $id = basename($img);
            }

        	/* TEST OK: resize*/
            if(isset($_POST["width"]) && isset($_POST["height"]) && strlen($_POST["width"]) != 0 && strlen($_POST["height"]) != 0){
                $width = $_POST["width"];
                $height = $_POST["height"];
                $auto = "auto";    
                if($height == $auto){
                    $model->resizeWidth($img,$width);
                      // henter bredde
                    $w = $model->getWidth($img);
                    // henter høyde
                    $h = $model->getHeight($img);
                }
                else if($width == $auto){
                    $feil = $model->resizeHeight($img,$height);
                    // henter bredde
                    $w = $model->getWidth($img);
                    echo $feil;
                    // henter høyde
                    $h = $model->getHeight($img);
                }
                else{
                    $model->resize($img,$width,$height);
                      // henter bredde
                    $w = $model->getWidth($img);
                    // henter høyde
                    $h = $model->getHeight($img);
                }       
                
            }

            /* TEST OK: sharpen */
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
                if($_POST["flip"] == "v" || $_POST["flip"] == "h"){
                    $flip = $_POST["flip"];
                    if(strlen($flip) != 0){
                        $model->flip($img,$flip);
                        $id = basename($img);
                    }
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
        }


        /* TEST: crop*/
        //$feil = $model->crop($img,$width,$height,5,5);
        //echo $feil;

    	// load views
        require APP . 'view/header.php';
        require APP . 'view/upload/index.php';
        require APP . 'view/footer.php';
    }
    
}
