<?php include "menu.php" ?>
    <div class="container" style="margin-left: 250px">
        <h1>Fit - Crop og resize</h1>
        <p>Denne funksjonen er en kombinasjon av utskjæring og resize. Først utskjærer den 
            det som skal bort for å holde på størrelsesforholdet(aspect ratio) og deretter endrer den oppløsningen til brukerens ønske</p>
        <br>
        <h2>Parameter</h2>
        <p><b>Oppløsning: </b>Ønsket oppløsning</p>
        <div class="kodequote">
            <p><?= $url;?><b>fit=300,300</b></p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p><b>Orginal 300x200:</b></p>
                <div class="thumbnail">
                    <img src="<?='/img/site/9801999.jpg'?>"/>
                </div>
            </div>
           
            <div class="col-md-4">
                <p><b>Med fit 300,300:</b></p>
                 <div class="thumbnail">
                    <img src="<?='/img/site/3332399.jpg'?>"
                </div>
            </div>
        </div>


    </div>
</div>