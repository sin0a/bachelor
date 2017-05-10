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
    	//sletter filtypen fra en path. image.jpg->image
    	/*$utenExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $id);
    	// legger til full path
    	$imgExt = $model->getPath($utenExt);
    	// lagrer full path til bildet
    	$img = $model->getPath($id);
    	// lagrer filtype
    	$ext = pathinfo($id, PATHINFO_EXTENSION);*/
        $navn = $model->generateRandomString(7);
    	// laster opp bildet på serveren
    	$uploadOk = $model->uploadFile($navn);
        $id = $uploadOk[1];
    	/* sjekker størrelsen
    	$size = $model->getSize();
    	if($size < 50000){
    		$model->backup($img,$imgExt,$ext);
    		$model->resizeWidth($img,750,90);
    		//$model->convert($img,$imgExt,'GIF',5);
    	}*/
    	//test
    	//$gray = $model->greyscaletest($img,$imgExt,$ext);
    	// test pxl
    	//$model->pixelerate($img,8,$imgExt,$ext);
    	//stor test
    	//for($i = 0; $i <= 100; $i++){
    	//$model->brightness($img, $i,$imgExt,$ext,'default');
    	//$model->brightness($gray,$i,$imgExt,$ext,'gray');
    	//}
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
    	// henter bredde og høyde til bildet
    	$height = $model->getHeight($img);
    	$width = $model->getWidth($img);
    	
    	/* TEST OK: konverter*/
    	//$model->convert($img,$imgExt,'png',90);

    	/* TEST OK: kontrast*/
    	//$model->contrast($img,+50);

    	/* TEST OK: pixelerate*/
    	//$model->pixelerate($img,50);
    	
    	/* TEST OK: brightness*/
    	//$model->brightness($img,+50);
    	
    	/* TEST OK:  filter grayscale. */
    	// $model->greyscale($img);

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

        /* TEST OK: blur
        $model->blur($img,50);*/

    	/* TEST ERROR: TIMEOUT
    	$model->opacity($img,50); */

        /* TEST OK: flip */
        //$model->flip($img,h);

        /* TEST OK: gamma */
        //$model->gamma($img,1.2);

        /* TEST OK: invert */
        //$model->invert($img);

        /* TEST: crop*/
        //$feil = $model->crop($img,$width,$height,5,5);
        //echo $feil;

    	// skalering av bildet til vising, hvis bildet erover 500px bred
    	// eller høy, vill denne skalere ned bildet uten å endre det.
    	if($width > 750 || $width < 500){
    		$value = $model->scaleWidth($img,750);
    		$w = $value[0];
    		$h = $value[1];
    	}
    	if($height > 500 ){
    		$value = $model->scaleHeight($img,500);
    		$w = $value[0];
    		$h = $value[1];
    	}
    	// hvis bredde eller høyde ikke er over 500px, vis bildet som det er.
    	else{
    		$w = $width;
    		$h = $height;
    	}
    	
    	// load views
        require APP . 'view/header.php';
        require APP . 'view/upload/index.php';
        require APP . 'view/footer.php';
    }
    
}
