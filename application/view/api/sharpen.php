<?php include "menu.php" ?>
    <div class="container" style="margin-left: 250px">
        <h1>Sharpen - Justerer skarpheten</h1>
        <p>Denne funksjonen justerer skarpheten på et bilde</p>
        <br>
        <h2>Parameter</h2>
        <p><b>Skarphet: </b>En verdi mellom 0 og 100</p>
        <div class="kodequote">
            <p><?= $url;?><b>sharpen=verdi</b></p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p><b>Uten filter:</b></p>
                <div class="thumbnail">
                    <img src="<?='/img/site/9801999.jpg'?>"/>
                </div>
            </div>
           
            <div class="col-md-4">
                <p><b>Med sharpen = 15:</b></p>
                 <div class="thumbnail">
                    <img src="<?='/img/site/7724892.jpg'?>"
                </div>
            </div>
        </div>


    </div>
</div>
