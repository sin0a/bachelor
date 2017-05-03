<?php

/**
 * Class Upload
 *
*/
// include composer autoload
    require '/../../../../vendor/autoload.php';

	// import the Intervention Image Manager Class
    use Intervention\Image\ImageManager;

    // create an image manager instance with favored driver
    $manager = new ImageManager(array('driver' => 'imagick'));



class Api extends Controller
{

    public function index(){
        $model = $this->loadmodel('image');
        $api = $this->loadmodel('api');
        $possible_url = array("resize", "roter","contrast","brightness","greyscale");
        $returverdi = "En feil oppstod.";
        $int = 0;

        //Sjekk om mottatt request er en GET med riktige action-parametre
        if (isset($_GET["path"])) {
            $new = $api->uploadFromUrl();

            // juster brightness
            if(isset($_GET["brightness"])&& $_GET["brightness"] > -101 && $_GET["brightness"] < 101){
                $api->brightness($new,$_GET["brightness"]);
            }
            else if(isset($_GET["brightness"])&& $_GET["brightness"] < -101 && $_GET["brightness"] > 101)
                echo "Lysstyrke trenger en verdi som er mellom -100 og +100: action=brightness&brightness=verdi";
     
            // juster kontrast
            if(isset($_GET["contrast"])&& $_GET["contrast"] > -101 && $_GET["contrast"] < 101){
                $api->contrast($new,$_GET["contrast"]);
            }
            else if(isset($_GET["contrast"])&& $_GET["contrast"] < -101 && $_GET["contrast"] > 101)
                echo "Kontrast trenger en verdi som er mellom -100 og +100: action=contrast&contrast=verdi";
            
            // resize
            if(isset($_GET["width"])&& isset($_GET["height"])){

             if(is_numeric($_GET["height"]) || is_numeric($_GET["width"])){
                $int = 1;
                
                if($_GET["width"] == "auto"){
                    $model->resizeHeight($new,$_GET["height"],90);
                }
                if($_GET["height"] == "auto"){
                    $model->resizeWidth($new,$_GET["width"],90);
                }
                else if (is_numeric($_GET["height"]) && is_numeric($_GET["width"]))
                    $model->resize($new,$_GET["width"],$_GET["height"]);
            }
            else if($_GET["height"] != "auto" && $_GET["width"] != "auto" && $int == 0 || $_GET["height"] == "auto" && $_GET["width"] == "auto"){
                echo "Resize krever følgende syntax: action=resize&width=bredde&height=høyde, width=bredde&height=auto eller width=auto&height=høyde";
            }}
            // greyscale
            if(isset($_GET["greyscale"])){
                $model->greyscale($new);
            }
            // roter
            if(isset($_GET["rotate"]) && $_GET["rotate"] > -361 && $_GET["rotate"] < 361){
                $model->roter($new,$_GET["rotate"]);
            }
            //else if(isset($_GET["rotate"] > -361 && $_GET["rotate"] < 361) // sjekk senere
                //echo "Rotate krever følgende syntax: rotate=verdi Verdien representerer grader fra -360 til +360";

            // opacity
            if(isset($_GET["opacity"]) && $_GET["opacity"] > -1 && $_GET["opacity"] < 101){
                $model->opacity($new,$_GET["opacity"]);
            }
            else if(isset($_GET["opacity"]) && $_GET["opacity"] > -1 && $_GET["opacity"] > 101){
                echo "Opacity krever en verdi mellom 0 og 100";
            }

            // sharpen
            if(isset($_GET["sharpen"]) && $_GET["sharpen"] > -1 && $_GET["sharpen"] < 101){
                $model->sharpen($new,$_GET["sharpen"]);
            }
            else if(isset($_GET["sharpen"]) && $_GET["sharpen"] < -1 && $_GET["sharpen"] > 101){
                echo "Sharpen krever en verdi mellom 0 og 100";
            }

            // blur
            if(isset($_GET["blur"]) && $_GET["blur"] > -1 && $_GET["blur"] < 101){
                $model->blur($new,$_GET["blur"]);
            }
            else if(isset($_GET["blur"]) && $_GET["blur"] < -1 && $_GET["blur"] > 101){
                echo "Blur krever en verdi mellom 0 og 100";
            }

            // flip
            if(isset($_GET["flip"]) && $_GET["flip"] == "v" || isset($_GET["flip"]) && $_GET["flip"] == "h"){
                $model->flip($new,$_GET["flip"]);
            }
            else if(isset($_GET["flip"]) && $_GET["flip"] != "v" || isset($_GET["flip"]) && $_GET["flip"] != "h"){
                echo "Flip tar bare to verdier: 'v' eller 'h'";
            }
            // pixelerate
            if(isset($_GET["pxl"]) && is_numeric($_GET["pxl"])){
                $model->pixelerate($new,$_GET["pxl"]);
            }

            // gamma
            if(isset($_GET["gamma"]) && is_numeric($_GET["gamma"])){
                $model->gamma($new,$_GET["gamma"]);
            }

            $utenExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $new);
            // lagrer filtype
            $ext = pathinfo($new, PATHINFO_EXTENSION);
            // lagrer filnavn
            $name = basename($new);
            $height = $model->getHeight($new);
            $width = $model->getWidth($new);
            $res = array($height,$width);
            echo $name;

            //$new = $model->saveforweb($new,$utenExt,$res,$name);
        }
    	
    	// load views
        //require APP . 'view/header.php';
        require APP . 'view/api/index.php';
        //require APP . 'view/footer.php';
    }
    public function home(){
        require APP . 'view/header.php';
        require APP . 'view/api/home.php';
        require APP . 'view/footer.php';
    }
    public function blur(){
        $url = "localhost/bachelor/api?";
        require APP . 'view/header.php';
        require APP . 'view/api/blur.php';
        require APP . 'view/footer.php';
    }
    public function resize(){
        $url = "localhost/bachelor/api?";
        require APP . 'view/header.php';
        require APP . 'view/api/resize.php';
        require APP . 'view/footer.php';
    }
    public function brightness(){
        $url = "localhost/bachelor/api?";
        require APP . 'view/header.php';
        require APP . 'view/api/brightness.php';
        require APP . 'view/footer.php';
    }
    public function contrast(){
        $url = "localhost/bachelor/api?";
        require APP . 'view/header.php';
        require APP . 'view/api/contrast.php';
        require APP . 'view/footer.php';
    }
    public function crop(){
        $url = "localhost/bachelor/api?";
        require APP . 'view/header.php';
        require APP . 'view/api/crop.php';
        require APP . 'view/footer.php';
    }
}
    
