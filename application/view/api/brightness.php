<?php include "menu.php" ?>
    <div class="container" style="margin-left: 250px">
        <h1>Brightness - Endrer lysstyrken på bilde</h1>
        <p>Denne funksjonen endrer lysverrdien i bildet, praktisk for veldige mørke bilder</p>
        <br>
        <h2>Parameter</h2>
        <p><b>Verdi: </b>Et tall mellom -100 og 100. 0 betyr ingen forandring</p>
        <div class="kodequote">
            <p><?= $url;?>/<b>brightness=verdi</b></p>
        </div>
        <div class="imagecontainer">
            <div class="leftimage">
                <p><b>Orginal:</b></p>
                <img src="<?='/bachelor/img/9862606.jpg'?>" style="margin-right: 20px;"/>
            
            <p><b>Med brightness = -40:</b></p>
                <img src="<?='/bachelor/img/6652040.jpg'?>"/>
                </div>
            <div class="rightimage">
                <p><b>Med brightness = 40:</b></p>
                <img src="<?='/bachelor/img/3371084.jpg'?>"/>
            </div>
            <br>
        </div>


    </div>
</div>
