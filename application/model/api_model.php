<?php
 
 // include composer autoload
    require '/var/www/bachelor/vendor/autoload.php';
    // importerer Intervention Image Manager Class
    use Intervention\Image\ImageManagerStatic as Image;

    class ApiModel
    {

        public function uploadFromUrl($file){

            // Henter bildet fra URL
 			$data = file_get_contents($file, false, 
            	stream_context_create(array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false))));
			
			if($data == FALSE){
				header('Location: ' .URL_PROTOCOL.URL_DOMAIN.'/home/error');
				exit();
			}
            
            // Lager en ny fil
            $target_dir = '/var/www/bachelor/public/img/';
            $length = 7;
            $characters = '0123456789';
            $charactersLength = strlen($characters);
            $randomString = '';
            // Genererer et tilfeldig navn med 7 tall
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            // henter filtypen
            $type = pathinfo($file, PATHINFO_EXTENSION);
            /*  Sjekk for linker med referanse: domene/img/dog.jpg?itok=Vg7ueySi
                Trimmer linken til de siste fire bokstavene, deretter de siste 3
                og til slutt de siste 2:
            */
            $possible_type = array("gif", "png", "jpg","jpeg","xbm", "wbpm", "gd", "gd2", "webp");
            if($type == "gif" || $type == "png" || $type == "jpg" || $type == "jpeg" || $type == "xbm" || $type == "wbpm" || $type == "gd" || $type == "gd2" || $type == "webp"){
                $new = $target_dir.$randomString.'.'.$type;
            }
            else{
                $rest = substr($type, 0, 4);
                if($rest == "gif" || $rest == "png" || $rest == "jpg" || $rest == "jpeg" || $rest == "xbm" || $rest == "wbpm" || $rest == "gd" || $rest == "gd2" || $rest == "webp"){
                    $new = $target_dir.$randomString.'.'.$rest;
                    
                }
                else{
                    $rest = substr($type, 0, 3);
                    if($rest == "gif" || $rest == "png" || $rest == "jpg" || $rest == "jpeg" || $rest == "xbm" || $rest == "wbpm" || $rest == "gd" || $rest == "gd2" || $rest == "webp"){
                        $new = $target_dir.$randomString.'.'.$rest;
                        
                    }
                    else{
                        $rest = substr($type, 0, 2);
                        if($rest == "gif" || $rest == "png" || $rest == "jpg" || $rest == "jpeg" || $rest == "xbm" || $rest == "wbpm" || $rest == "gd" || $rest == "gd2" || $rest == "webp"){
                            $new = $target_dir.$randomString.'.'.$rest;
                            
                        }
                        else{
                            echo "filtypen". $rest  . "er ikke støttet";
                            header('Location: ' .URL_PROTOCOL.URL_DOMAIN.'/home/error');
                            exit();
                        }

                    }
                }
            }

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
