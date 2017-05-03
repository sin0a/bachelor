<?php
 
 // include composer autoload
    require '/../../../../vendor/autoload.php';

    // importerer Intervention Image Manager Class
    use Intervention\Image\ImageManagerStatic as Image;

    class ApiModel
    {

        public function uploadFromUrl(){
            // henter URL til bildet
            $file = $_GET["path"];

            // Henter bildet fra URL
            $data = file_get_contents($file, false, 
                stream_context_create(array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false))));
            // Lager en ny fil
            $target_dir = 'C:\xampp\htdocs\bachelor\public\img\\';
            $length = 7;
            $characters = '0123456789';
            $charactersLength = strlen($characters);
            $randomString = '';
            // Genererer et tilfeldig navn med 7 tall
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            $new = $target_dir.$randomString.'.jpg';

        // Legger til bildet på den nye filen
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
    }
?>
