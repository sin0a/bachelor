<div class="container">
<?php echo 'Current PHP version: ' . phpversion(); ?>
    <h2>Alpha 0.4</h2>
    <form action="<?=URL_PROTOCOL.URL_DOMAIN.'/bachelor/upload/' ?>" method="post" enctype="multipart/form-data">
    <input class="file" type="file" name="fileToUpload" id="fileToUpload"/><br><br>
    <input class="convert" type="checkbox" value="ja" name="convert" disabled/>
    Konverter bilde?
    <select name="format" disabled>
        <option value="jpg">JPG</option>
        <option value="png">PNG</option>
        <option value="gif">GIF</option>
        <option value="tiff">TIF</option>
        <option value="bmp">BMP</option>
    </select>
    <br><br>    
    <input type="submit" value="Last opp" name="submit" disabled/>
	</form>
</div>
