<?php include "menu.php" ?>
    <div class="container" style="margin-left: 250px">
        <h1>Contrast - Endrer kontrasten på et bilde</h1>
        <p>Denne funksjonen endrer kontrasten</p>
        <br>
        <h2>Parameter</h2>
        <p><b>Verdi: </b>Et tall mellom -100 og 100.</p>
        <div class="kodequote">
            <p><?= $url;?>/<b>contrast=verdi</b></p>
        </div>
      <div class="imagecontainer">
            <div class="leftimage">
                <p><b>Orginal:</b></p>
                <img src="<?='/bachelor/img/6862193.jpg'?>" style="margin-right: 20px;"/>
            
            <p><b>Med contrast = -20:</b></p>
                <img src="<?='/bachelor/img/7928924.jpg'?>"/>
                </div>
            <div class="rightimage">
                <p><b>Med brightness = 40:</b></p>
                <img src="<?='/bachelor/img/7550493.jpg'?>"/>
            </div>
            <br>
        </div>


    </div>
</div>