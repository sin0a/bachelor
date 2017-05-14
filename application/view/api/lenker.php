<?php include "menu.php" ?>
    <div class="container" style="margin-left: 250px">
        <h1>Lenker</h1>
        <p>Implementer API'et på din nettside</p>
        <h3>HTML</h3>
        <p>I HTML trenger du bare å lagre datane i en form:</p>
        <p><b>index.php</b></p>
        <div class="kodequote" style="max-width: 600px;">
            
            <div style="margin-left: 20px;">   <?php echo htmlspecialchars('<form action="handler.php" method="post" id="editform" enctype="multipart/form-data">'); echo "<br>"; ?> </div>
            <div style="margin-left: 40px;">   <?php echo htmlspecialchars('<div id="path">                                                                      '); echo "<br>"; ?> </div>
            <div style="margin-left: 60px;">   <?php echo htmlspecialchars('<p>Bilde:</p>                                                                        '); echo "<br>";
                                                     echo htmlspecialchars('<input type="text" class="form-control" name="path">                                 '); echo "<br>"; ?> </div>
            <div style="margin-left: 40px;">   <?php echo htmlspecialchars('</div>                                                                               '); echo "<br>"; ?> </div>
            <div style="margin-left: 40px;">   <?php echo htmlspecialchars('<div id="blur">                                                                      '); echo "<br>"; ?> </div>
            <div style="margin-left: 60px;">   <?php echo htmlspecialchars('<p>Blur:</p>                                                                         '); echo "<br>";
                                                     echo htmlspecialchars('<input type="text" class="form-control" name="blur">                                 '); echo "<br>"; ?> </div>
            <div style="margin-left: 40px;">   <?php echo htmlspecialchars('</div>                                                                               '); echo "<br>"; 
                                                     echo htmlspecialchars('<div id="brightness">                                                                '); echo "<br>"; ?> </div>
            <div style="margin-left: 60px;">   <?php echo htmlspecialchars('<p>Brigness:</p>                                                                     '); echo "<br>";
                                                     echo htmlspecialchars('<input type="text" class="form-control" name="brightness">                           '); echo "<br>"; ?> </div>
            <div style="margin-left: 40px;">   <?php echo htmlspecialchars('</div>                                                                               '); echo "<br>"; ?> </div>
            <div style="margin-left: 40px;">   <?php echo htmlspecialchars('<br>                                                                                 '); echo "<br>";
                                                     echo htmlspecialchars('<input type="submit" class="btn btn-success" id="btnSubmit" value="Utfør">           '); echo "<br>"; ?> </div>
            <div style="margin-left: 20px;">   <?php echo htmlspecialchars('</form>                                                                              '); echo "<br>"; ?> </div>
            
            
        </div>
        <h3>PHP som prosseserer formen</h3>
        <p>Deretter lager vi en php fil som leser data fra formen og sender det til API'et.</p>
        <p><b>handler.php</b></p>
        <div class="kodequote" style="max-width: 600px;"><br>
            <div style="margin-left: 20px;">
                // Penker til API<br>
               <b> $url = "http://178.62.61.62/api?";</b> <br>
                // Splitter prossesene<br>
                <b>$split = "&";<br></b>
                // Url til bildet<br>
                <b>$path = "path=";<br>
                $brightness = "brightness=";<br>
                $blur = "blur=";<br></b>
                // isset() sjekker om feltet er fylt ut. strlen() sjekker at lenken ikke er 0 i lengde<br>
                <b>if(isset($_POST["path"]) && strlen($_POST["path"]) != 0){<br> 
            </div></b>
            <div style="margin-left: 40px;">    
                    // Bygger lenken: http://178.62.61.62/api? + path= + <br>
                    <b>$lenke = $url.$path.$_POST["path"];<br>
                    if(isset($_POST["blur"]) && strlen($_POST["blur"]) != 0){<br>
            </div>
            <div style="margin-left: 60px;"> 
                        $lenke += $split.$blur.$_POST["blur"];}<br>
            </div>
            <div style="margin-left: 40px;"> 
                    
                    if(isset($_POST["brightness"]) && strlen($_POST["brightness"]) != 0){<br>
            </div>
            <div style="margin-left: 60px;">
                         $lenke += $split.$brightness.$_POST["brightness"];}<br>
            </div></b>
            <div style="margin-left: 40px;">
                    
                    // Henter bildet fra API'et<br>
                    <b>$img = file_get_contents($lenke);<br></b>
                    // Viser bildet<br>
                    <b>echo $img;<br>
            </div></b>
            <div style="margin-left: 20px;">
                }
            </div>

        </div>
        <br>
        <h3>Eksempel:</h3>
        <br> 
        <ul class="list-group">
            <form action="<?=URL_PROTOCOL.URL_DOMAIN.'/api/handler' ?>" method="post" id="editform" enctype="multipart/form-data">
                <div id="path">
                    <p>Bilde:</p>
                    <input type="text" class="form-control" name="path" value="https://cdn.pixabay.com/photo/2015/11/17/13/13/dogue-de-bordeaux-1047521_960_720.jpg" >
                </div>
                <div id="blur">
                    <p>Blur:</p>
                    <input type="text" class="form-control" name="blur">
                </div>
                <div id="brightness">
                    <p>Brigness:</p>
                    <input type="text" class="form-control" name="brightness">
                </div>
                <br>
                <input type="submit" class="btn btn-success" id="btnSubmit" value="Utfør"> 
            </form>
        </ul>  
</div>
