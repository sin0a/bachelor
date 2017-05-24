<?php include "menu.php" ?>
    <div class="container" style="margin-left: 250px">
        <h1>Blur - Legger på et blur filter</h1>
        <p>Denne funksjonen legger på et blur filter, det gjør bildet uklart</p>
        <br>
        <h2>Parameter</h2>
        <br>
        <p><b>Verdi: </b>Et tall mellom 0 og 100.</p>
        <div class="kodequote">
            <p><?= $url;?><b>blur=verdi</b></p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p><b>Uten filter:</b></p>
                <div class="thumbnail">
                    <img src="<?='/img/site/9862606.jpg'?>" alt="innsekt"/>
                </div>
            </div>
            <div class="col-md-4">
                <p><b>Med blur = 10:</b></p>
                <div class="thumbnail">
                    <img src="<?='/img/site/6755623.jpg'?>" alt="innsekt"/>
                </div>
            </div>
        </div>


    </div>
</div>
