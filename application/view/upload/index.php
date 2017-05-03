<div class="wrapper">
	<p>Bredde: <?php echo $width; ?> px</p>
	<p>Høyde: <?php echo $height; ?> px</p>
	<div class="sidebar">
	<form>
		<input class="greyscale" type="checkbox" value="greyscale" name="greyscale"/>
		Greyscale<br>
		<input class="pxl" type="checkbox" value="pixelerate" name="pixelerate"/>
		Pixelerate<br>
		<input class="invert" type="checkbox" value="pixelerate" name="pixelerate"/>
		Invert<br>

		Brightness:<input class="brightness" type="number" id="range-value" min="0" max="100" class="slider" style="width: 50px;" /><br>
		Contrast:<input class="contrast" type="number" id="range-value" min="0" max="100" class="slider" style="width: 50px;" /><br>
		Sharpen:<input class="sharpen" type="number" id="range-value" min="0" max="100" class="slider" style="width: 50px;" /><br>
		Blur:<input class="blur" type="number" id="range-value" min="0" max="100" class="slider" style="width: 50px;" /><br>
		Gamma:<input class="gamma" type="number" id="range-value" min="0.0" max="10.0" class="slider" style="width: 50px;" /><br>



	</form>
	</div>
	<div class="container">




	<div class="img2">
		<img src ="<?='/bachelor/img/'.$utenExt. 'grey' .'.'.$ext ?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>" alt="asd" >
	</div>
	<div class="img1" style="padding-top: 20px;">
		<img src="<?='/bachelor/img/'.$id?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>" alt="asd" >
	</div>

	<div class="imgPxl">
		<img src="<?='/bachelor/img/'.$utenExt. 'pxl.' . $ext ?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>" alt="pixelerate" >
	</div>
	<div class="brightness">
		<?php 
			$default = 'default';
			$grey = 'gray';
			for($i = 0; $i <= 100; $i++){
			    echo "<div class='brg$i'style='display: none;'>";
			    echo "<img src='/bachelor/img/$utenExt$default$i.$ext' width='$w' height='$h'>"; 
			    echo "</div>";
			    echo "<div class='brgg$i'style='display: none;'>";
			    echo "<img src='/bachelor/img/$utenExt$grey$i.$ext' width='$w' height='$h'>"; 
			    echo "</div>";

			}
		?>
	</div>
</div> 
</div>
