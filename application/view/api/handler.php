<?php 
// Penker til API
$url = "http://localhost/api?"; 
// Splitter prossesene
$split = "&";
// Url til bildet
$path = "path=";
$brightness = "brightness=";
$blur = "blur=";
// isset() sjekker om feltet er fylt ut. strlen() sjekker at lenken ikke er 0 i lengde
if(isset($_POST["path"]) && strlen($_POST["path"]) != 0){
// Bygger lenken: http://178.62.61.62/api? + path= + 
$lenke = $url.$path.$_POST["path"];
if(isset($_POST["blur"]) && strlen($_POST["blur"]) != 0){
$lenke = $lenke.$split.$blur.$_POST["blur"];}
if(isset($_POST["brightness"]) && strlen($_POST["brightness"]) != 0){
$lenke = $lenke.$split.$brightness.$_POST["brightness"];}
// Henter bildet fra API'et
$img = file_get_contents($lenke);
// Viser bildet
echo $img;
}
?>
