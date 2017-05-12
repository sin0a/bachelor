<?php
    // include composer autoload
    require 'C:\xampp\vendor\autoload.php';
    // importerer Intervention Image Manager Class
    use Intervention\Image\ImageManagerStatic as Image;


   
class ImageModel{

    /* konverterer bildet til forskjellige formater
    *FRA: JPG, PNG, GIF, JPEG, XBM, GD, GD2, WEBP
    *TIL: JPG, PNG, GIF, JPEG, XBM, GD, GD2, WEBP
    *FORMAT skrives plain med fnutter. eks. 'png'
    */
    public function encode($id,$filnavn, $filtype, $kvalitet){
        // resultatvariabel til eventuell feilmelding;
        $result = "";
        // Liste over filtyper som er godkjent av image intervention
        $possible_type = array("gif", "png", "jpg","jpeg");
        // Skjekker om formatet er godkjent
        if(in_array($filtype, $possible_type)){
            // Lager bldeinstanse
            $img = Image::make($id);
            // Konverterer bilde til gitt format
            $img->encode($filtype, $kvalitet);
            // Lagrer nytt bilde
            $img->save($filnavn.'.'.$filtype);
        }
        // Hvis filformatet er ikke godkjent av intervention:
        else{
            // sortering etter gitt filtype av brukeren
            switch ($filtype) {
                case 'jpeg':
                    // lager et nytt bildeobjekt av URL til bilde på serveren
                    $im = imagecreatefromstring(file_get_contents($id));
                    // lager en ny fil
                    $new = $filnavn.'.jpeg';
                    // konverterer bilde til jpeg og lager det på ny fil
                    imagejpeg($im, $new);
                    break;
                case 'xbm':
                    $new = $filnavn.'.xbm';
                    imagexbm(imagecreatefromstring(file_get_contents($id)), $new);
                    break;
                case 'wbmp':
                    $new = $filnavn.'.wbmp';
                    imagewbmp(imagecreatefromstring(file_get_contents($id)), $new);
                    break;
                case 'gd':
                    $new = $filnavn.'.gd';
                    imagegd(imagecreatefromstring(file_get_contents($id)), $new);
                    break;
                case 'gd2':
                    $new = $filnavn.'.gd2';
                    imagegd2(imagecreatefromstring(file_get_contents($id)), $new);
                    break;
                case 'webp':
                    $new = $filnavn.'.webp';
                    imagewebp(imagecreatefromstring(file_get_contents($id)), $new);
                    break;
                // hvis filtypen ikke er i switch:
                default:
                    $result = "Formatet er ikke støttet";
                    break;
            }
            
        }
        // returnerer feilmelding
        return $result;   
    }
    // Funksjon som sjekker formatet til filen som blir lastet opp
    // Intervention kan bare håndere PNG, GIF og jpg
    // Denne funkksjonen vil da konverere filen til et godkjent format før prossesering
    public function checkformat($id,$filtype,$filnavn){
        $possible_type = array("gif", "png", "jpg","jpeg");
        $ischanged = 0;
        // Hvis filtypen er støttet av intervention, returner ingenting
        if(in_array($filtype, $possible_type)){
            $new = $id;
        }
        // Hvis ikke
        else {
            $ischanged = 1;
            $new = $filnavn.'.gif';
            // Sjekker om filtypen er støttet, hvis den er støttet blir den midlertidig
            // konvertert til GIF for å utføre videre endringer. Intervention kan bare 
            // utføre operasjoner på GIF, JPG og PNG filer.
            switch($filtype){
                case 'webp':
                    $im = imagecreatefromwebp($id);
                    imagegif($im,$new,100);
                    imagedestroy($im);
                    break;
                case 'jpeg':
                    $im = imagecreatefromjpeg($id);
                    imagegif($im,$new,100);
                    imagedestroy($im);
                    break;
                case 'xbm':
                    $im = imagecreatefromxbm($id);
                    imagegif($im,$new,100);
                    imagedestroy($im);
                    break;
                case 'wbmp':
                    $im = imagecreatefromwbmp($id);
                    imagegif($im,$new,100);
                    imagedestroy($im);
                    break;
                case 'gd':
                    $im = imagecreatefromgd($id);
                    imagegif($im,$new,100);
                    imagedestroy($im);
                    break;
                case 'gd2':
                    $im = imagecreatefromgd2($id);
                    imagegif($im,$new,100);
                    imagedestroy($im);
                    break;
                case 'bmp':
                    $im = imagecreatefromstring(file_get_contents($filnavn.'.bmp'));
                    imagegif($im,$new,100);
                    imagedestroy($im);
                    break;
            }
            
        }
        // returnerer konvertert bilde og om filen har blitt konvertert
        return array($new,$ischanged);
    }
    public function saveforweb($id,$path,$res,$filnavn){
        $img = Image::make($id);
        $width = $res[1];
        $height = $res[0];
        if($height > $width){
            $newres = $height;
            do{
                $newres--;
            }
            while($newres > 750);
            $img->resize($newres, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        else{
            $newres = $width;
            do{
                $newres--;
            }
            while($newres > 750);
            $img->resize(null, $newres, function ($constraint) {
                $constraint->aspectRatio();
            });
        } 
        $img->encode('jpg',70);
        $img->save($path.'.jpg');
        $id = $path.'.jpg';

    }
    public function saveweb($id,$kvalitet){
        $img = Image::make($id);
        $img->encode('jpg',$kvalitet);
        $img->save($id,$kvalitet);

    }
    public function forweb($id,$value){
        $img = Image::make($id);
        $img->encode('jpg',$value);
    }
    public function fit($id,$w,$h){
        $img = Image::make($id);
        $img->fit($w,$h);
        $img->save($id);
    }
    // lager en backup fil til reset funksjon:
    public function backup($id,$path,$ext){
        $img = Image::make($id);
        $img->save($path.'backup.'.$ext);
    }
    public function rewrite($id,$ext,$path){
         $img = Image::make($id);
         $img->save($path.'.'.$ext);
    }
    public function greyscaletest($id,$path,$ext){
         $img = Image::make($id);
         $img->backup($id);
         $img->greyscale();
         $img->save($path.'grey.'.$ext,60);
         $img->reset($id);
         return $path.'grey.'.$ext;
    }
    // justerer lysstyrke på bildet.
    public function brightness($id, $value, $path, $ext,$name){
        $img = Image::make($id);
        $img->backup($id);
        //-100 er MIN +100 er MAX
        $img->brightness($value);
        $img->save($path.$name.$value.'.'.$ext,60);
        $img->reset($id);
    }
    // justering av kontrasten på bildet
    public function contrast($id, $value){
        $img = Image::make($id);
        // -100 er MIN +100 er MAX
        $img->contrast($value);
        $img->save($id);
    }
    // legger til et greyscale filter.
    public function greyscale($id){
        $img = Image::make($id);
        $img->greyscale();
        $img->save($id);
    }
    // endrer opacity, 0 = transparent
    public function opacity($id, $value){
        $img = Image::make($id);
        $img->opacity($value);
        $img->save($id);
    }
    public function pixelerate($id, $value){
        $img = Image::make($id);
        // apply pixelation effect
        $img->pixelate($value);
        $img->save($id);
    }
    // henter høyden på bildet
    public function getHeight($id){
        $size = getimagesize($id);
        // getimagesize returnerer en array med masse data
        // bredde og høyde ligger i [0] og [1].
        return $size[1];
    }

    // henter bredden på bildet
    public function getWidth($id){
        $size = getimagesize($id);
        return $size[0];
    }

    // henter bildenavn fra en form i index.html
    // NOTE: kan bare brukes i upload/index. $FILES blir ikke lagret
    public function getID($file){
        $id = basename($file);
        return $id;
    }
    // henter størrelsen på bilde
    public function getSize(){
        $size = ($_FILES["fileToUpload"]["size"]);
    }
    // utskjæring av bilde. 
    // Velger bredde og høyde. X og Y tilsvarer hvor utskjæringen skal starte.
    public function crop($id,$w, $h, $x, $y){
        $img = Image::make($id);
        $pw = $w/100;
        $pw = round($pw*$x);
        $cropx = $w -$pw; 
        $ph = $h/100;
        $ph = round($ph*$y);
        $cropy = $h - $ph; 
        $img->crop($w,$h);
        //lagrer endringene
        $img->save($id);
        return $ph;
    }
    // endrer bredden og høyden på bildet
    public function resize($id, $width, $height){
         // create an image manager instance with favored driver
        Image::configure(array('driver' => 'gd'));
        Image::make($id)->resize($width,$height)->save($id);

    }
    // sharpen: gjør bildet skarpere
    public function sharpen($id,$value){
        $img = Image::make($id);
        $img->sharpen($value);
        $img->save($id);
    }
    // blur filter: Gjør bildet "blurry"
    public function blur($id,$value){
        $img = Image::make($id);
        $img->blur($value);
        $img->save($id);
    }
    // test: stream
    public function stream($id){
        $stream = Image::make($id)->stream('jpg', 60);
        return $stream;
    }
    // lager et usynlig bilde med samme bredde og høyde som bildet i bruk
    public function canvas($w,$h){
        $canvas = Image::canvas($w,$h);
        $canvas->save($canvas);
        return $canvas;
    }
    // flip: Speiler et bilde vertikalt eller horisontalt. $value består 
    // av 'v' eller 'h'
    public function flip($id,$value){
        $img = Image::make($id);
        $img->flip($value);
        $img->save($id);
    }
    // gamma: Endrer gamma verdien i et bilde
    public function gamma($id,$value){
        $img = Image::make($id);
        $img->gamma($value);
        $img->save($id);
    }
    // ivert: Reverserer alle fargene i et bilde.
    public function invert($id){
        $img = Image::make($id);
        $img->invert();
        $img->save($id);
    }

    // skalerer bildet: Tar først backup av orginalbildet, endrer
    // width til brukersatt verdi, height blir generert av Image Intervention
    // til å passe aspect ratio.Utfører deretter en Reset for å ikke endre på bildet.
    // returnerer bredde og høydeverdi som blir brukt for skalering
    public function scaleWidth($id, $width){
         // create an image manager instance with favored driver
        Image::configure(array('driver' => 'gd'));
        $img = Image::make($id);
        // lager backup av bildet før prossesering
        $img->backup($id);
        // endrer bredde, høyde blir generert.
        $img->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
         });
        // henter bredde og høyde etter prosessering
        $w = $img->width();
        $h = $img->height();
        // reset til orginalbilde
        $img->reset($id);
        // returnerer bredde og høyde
        $value = array($w,$h);
        return $value;
    }
    // skalerer  bildet. Samme funksjon som scaleHeight, bare at 
    // bruker definerer høyde istedet for bredde.
    public function scaleHeight($id, $height){
         // create an image manager instance with favored driver
        Image::configure(array('driver' => 'gd'));
        $img = Image::make($id);
        // lager backup av bildet før prossesering
        $img->backup($id);
        // endrer bredde, høyde blir generert.
        $img->resize(null, $height, function ($constraint) {
            $constraint->aspectRatio();
         });
        // henter bredde og høyde etter prosessering
        $w = $img->width();
        $h = $img->height();
        // reset til orginalbilde
        $img->reset($id);
        // returnerer bredde og høyde
        $value = array($w,$h);
        return $value;
    }

     // endrer høyden på bildet, genererer bredden automatisk
    // etter aspect ratio:
    public function resizeHeight($id, $height){
         // create an image manager instance with favored driver
        Image::configure(array('driver' => 'gd'));
        $img = Image::make($id);
        $img->resize(null, $height, function ($constraint) {
            $constraint->aspectRatio();
         });
        $img->save($id);

    }
     // endrer bredden på bildet, genererer høyden automatisk
    // etter aspect ratio:
    public function resizeWidth($id, $width,$quality){
         // create an image manager instance with favored driver
        Image::configure(array('driver' => 'gd'));
        $img = Image::make($id);
        $img->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
         });
        $img->save($id,$quality);

    }

    // roterer bildet 90 grader til venstre
    public function roterLeft($id){
        Image::configure(array('driver' => 'gd'));
        Image::make($id)->rotate(+90)->save($id);
    }

    // roterer bildet 90 grader til høre
     public function roterRight($id){
        Image::configure(array('driver' => 'gd'));
        Image::make($id)->rotate(-90)->save($id);
    }
    // roterer bildet med brukeren sin verdi. $value = grader
    public function roter($id,$value){
        Image::configure(array('driver' => 'gd'));
        Image::make($id)->rotate($value)->save($id);
    }
    // laster opp bildet på server
    public function uploadFile($filename)
    {

        // hvor bildet skal lagres
        $target_dir = 'C:\xampp\htdocs\bachelor\public\img\\';

        //bildenavn
        $img_name = '/bachelor/img/' . basename($_FILES["fileToUpload"]["name"]);

        // full path til bildet
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

        // setter uploadOK til true
        $uploadOk = 1;

        // Finner filtype
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        $target_file = $target_dir. $filename.'.'.$imageFileType;

        // Sjekker om filen er et bilde. Filtypesjekk:
        echo "<div class='container'>";
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "<p>Filen er et bilde - " . $check["mime"] . ".</p>";
                $uploadOk = 1;
            }else {
                echo "<p>Filen er ikke et bilde.</p>";
                $uploadOk = 0;
            }
        }
        // Sjekker om filnavnet er i bruk:
        if (file_exists($target_file)) {
            echo "<p>Filnavnet er allerede i bruk.</p>";
            $uploadOk = 0;
        }
        // Sjekker filstørrelse:
        if ($_FILES["fileToUpload"]["size"] > 5000000) {
            echo "<p>Filen er for stor.</p>";
            $uploadOk = 0;
        }
        // Sjekker hvis $uploladOk har blitt endrer av en error:
        if ($uploadOk == 0) {
            echo "<p>Filen ble ikke lastet opp.</p>";
        // Hvis alt er ok, prøver å laste opp bildet:
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "Filen ". basename($target_file). " har blitt lastet opp.";
                // Hvis noe gikk galt:
            } else {
                echo "Det var et problem med å laste opp filen.";
            }
        }
        $navn = basename($target_file);
        echo "</div>";
        return array($uploadOk,$navn);
    }

    public function convertForm(){
        $val = 0;
        if(isset($_POST['convert']) && $_POST['convert'] == 'ja') {
            $val = 1;
        }else{
            $val = 0;
        } 
        return $val;   
    }
    public function getPath($id){
        $img = 'C:\xampp\htdocs\bachelor\public\img\\'.$id;
        return $img;
    }
    // genereret et tilfeldig tall som blir bildenavn
    public function generateRandomString($length) {
        // verdier som brukes
        $characters = '0123456789';
        // lengden på stringen
        $charactersLength = strlen($characters);
        // deklarerer stringen
        $randomString = '';
        // Utfører operasjonen $length ganger
        for ($i = 0; $i < $length; $i++) {
            // velger et tilfeldig tall
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
    // returnerer et tall på $length lengde
    return $randomString;
    }
}
