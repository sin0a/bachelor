<?php include "menu.php" ?>
    <div class="container" style="margin-left: 250px">
        <h1>Contrast - Endrer kontrasten på et bilde</h1>
        <p>Denne funksjonen endrer kontrasten</p>
        <br>
        <h2>Parameter</h2>
        <p><b>Verdi: </b>Et tall mellom -100 og 100.</p>
        <div class="kodequote">
            <p><?= $url;?><b>contrast=verdi</b></p>
        </div>
      <div class="row">
            <div class="col-md-4">
                <p><b>Orginal:</b></p>
                <div class="thumbnail">
                    <img src="<?='/img/6862193.jpg'?>"/>
                </div>
            <p style="padding-top: 10px;"><b>Med contrast = -20:</b></p>
                <div class="thumbnail">
                    <img src="<?='/img/7928924.jpg'?>"/>
                </div>
            </div>
            <div class="col-md-4">
                <p><b>Med brightness = 40:</b></p>
                <div class="thumbnail">
                    <img src="<?='/img/7550493.jpg'?>"/>
                </div>
            </div>
            <br>
        </div>


    </div>
</div>