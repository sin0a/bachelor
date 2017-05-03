<?php include "menu.php" ?>
    <div class="container" style="margin-left: 250px">
        <h1>Blur - Legger på et blur filter</h1>
        <p>Denne funksjonen legger på et blur filter, det gjør bildet uklart</p>
        <br>
        <h2>Parameter</h2>
        <p><b>Verdi: </b>Et tall mellom 0 og 100.</p>
        <div class="kodequote">
            <p><?= $url;?>/<b>blur=verdi</b></p>
        </div>
        <div class="imagecontainer">
            <div class="leftimage">
                <p><b>Uten filter:</b></p>
                <img src="<?='/bachelor/img/9862606.jpg'?>" style="margin-right: 20px;"/>
            </div>
            <div class="rightimage">
                <p><b>Med blur = 10:</b></p>
                <img src="<?='/bachelor/img/6755623.jpg'?>"/>
            </div>
        </div>


    </div>
</div>
