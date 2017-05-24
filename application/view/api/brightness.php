<?php include "menu.php" ?>
    <div class="container" style="margin-left: 250px">
        <h1>Brightness - Endrer lysstyrken på bilde</h1>
        <p>Denne funksjonen endrer lysverrdien i bildet, praktisk for veldige mørke bilder</p>
        <br>
        <h2>Parameter</h2>
        <p><b>Verdi: </b>Et tall mellom -100 og 100. 0 betyr ingen forandring</p>
        <div class="kodequote">
            <p><?= $url;?><b>brightness=verdi</b></p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p><b>Orginal:</b></p>
                <div class="thumbnail">
                    <img src="<?='/img/site/9862606.jpg'?>" alt="innsekt"/>
                </div>
            
            <p><b>Med brightness = -40:</b></p>
                <div class="thumbnail">
                    <img src="<?='/img/site/6652040.jpg'?>" alt="innsekt"/>
                </div>
            </div>
            <div class="col-md-4">
                <p><b>Med brightness = 40:</b></p>
                <div class="thumbnail">
                    <img src="<?='/img/site/3371084.jpg'?>" alt="innsekt"/>
                </div>
            </div>
            <br>
        </div>


    </div>
</div>
