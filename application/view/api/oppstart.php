<?php include "menu.php" ?>
    <div class="container" style="margin-left: 250px">
        <h1>Oppstart</h1>
        <p>En liten guide til The Online Image API</p>
        <h3>Hva er TOIA API?</h3>
        <p>API står for Application Programming Interface og er en måte
            for forskjellige programmeringsspråk/platformer å forstå hverandre.</p>
        <p>Vårt API tilbyr bildebehandling ved lesing av brukerens ønske gjennom en URL.
            API'et er enkelt å bruke, alle operasjonene vi tilbyr ligger på venstre meny.</p>
        <h3>Krav</h3>
        <p>Api'et krever bare et bilde i form av en URL:</p>
        <div class="kodequote">
            <p><?= $url;?><b>path=url</b></p>
        </div>
        <p>For hver operasjon som skal gjøres, splitter du de med "&":</p>
        <div class="kodequote">
            <p><?= $url;?><b>path=url&resize=300,auto&contrast=-40</b></p>
        </div>
        <h3>Eksempel</h3>
        <p>Hente et bilde fra pixbay og endre oppløsning:</p>
        <div class="kodequote">
            <p><?= $url;?><b>path=</b>https://cdn.pixabay.com/photo/2015/11/17/13/13/dogue-de-bordeaux-1047521_960_720.jpg<b>&resize=</b>300,auto</p>
        </div>
        <h3>Bruke Api'et i en php applikasjon:</h3>
        <div class="kodequote">
            <p> <b>$img = file_get_contents(</b>'http://178.62.61.62/api?<b>path=</b>https://cdn.pixabay.com/photo/2015/11/17/13/13/dogue-de-bordeaux-1047521_960_720.jpg<b>&resize=</b>300,auto');<br> <b>echo $img;</b></p>
        </div>
        <button type="submit" class="btn btn-success" id="btnExecute" style="float: left; margin-right: 10px;">Prøv</button>
        <br><br><br><br>
        <div class="row" id="execute" style="display: none;">
            <div class="col-md-4">
                <div class="thumbnail">
                    <?php $img = file_get_contents($url.'path=https://cdn.pixabay.com/photo/2015/11/17/13/13/dogue-de-bordeaux-1047521_960_720.jpg&resize=300,auto'); echo $img;?>
                </div>
            </div>                    
    </div>
</div>
