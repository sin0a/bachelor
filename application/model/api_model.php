<?php
 
 // include composer autoload
    require '/../../../../vendor/autoload.php';

    // importerer Intervention Image Manager Class
    use Intervention\Image\ImageManagerStatic as Image;

    class ApiModel
    {

    public function uploadFromUrl(){
        // Your file
    $file = $_GET["path"];

    // Open the file to get existing content
    $data = file_get_contents($file, false, 
        stream_context_create(array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false))));
    // New file
    $target_dir = 'C:\xampp\htdocs\bachelor\public\img\\';
    $length = 7;
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    $new = $target_dir.$randomString.'.jpg';

    // Write the contents back to a new file
    file_put_contents($new, $data);
     return $new;
    }
     public function contrast($id, $value){
        $img = Image::make($id);
        // -100 er MIN +100 er MAX
        $img->contrast($value);
        $img->save($id);
    }
    // justerer lysstyrke på bildet.
    public function brightness($id, $value){
        $img = Image::make($id);
        //-100 er MIN +100 er MAX
        $img->brightness($value);
        $img->save($id);
    }
    // uploader bildet på server
    public function uploadFileUrl()
    {

        // hvor bildet skal lagres
        $target_dir = 'C:\xampp\htdocs\bachelor\public\img\\';

        //bildenavn
        $img_name = '/bachelor/img/' . basename($_GET["path"]);

        // full path til bildet
        $target_file = $target_dir . basename($_GET["path"]);

        // setter uploadOK til true
        $uploadOk = 1;

        // Finner filtype
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        // Sjekker om filen er et bilde. Filtypesjekk:
        echo "<div class='container'>";
        if(isset($_POST["submit"])) {
            $check = getimagesize($_GET["path"]["tmp_name"]);
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
        if ($_GET["path"]["size"] > 5000000) {
            echo "<p>Filen er for stor.</p>";
            $uploadOk = 0;
        }
        // Sjekker hvis $uploladOk har blitt endrer av en error:
        if ($uploadOk == 0) {
            echo "<p>Filen ble ikke lastet opp.</p>";
        // Hvis alt er ok, prøver å laste opp bildet:
        } else {
            if (move_uploaded_file($_GET["path"]["tmp_name"], $target_file)) {
                echo "Filen ". basename( $_GET["path"]["name"]). " har blitt lastet opp.";
                // Hvis noe gikk galt:
            } else {
                echo "Det var et problem med å laste opp filen.";
            }
        }
        echo "</div>";
        return $uploadOk;
    }

}
