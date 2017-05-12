<div class="wrapper">
	<div class="sidebar-nav" style="float: left;     background-color: #f5f5f5; ">
        <div class="well" style="width:225px; padding: 0px 0;">
        	<ul class="list-group" style="margin-bottom: 0px;">
        		<form action="<?=URL_PROTOCOL.URL_DOMAIN.'/upload/image/'.$id; ?>" method="post" enctype="multipart/form-data">
                    <li class="list-group-item"><b>Action</b></li>
                    <button type="button" class="list-group-item" id="btnBlur" style="width: 224px; text-align: left; border-radius: 0px;">Blur()</button>
                    <div id="blur" style="display: none;">
                    	<p style="margin: 10px;">Blur gjør bildet mer utydelig. Lovelige verdier er 0-100.</p>
                    	<input type="text" class="form-control" name="blur" style="max-width: 70px; margin: 10px; text-align: center;">
                    </div>

                    <button type="button" class="list-group-item" id="btnBrightness" style="width: 224px; text-align: left; border-radius: 0px;">Brightness()</button>
                    <div id="brightness" style="display: none;">
                    	<p style="margin: 10px;">Brigness gjør bildet lysere. Lovelige verdier er -100 - 100.</p>
                    	<input type="text" class="form-control" name="brightness" style="max-width: 70px; margin: 10px; text-align: center;">
                    </div>

                    <button type="button" class="list-group-item" id="btnContrast" style="width: 224px; text-align: left; border-radius: 0px;">Contrast()</button>
                    <div id="contrast" style="display: none;">
                    	<p style="margin: 10px;">Endrer kontrasten. Lovelige verdier er -100 - 100.</p>
                    	<input type="text" class="form-control" name="contrast" style="max-width: 70px; margin: 10px; text-align: center;">
                    </div>
      				
                    <button type="button" class="list-group-item" id="btnEncode" style="width: 224px; text-align: left; border-radius: 0px;">Encode()</button>
                    <div id="encode" style="display: none;">
                    	<p style="margin: 10px;">Konverterer bilde. Velg et format, Kvalitet er rangert fra 0-100.</p>
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

					<button type="button" class="list-group-item" id="btnFit" style="width: 224px; text-align: left; border-radius: 0px;">Fit()</button>
                    <div id="fit" style="display: none;">
                    	<p style="margin: 10px;">Blanding mellom crop og resize.</p>
                    	<label for="fitb" style="float:left; margin-left: 10px; margin-bottom: 0px;">Bredde:</label>
					    <label for="fith" style="float:right; margin-right: 10px; margin-bottom: 0px;">Høyde:</label>
					    <br>
                    	<input type="text" class="form-control" name="fitb" style="max-width: 50px; margin: 10px; text-align: center; float: left;">
                    	<input type="text" class="form-control" name="fith" style="max-width: 50px; margin: 10px; text-align: center; float: right;">
                    	<br><br><br>
                    </div>                   
    
                    <li class="list-group-item"><a href="flip">Flip()</a></li>
                    <li class="list-group-item"><a href="gamma">Gamma()</a></li>
                    <li class="list-group-item"><a href="greyscale">Greyscale()</a></li>
                    <li class="list-group-item"><a href="invert">Invert()</a></li>
                    <li class="list-group-item"><a href="pixelerate">Pixelerate()</a></li>
                    <li class="list-group-item"><a href="resize">Resize()</a></li>
                    <li class="list-group-item"><a href="rotate">Rotate()</a></li>
                    <li class="list-group-item"><a href="sfw">Save for web()</a></li>
         
                    <button type="button" class="list-group-item" id="btnSharpen" style="width: 224px; text-align: left; border-radius: 0px;">Sharpen()</button>
                    <div id="sharpen" style="display: none;">
                    	<p style="margin: 10px;">Gjør bildet skarpere. Lovelige verdier er 0.1 - 25.0</p>
                    	<input type="text" class="form-control" name="contrast" style="max-width: 70px; margin: 10px; text-align: center;">
                    </div>

                  <input type="submit" class="btn btn-success" id="btnContrast" value="Kjør" style="width: 224px; text-align: left; border-radius: 0px;"> 
            </form>
            <form action="<?=URL_PROTOCOL.URL_DOMAIN.'/reset?id='.$id; ?>" method="post" enctype="multipart/form-data">
            <input type="submit" class="btn btn-warning" id="btnBrightness" value="Reset" style="width: 224px; text-align: left; border-radius: 0px;"> 
        </form>
        </ul>
    </div>

</div>
	<label id="btnZoomIn" style="">
		<i class="material-icons">zoom_in</i>
	</label>
	<label id="btnZoomOut" style="display: none;">
		<i class="material-icons">zoom_out</i>
	</label>
	<div class="col-md-4" style="">
	<div class="thumbnail" id="img1" style="">
		<img class="img-responsive" src="<?='/img/'.$id?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>" alt="asd" >
	</div>
	<div class="thumbnail" id="img2" style="display: none;">
		<img class="img-responsive" src="<?='/img/'.$id?>" width="<?php echo $w1; ?>" height="<?php echo $h1; ?>" alt="asd" >
	</div>
</div> 
</div>
