<div class="wrapper">
	<div class="sidebar-nav" style="float: left;     background-color: #f5f5f5; ">
        <div class="well" style="width:225px; padding: 0px 0;">
        	<ul class="list-group" style="margin-bottom: 0px;">
        		<form action="<?=URL_PROTOCOL.URL_DOMAIN.'/upload/image/'.$id; ?>" method="post" id="editform" enctype="multipart/form-data">
                    <li class="list-group-item"><b>Action</b></li>
                    <!-- Blur -->
                    <button type="button" class="list-group-item" id="btnBlur" style="width: 224px; text-align: left; border-radius: 0px;">Blur()</button>
                    <div id="blur" style="display: none;">
                    	<p style="margin: 10px;">Blur gjør bildet mer utydelig. Lovelige verdier er 0-100.</p>
                    	<input type="text" class="form-control" name="blur" style="max-width: 70px; margin: 10px; text-align: center;">
                    </div>
                    <!-- Brightness -->
                    <button type="button" class="list-group-item" id="btnBrightness" style="width: 224px; text-align: left; border-radius: 0px;">Brightness()</button>
                    <div id="brightness" style="display: none;">
                    	<p style="margin: 10px;">Brigness gjør bildet lysere. Lovelige verdier er -100 - 100.</p>
                    	<input type="text" class="form-control" name="brightness" style="max-width: 70px; margin: 10px; text-align: center;">
                    </div>
                    <!-- Contrast -->
                    <button type="button" class="list-group-item" id="btnContrast" style="width: 224px; text-align: left; border-radius: 0px;">Contrast()</button>
                    <div id="contrast" style="display: none;">
                    	<p style="margin: 10px;">Endrer kontrasten. Lovelige verdier er -100 - 100.</p>
                    	<input type="text" class="form-control" name="contrast" style="max-width: 70px; margin: 10px; text-align: center;">
                    </div>
                     <!-- Fit -->
					<button type="button" class="list-group-item" id="btnFit" style="width: 224px; text-align: left; border-radius: 0px;">Fit()</button>
                    <div id="fit" style="display: none;">
                    	<p style="margin: 10px;">Blanding mellom crop og resize.</p>
                    	<label for="fitb" style="float:left; margin-left: 20px; margin-bottom: 0px;">Bredde:</label>
					    <label for="fith" style="float:right; margin-right: 25px; margin-bottom: 0px;">Høyde:</label>
					    <br>
                    	<input type="text" class="form-control" name="fitb" style="max-width: 80px; margin: 10px; text-align: center; float: left;">
                    	<input type="text" class="form-control" name="fith" style="max-width: 80px; margin: 10px; text-align: center; float: right;">
                    	<br><br><br>
                    </div>                   
                    <!-- Flip -->
                    <button type="button" class="list-group-item" id="btnFlip" style="width: 224px; text-align: left; border-radius: 0px;">Flip()</button>
                    <div id="flip" style="display: none;">
                        <p style="margin: 10px;">Speiler et bilde horisontalt eller vertikalt. Verdier er v og h</p>
                        <input type="text" class="form-control"  maxlength="1" name="flip" style="max-width: 70px; margin: 10px; text-align: center;">
                    </div>
                    <!-- Gamma -->
                    <button type="button" class="list-group-item" id="btnGamma" style="width: 224px; text-align: left; border-radius: 0px;">Gamma()</button>
                    <div id="gamma" style="display: none;">
                        <p style="margin: 10px;">Endrer gammaverdien på bildet. Verdier er fra 0.1 til 25.0</p>
                        <input type="text" class="form-control" name="gamma" style="max-width: 70px; margin: 10px; text-align: center;">
                    </div>
                    <!-- Grescale -->
                    <button type="button" class="list-group-item" id="btnGreyscale" style="width: 224px; text-align: left; border-radius: 0px;">Greyscale()</button>
                    <div id="greyscale" style="display: none;">
                        <p style="margin: 10px;">Endrer fargene til svar/hvitt.</p>
                        <div class="checkbox" style="margin: 10px;">
                            <label><b>Greyscale</b><input type="checkbox" name="greyscale" value="1" style="margin-left: 10px;"></label>
                        </div>
                    </div>
                    <!-- Invert -->
                     <button type="button" class="list-group-item" id="btnInvert" style="width: 224px; text-align: left; border-radius: 0px;">Invert()</button>
                    <div id="invert" style="display: none;">
                        <p style="margin: 10px;">Inverterer alle fargene.</p>
                        <div class="checkbox" style="margin: 10px;">
                            <label><b>Invert</b><input type="checkbox" name="invert" value="1" style="margin-left: 10px;"></label>
                        </div>
                    </div>
                    <!-- Pixelerate -->
                    <button type="button" class="list-group-item" id="btnPixelerate" style="width: 224px; text-align: left; border-radius: 0px;">Pixelerate()</button>
                    <div id="pixelerate" style="display: none;">
                        <p style="margin: 10px;">Setter på et pixel filter. Dette forstørrer hver enkel pixel. Verdi: Størrelsen på hver pixel</p>
                        <input type="text" class="form-control" name="pixelerate" style="max-width: 70px; margin: 10px; text-align: center;">
                    </div>
                    <!-- Resize -->
                    <button type="button" class="list-group-item" id="btnResize" style="width: 224px; text-align: left; border-radius: 0px;">Resize()</button>
                    <div id="resize" style="display: none;">
                        <p style="margin: 10px;">Endrer oppløsningen på et bilde. Sett enten bredde eller høyde til "<b>auto</b>" for å beholde størrelsesforholdet.</p>
                        <label for="width" style="float:left; margin-left: 20px; margin-bottom: 0px;">Bredde:</label>
                        <label for="height" style="float:right; margin-right: 25px; margin-bottom: 0px;">Høyde:</label>
                        <br>
                        <input type="text" class="form-control" name="width" style="max-width: 80px; margin: 10px; text-align: center; float: left;">
                        <input type="text" class="form-control" name="height" style="max-width: 80px; margin: 10px; text-align: center; float: right;">
                        <br><br><br>
                    </div>   
                    <!-- Rotate --> 
                    <button type="button" class="list-group-item" id="btnRotate" style="width: 224px; text-align: left; border-radius: 0px;">Rotate()</button>
                    <div id="rotate" style="display: none;">
                        <p style="margin: 10px;">Roterer et bilde. Verdi er fra 365 til -365.</p>
                        <input type="text" class="form-control" name="rotate" style="max-width: 70px; margin: 10px; text-align: center;">
                    </div>
                    <!-- Sharpen -->
                    <button type="button" class="list-group-item" id="btnSharpen" style="width: 224px; text-align: left; border-radius: 0px;">Sharpen()</button>
                    <div id="sharpen" style="display: none;">
                    	<p style="margin: 10px;">Gjør bildet skarpere. Lovelige verdier er 0-100</p>
                    	<input type="text" class="form-control" name="sharpen" style="max-width: 70px; margin: 10px; text-align: center;">
                    </div>
                    <!-- Encode -->
                    <button type="button" class="btn btn-danger" id="btnEncode" style="width: 224px; text-align: left; border-radius: 0px;">Konverter()</button>
                    <div id="encode" style="display: none;">
                        <p style="margin: 10px;">Konverterer bilde. Velg et format, Kvalitet er rangert fra 0-100.<br><b> OBS: </b>Bildet kan ikke bli redigert etter konvertering, 
                            noen filtyper kan ikke vises av nettleseren.</p>
                            <p style="margin: 10px;">Reset funksjoner fungerer heller ikke etter konvertering.</p>
                        <div class="form-group" style=" margin:10px;">
                            <label for="sel1" style="float:left;">Format:</label>
                            <label for="sel1" style="float:right;">Kvalitet:</label>
                            <br><br>
                            <select class="form-control" name="format" style="max-width: 85px; float: left;">
                                <option>gd</option>
                                <option>gd2</option>
                                <option>gif</option>
                                <option>jpeg</option>
                                <option selected="selected">jpg</option>
                                <option>png</option>
                                <option>wbmp</option>
                                <option>webp</option>
                                <option>xbm</option>
                            </select>
                            <input type="text" class="form-control" name="encode" style="max-width: 50px; text-align: center; float: right;">
                            <br><br><br>
                        </div>
                     </div>
            </form>
        </ul>
    </div>

</div>
<ul class="list-group" style="margin-bottom: 0px; float: right; cursor:default;">
	<li id="btnZoomIn" style="" class="list-group-item">
		<i class="material-icons">zoom_in</i>
	</li>
    <li id="btnZoomIn2" style="display:none;" class="list-group-item">
        <i class="material-icons">zoom_in</i>
    </li>
        <li id="btnZoomIn3" style="display:none;" class="list-group-item">
        <i class="material-icons">zoom_in</i>
    </li>
    <li id="btnZoomIn4" style="display:none;" class="list-group-item">
        <i class="material-icons">zoom_in</i>
    </li>
    <li id="btnZoomIn5" style="display:none;" class="list-group-item">
        <i class="material-icons">zoom_in</i>
    </li>
    <li id="btnZoomOut" style="" class="list-group-item">
        <i class="material-icons">zoom_out</i>
    </li>
    <li id="btnZoomOut2" style="display: none;" class="list-group-item">
        <i class="material-icons">zoom_out</i>
    </li>
    <li id="btnZoomOut3" style="display: none;" class="list-group-item">
        <i class="material-icons">zoom_out</i>
    </li>
    <li id="btnZoomOut4" style="display: none;" class="list-group-item">
        <i class="material-icons">zoom_out</i>
    </li>
</ul>
	<div class="col-md-4" style="padding-left: 30px; align-items: center;
  justify-content: center; display: flex; width: 80%;">
	<div class="thumbnail" id="img1" style="display: ">
		<img class="img-responsive" src="<?='/img/'.$id?>" width="<?php 
        if($w > 1000){
            echo "1000";} ?>" height="<?php 
            if($h < 1000){
                echo "auto";
            }
            ?>" alt="asd" >
	</div>
	<div class="thumbnail" id="img2" style="display: none;">
		<img class="img-responsive" src="<?='/img/'.$id?>" width="<?php 
        if($w > 1000){
            echo "1250";}
        else{
            echo $w + $w/4;} ?>" height="<?php echo "auto" ?>" alt="asd" >
	</div>
    <div class="thumbnail" id="img3" style="display: none;">
        <img class="img-responsive" src="<?='/img/'.$id?>" width="<?php 
        if($w > 1000){
            echo "1500";}
        else{
            echo $w + $w/2;} ?>" height="<?php echo "auto" ?>" alt="asd" >
    </div>
    <div class="thumbnail" id="img4" style="display: none;">
        <img class="img-responsive" src="<?='/img/'.$id?>" width="<?php
        if($w > 1000){
            echo "750";}
        else{
            echo $w - $w/4;} ?>" height="<?php echo "auto" ?>" alt="asd" >
    </div>
    <div class="thumbnail" id="img5" style="display: none;">
        <img class="img-responsive" src="<?='/img/'.$id?>" width="<?php
        if($w > 1000){
            echo "500";}
        else{
            echo $w - $w/2;} ?>" height="<?php echo "auto" ?>" alt="asd" >
    </div>
</div> 
</div>
<div style="margin-left: 42.1875%;">
    <Button class="btn btn-success" id="btnSubmit" value="Utfør" style="float: left; margin-right: 10px; width: 90px;">Utfør</button> 
    <form action="<?=URL_PROTOCOL.URL_DOMAIN.'/reset?id='.$id; ?>" method="post" enctype="multipart/form-data">
            <input type="submit" class="btn btn-warning" id="" value="Reset" style="float: left; margin-right: 10px; width: 90px; display: <?php echo $reset ?>"> 
        </form>
        <a href="<?='/img/'.$id?>" download="<?php echo $id?>">
            <Button class="btn btn-primary" style="float: left; margin-right: 10px; width: 90px;">
                Download</button></a>
    </div>