<?php include "menu.php" ?>
    <div class="container" style="margin-left: 250px">
        <h1>Gamma - Utfører gammakorrektur på et bilde</h1>
        <p>Denne funksjonen utfører gammakorrektur </p>
        <br>
        <h2>Parameter</h2>
        <p><b>Verdi: </b>Et desimal mellom 0.1 og 25.0</p>
        <div class="kodequote">
            <p><?= $url;?><b>gamma=verdi</b></p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p><b>Uten gamma:</b></p>
                <div class="thumbnail">
                    <img src="<?='/img/site/7733090.jpg'?>"/>
                </div>
            </div>
            <div class="col-md-4">
                <p><b>Med gamma = 2.5:</b></p>
                <div class="thumbnail">
                    <img src="<?='/img/site/3883110.jpg'?>"/>
                </div>
            </div>
        </div>


    </div>
</div>
