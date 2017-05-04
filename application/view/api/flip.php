<?php include "menu.php" ?>
    <div class="container" style="margin-left: 250px">
        <h1>Flip - Speiler et bilde</h1>
        <p>Denne funksjonen speiler et bilde vertikalt eller horisontalt</p>
        <br>
        <h2>Parameter</h2>
        <p><b>Retning: </b>V eller H</p>
        <div class="kodequote">
            <p><?= $url;?><b>flip=retning</b></p>
        </div>
         <div class="row">
            <div class="col-md-4">
                <p><b>Orginal:</b></p>
                <div class="thumbnail">
                    <img src="<?='/bachelor/img/1142629.jpg'?>"/>
                </div>
            <p><b>Flip = h:</b></p>
            <div class="thumbnail">
                <img src="<?='/bachelor/img/8402556.jpg'?>"/>
            </div>
                </div>
            <div class="col-md-4">
                <p><b>Flip = v:</b></p>
                <div class="thumbnail">
                    <img src="<?='/bachelor/img/3140962.jpg'?>"/>
            </div>
            </div>
            <br>
        </div>


    </div>
</div>
