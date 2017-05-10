<?php include "menu.php" ?>
    <div class="container" style="margin-left: 250px">
        <h1>Pixelerate - Legger på et pixel filter</h1>
        <p>Denne funksjonen legger på et pixel filter, dette gjør pixlene større</p>
        <br>
        <h2>Parameter</h2>
        <p><b>Verdi: </b>Størrelsen på hvert pixel</p>
        <div class="kodequote">
            <p><?= $url;?><b>pxl=verdi</b></p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p><b>Uten filter:</b></p>
                <div class="thumbnail">
                    <img src="<?='/img/site/2470689.jpg'?>"/>
                </div>
            </div>
            <div class="col-md-4">
                <p><b>Med pxl = 5:</b></p>
                <div class="thumbnail">
                    <img src="<?='/img/site/9647617.jpg'?>"/>
                </div>
            </div>
        </div>


    </div>
</div>
