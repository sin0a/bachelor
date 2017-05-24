<?php

/**
 * Klasse upload
 *
*/
// include composer autoload
    require '/var/www/bachelor/vendor/autoload.php';

	// import the Intervention Image Manager Class
    use Intervention\Image\ImageManager;

    // create an image manager instance with favored driver
    $manager = new ImageManager(array('driver' => 'imagick'));



class Api extends Controller{

    public function index(){
        $model = $this->loadmodel('image');
        $api = $this->loadmodel('api');
        $feil = 0;

        // Henter bilde fra "path"
        if (isset($_GET["path"])) {
            // Laster opp bilde på serveren med uploadFromUrl() og setter den til $new
            $new = $api->uploadFromUrl($_GET["path"]);
            $utenExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $new);
            $navn = basename($utenExt);
            $type = pathinfo($new, PATHINFO_EXTENSION);
            $checked = $model->checkformat($new,$type,$utenExt);
            $new = $checked[0];
            $ischanged = $checked[1];
            // Sjekker alle mulige parametere i URL

            // juster brightness
            if(isset($_GET["brightness"])){
                if($_GET["brightness"] > -101 && $_GET["brightness"] < 101){
                    $api->brightness($new,$_GET["brightness"]);
                } else{
                    echo "Lysstyrke trenger en verdi som er mellom -100 og +100: brightness=verdi<br>";
                    $feil = 1;
                }
            }
     
            // juster kontrast
            if(isset($_GET["contrast"]))
                if($_GET["contrast"] > -101 && $_GET["contrast"] < 101){
                    $api->contrast($new,$_GET["contrast"]);
                } else{
                    echo "Kontrast trenger en verdi som er mellom -100 og +100: contrast=verdi<br>";
                    $feil = 1;
                }
            
            // resize
            if(isset($_GET["resize"])){
                $resize = $_GET["resize"];
                $res = explode(",", $resize);
                if(is_numeric($res[0]) && is_numeric($res[1])){
                    $model->resize($new,$res[0],$res[1]);
                }
                else if(is_numeric($res[0]) && $res[1] == "auto"){
                    $model->resizeHeight($new,$res[0]);
                }
                else if(is_numeric($res[1]) && $res[0] == "auto"){
                    $model->resizeWidth($new,$res[1]);
                }       
                else{
                    echo "Resize krever følgende syntax: resize=verdi,verdi eller resize=verdi,auto<br>";
                    $feil = 1;
                }
            }
            // Greyscale
            if(isset($_GET["greyscale"])){
                $model->greyscale($new);
            }
            // roter
            if(isset($_GET["rotate"])){
                if($_GET["rotate"] > -361 && $_GET["rotate"] < 361){
                    $model->roter($new,$_GET["rotate"]);
                } else {
                    echo "Rotate krever følgende syntax: rotate=verdi Verdien representerer grader fra -360 til +360<br>";
                    $feil = 1;
                }
            }
            // Opacity
            if(isset($_GET["opacity"])){
                if($_GET["opacity"] > 0 && $_GET["opacity"] < 101){
                    $model->opacity($new,$_GET["opacity"]);
                } else{
                    echo "Opacity krever en verdi mellom 0 og 100<br>";
                    $feil = 1;
                }
            }

            // Sharpen
            if(isset($_GET["sharpen"])){
                if(is_numeric($_GET["sharpen"]) > 0 && $_GET["sharpen"] < 101){
                    $model->sharpen($new,$_GET["sharpen"]);
                }
            else{
                $feil = 1;
                echo "Sharpen krever en verdi mellom 0 og 100<br>";
                }
            }

            // Blur
            if(isset($_GET["blur"])){
                if(is_numeric($_GET["blur"]) > 0 && $_GET["blur"] < 101){
                    $model->blur($new,$_GET["blur"]);
                } else{
                    echo "Blur krever en verdi mellom 1 og 100<br>";
                    $feil = 1;
                }
            }

            // Flip
            if(isset($_GET["flip"])){

                if($_GET["flip"] == "v" || $_GET["flip"] == "h"){
                    $model->flip($new,$_GET["flip"]);
                }else{
                    $feil = 1;
                    echo "Flip tar bare to verdier: 'v' eller 'h'<br>";
                }
            }
            // Pixelerate
            if(isset($_GET["pxl"])){
                if(is_numeric($_GET["pxl"]) && $_GET["pxl"] < 101){
                    $model->pixelerate($new,$_GET["pxl"]);
                }
                else{
                    echo "Pxl krever en verdi mellom 0 og 100";
                    $feil = 1;
                }
            }
            // Gamma
            if(isset($_GET["gamma"])){
                if(is_numeric($_GET["gamma"]) && $_GET["gamma"] > 0){
                    $model->gamma($new,$_GET["gamma"]);
                }
                else{
                    echo "Gamma må ha en positiv verdi mellom 0.1 og 30.0<br>";
                }
            }

            // Invert
            if(isset($_GET["invert"])){
                $model->invert($new);
            }

            // Save for web
            if(isset($_GET["sfw"])){
                if(is_numeric($_GET["sfw"]) && $_GET["sfw"] > 0 && $_GET["sfw"] < 101)
                    $model->saveweb($new,$_GET["sfw"]);
                else{
                    echo "Save for web krever en verdi mellom 0 og 100<br>";
                    $feil = 1;
                }
            }
            if(isset($_GET["fit"])){
                $fit = $_GET["fit"];
                $res = explode(",", $fit);
                if(is_numeric($res[0]) && is_numeric($res[1]))
                    $model->fit($new,$res[0],$res[1]);
                else{
                    echo "Fit krever en gyldig oppløsning<br>";
                    $feil = 1;
                }
            }
            // konvertering av bilder
            if(isset($_GET["encode"])){
                // Henter array fra url
                $encode = $_GET["encode"];
                // Splitter stringen på , ;
                $split =  explode(",", $encode);
                // Fjerner filtype fra bilde
                $utenExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $new);
                // Henter basenavnet uten filtype
                $navn = $utenExt;
                // Sjekker at kvalitet er et tall mellom 0 og 100
                if(is_numeric($split[1]) && $split[1] > -1 && $split[1] < 101){
                    // Switch statement for hver filtype:
                    switch($split[0]){
                        case 'jpg':
                            $model->encode($new,$navn,'jpg',$split[1]);
                            break;
                        case 'png':
                            $model->encode($new,$navn,'png',$split[1]);
                            echo $navn;
                            break;
                        case 'gif':
                            $model->encode($new,$navn,'gif',$split[1]);
                            $new = $utenExt.'.gif';
                            break;
                        case 'wbmp':
                            $model->encode($new,$navn,'wbmp',$split[1]);
                            $new = $utenExt.'.wbmp';
                            break;
                        case 'xbm':
                            $model->encode($new,$navn,'xbm',$split[1]);
                            $new = $utenExt.'.xbm';
                            break;
                        case 'jpeg':
                            $model->encode($new,$navn,'jpeg',$split[1]);
                            $new = $utenExt.'.jpeg';
                            break;
                        case 'gd':
                            $model->encode($new,$navn,'gd',$split[1]);
                            $new = $utenExt.'.gd';
                            break;
                        case 'gd2':
                            $model->encode($new,$navn,'gd2',$split[1]);
                            $new = $utenExt.'.gd2';
                            break;
                        case 'webp':
                            $model->encode($new,$navn,'webp',$split[1]);
                            $new = $utenExt.'.webp';
                            break;
                        default:
                            echo "Encode krever et gyldig filformat";
                            $feil = 1;
                            break;
                        }    
                }
                else{
                    echo "Encode krever følgenede syntax: encode=format,kvalitet. Eks: encode=jpg,90";
                    $feil = 1;
                }
            } 
            $name = basename($new);
            //echo $name;

           
        }
    	if($feil == 0){
            require APP . 'view/api/index.php';    
        }
        else
            require APP . 'view/api/error.php';
        
    }
    // Alle undersidene til /api/

    public function home(){
        require APP . 'view/header.php';
        require APP . 'view/api/home.php';
        require APP . 'view/footer.php';
    }

    public function blur(){
        $url = 'http:'.URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/blur.php';
        require APP . 'view/footer.php';
    }
    public function encode(){
        $url = 'http:'.URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/encode.php';
        require APP . 'view/footer.php';
    }

    public function resize(){
        $url = 'http:'.URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/resize.php';
        require APP . 'view/footer.php';
    }

    public function brightness(){
        $url = 'http:'.URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/brightness.php';
        require APP . 'view/footer.php';
    }

    public function contrast(){
        $url = 'http:'.URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/contrast.php';
        require APP . 'view/footer.php';
    }
    // legg til
    public function crop(){
        $url = 'http:'.URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/crop.php';
        require APP . 'view/footer.php';
    }

    public function flip(){
        $url = 'http:'.URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/flip.php';
        require APP . 'view/footer.php';
    }

    public function gamma(){
        $url = 'http:'.URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/gamma.php';
        require APP . 'view/footer.php';
    }

    public function greyscale(){
        $url = 'http:'.URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/greyscale.php';
        require APP . 'view/footer.php';
    }

    public function invert(){
        $url = 'http:'.URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/invert.php';
        require APP . 'view/footer.php';
    }

    public function pixelerate(){
        $url = 'http:'.URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/pixelerate.php';
        require APP . 'view/footer.php';
    }

    public function rotate(){
        $url = 'http:'.URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/rotate.php';
        require APP . 'view/footer.php';
    }
    
    public function sharpen(){
        $url = 'http:'.URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/sharpen.php';
        require APP . 'view/footer.php';
    }
    public function sfw(){
        $url = 'http:'.URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/sfw.php';
        require APP . 'view/footer.php';
    }
    public function fit(){
        $url = 'http:'.URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/fit.php';
        require APP . 'view/footer.php';
    }
    public function oppstart(){
        $url = 'http:'.URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/oppstart.php';
        require APP . 'view/footer.php';
    }
     public function lenke(){
        $url = 'http:'.URL."api?";
        require APP . 'view/header.php';
        require APP . 'view/api/lenker.php';
        require APP . 'view/footer.php';
    }
    public function handler(){
        require APP . 'view/header.php';
        require APP . 'view/api/handler.php';
        require APP . 'view/footer.php';
    }
}
    
