<?php

/**
 * Klasse upload
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

        // Henter bilde fra "path"
        if (isset($_GET["path"])) {
            // Laster opp bilde på serveren med uploadFromUrl() og setter den til $new
            $new = $api->uploadFromUrl();

            // Sjekker alle mulige parametere i URL

            // juster brightness
            if(isset($_GET["brightness"])){
                if($_GET["brightness"] > -101 && $_GET["brightness"] < 101){
                    $api->brightness($new,$_GET["brightness"]);
                } else
                    echo "Lysstyrke trenger en verdi som er mellom -100 og +100: action=brightness&brightness=verdi";
            }
     
            // juster kontrast
            if(isset($_GET["contrast"]))
                if($_GET["contrast"] > -101 && $_GET["contrast"] < 101){
                    $api->contrast($new,$_GET["contrast"]);
                } else 
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
            else
                echo "Resize krever følgende syntax: action=resize&width=bredde&height=høyde, width=bredde&height=auto eller width=auto&height=høyde";
            }
            // Greyscale
            if(isset($_GET["greyscale"])){
                $model->greyscale($new);
            }
            // roter
            if(isset($_GET["rotate"])){
                if($_GET["rotate"] > -361 && $_GET["rotate"] < 361){
                    $model->roter($new,$_GET["rotate"]);
                } else 
                echo "Rotate krever følgende syntax: rotate=verdi Verdien representerer grader fra -360 til +360";
            }
            // Opacity
            if(isset($_GET["opacity"])){
                if($_GET["opacity"] > -1 && $_GET["opacity"] < 101){
                    $model->opacity($new,$_GET["opacity"]);
                } else
                echo "Opacity krever en verdi mellom 0 og 100";
            }

            // Sharpen
            if(isset($_GET["sharpen"]) && $_GET["sharpen"] > -1 && $_GET["sharpen"] < 101){
                $model->sharpen($new,$_GET["sharpen"]);
            }
            else if(isset($_GET["sharpen"]) && $_GET["sharpen"] < -1 && $_GET["sharpen"] > 101){
                echo "Sharpen krever en verdi mellom 0 og 100";
            }

            // Blur
            if(isset($_GET["blur"])){
                if($_GET["blur"] > -1 && $_GET["blur"] < 101){
                    $model->blur($new,$_GET["blur"]);
                } else
                    echo "Blur krever en verdi mellom 0 og 100";
            }

            // Flip
            if(isset($_GET["flip"])){

                if($_GET["flip"] == "v" || isset($_GET["flip"]) && $_GET["flip"] == "h"){
                    $model->flip($new,$_GET["flip"]);
                }else
                    echo "Flip tar bare to verdier: 'v' eller 'h'";
            }
            // Pixelerate
            if(isset($_GET["pxl"]) && is_numeric($_GET["pxl"])){
                $model->pixelerate($new,$_GET["pxl"]);
            }

            // Gamma
            if(isset($_GET["gamma"])){
                if(is_numeric($_GET["gamma"]) && $_GET["gamma"] > 0){
                    $model->gamma($new,$_GET["gamma"]);
                }else
                echo "Gamma må ha en positiv verdi mellom 0.1 og 30.0";
            }

            // Invert
            if(isset($_GET["invert"])){
                $model->invert($new);
            }

            // Save for web
            if(isset($_GET["sfw"])){
                if(is_numeric($_GET["sfw"]) && $_GET["sfw"] > 0 && $_GET["sfw"] < 101)
                    $model->saveweb($new,$_GET["sfw"]);
                else
                    echo "Save for web krever en verdi mellom 0 og 100";
            }
            if(isset($_GET["fit"])){
                $fit = $_GET["fit"];
                $res = explode(",", $fit);
                if(is_numeric($res[0]) && is_numeric($res[1]))
                    $model->fit($new,$res[0],$res[1]);
                else
                    echo "Fit krever en gyldig oppløsning";
            }   

            $name = basename($new);
            echo $name;

           
        }
    	
        require APP . 'view/api/index.php';
    }
    // Alle undersidene til /api/

    public function home(){
        require APP . 'view/header.php';
        require APP . 'view/api/home.php';
        require APP . 'view/footer.php';
    }

    public function blur(){
        $url = URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/blur.php';
        require APP . 'view/footer.php';
    }

    public function resize(){
        $url = URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/resize.php';
        require APP . 'view/footer.php';
    }

    public function brightness(){
        $url = URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/brightness.php';
        require APP . 'view/footer.php';
    }

    public function contrast(){
        $url = URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/contrast.php';
        require APP . 'view/footer.php';
    }
    // legg til
    public function crop(){
        $url = URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/crop.php';
        require APP . 'view/footer.php';
    }

    public function flip(){
        $url = URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/flip.php';
        require APP . 'view/footer.php';
    }

    public function gamma(){
        $url = URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/gamma.php';
        require APP . 'view/footer.php';
    }

    public function greyscale(){
        $url = URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/greyscale.php';
        require APP . 'view/footer.php';
    }

    public function invert(){
        $url = URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/invert.php';
        require APP . 'view/footer.php';
    }

    public function pixelerate(){
        $url = URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/pixelerate.php';
        require APP . 'view/footer.php';
    }

    public function rotate(){
        $url = URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/rotate.php';
        require APP . 'view/footer.php';
    }
    
    public function sharpen(){
        $url = URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/sharpen.php';
        require APP . 'view/footer.php';
    }
    public function sfw(){
        $url = URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/sfw.php';
        require APP . 'view/footer.php';
    }
    public function fit(){
        $url = URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/fit.php';
        require APP . 'view/footer.php';
    }
}
    
