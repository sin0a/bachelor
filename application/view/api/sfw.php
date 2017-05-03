<?php include "menu.php" ?>
    <div class="container" style="margin-left: 250px">
        <h1>Save for web - Optimaliserer bilde for web</h1>
        <p>Lagrer bildet til bruk for web</p>
        <p>Denne funksjonen encoder bildet til jpg med en kvalitetsvariabel, ved encoding av større bilder anbefales resize for større effekt.</p>
        <br>
        <h2>Parameter</h2>
        <p>
            <b>Kvalitet: </b> Kvalitet til encoding. Standard er 70, men ved større oppløsning burde man gå lavere</p>
        <div class="kodequote">
            <p><?= $url;?><b>sfw=kvalitet</b></p>
        </div>
        <br>
        <h2>Save for web med resize</h2>
        <p>Burde brukes ved større bilder som f.eks bilder med 4k oppløsning</p>
        <div class="kodequote">
            <p><?= $url;?><b>sfw=70&&width=700&&height=auto</b></p>
        </div>
        <div class="row">
            <br>
            <div class="col-md-4">
                <p><b>Orginal: 1907kb, 5360x3560</b></p>
                <div class="thumbnail">
                    <img src="<?='/bachelor/img/8674005.jpg'?>" width=500 height=332/>
            </div>
            <p><b>Sfw 40 med resize 1600x1063: 194kb</b></p>
            <div class="thumbnail">
                    <img src="<?='/bachelor/img/4225171.jpg'?>" width=500 height=332/>
            </div>
        </div>
        <div class="col-md-4">
            <p><b>Sfw 40: 580kb 5360x3560</b></p>
            <div class="thumbnail">
                <img src="<?='/bachelor/img/9083913.jpg'?>"width=500 height=332/>
            </div>
        </div>
    </div>


</div>
