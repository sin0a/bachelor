<?php include "menu.php" ?>
    <div class="container" style="margin-left: 250px">
        <h1>Resize - Endrer oppløsningen på bildet</h1>
        <p>Utfører resize() operasjonen som endrer dimensjonen på bilde</p>
        <br>
        <h2>Parameter</h2>
        <p><b>Width: </b> Ønsket bredde på bildet</p>
        <p><b>Height: </b> Ønsket høyde på bildet</p>
        <div class="kodequote">
            <p><?= $url;?><b>width=500&&height=500</b></p>
        </div>
        <br>
        <h2>Behold størrelsesforholdet</h2>
        <p>Størrelsesforholdet(Aspect ratio) blir automatisk beholdt
        hvis enten <b>width</b> eller <b>height</b> settes til <b>auto</b></p>
        <div class="kodequote">
            <p><?= $url;?><b>width=250&&height=auto</b></p>
        </div>
        <div class="imagecontainer">
        <br>
        <div class="leftimage">
            <p><b>Orginal: 300x193</b></p>
            <img src="<?='/bachelor/img/9862606.jpg'?>" style="margin-right: 20px;"/>
        </div>
        <div class="rightimage">
            <p><b>Etter resize: 250x161</b></p>
            <img src="<?='/bachelor/img/5669583.jpg'?>"/>
        </div>
        </div>


</div>