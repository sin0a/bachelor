<?php include "menu.php" ?>
    <div class="container" style="margin-left: 250px">
        <h1>Rotate - Roterer et bilde</h1>
        <p>Denne funksjonen roterer bildet til en grad</p>
        <br>
        <h2>Parameter</h2>
        <p><b>Verdi: </b>Et tall mellom -364 og 364.</p>
        <div class="kodequote">
            <p><?= $url;?><b>rotate=verdi</b></p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p><b>Orginal:</b></p>
                <div class="thumbnail">
                    <img src="<?='/bachelor/img/6862193.jpg'?>"/>
                </div>
            <p><b>Med rotate = -45:</b></p>
            <div class="thumbnail">
                <img src="<?='/bachelor/img/2926665.jpg'?>"/>
            </div>
                </div>
            <div class="col-md-4">
                <p><b>Med rotate = 90:</b></p>
                <div class="thumbnail">
                    <img src="<?='/bachelor/img/0240941.jpg'?>"/>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>