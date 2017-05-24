    <div class="container" style="border: none;">
        <h1 style="color: #ffffff; text-align: center; font-size: 500%; margin: 5%;">The Online Image API</h1>
        <h2 style="color: #ffffff; text-align: center; font-size: 200%; margin: 2%;">- Konverter og rediger bilder på nett</h2>
        <br>
        <div class="container-fluid" style="max-width: 750px;">
        <form id ="target" action="<?=URL_PROTOCOL.URL_DOMAIN.'/upload/' ?>" method="post" enctype="multipart/form-data">
            <div class="col-6 col-lg-4" style="margin-left: 15%;  background: rgba(0,0,0,0.5);   border-radius: 25px;">
            
                <h2 style="color: #ffffff; text-align: center;">Velg en fil</h2><br>
                <input type="submit" class="btn btn-success" id="go" value="Last opp" style="margin-left: 35%; font-size: 120%; display: none; margin-bottom: 15%;">
                <label class="btn btn-primary" id="choose"  style="margin-left: 34%; margin-bottom: 15%;">
                    Velg fil
                    <input class="file" type="file" name="fileToUpload"  id="fileToUpload" style="display: none;"/> 
                </label>
            </div>
        </form>
        <div class="col-6 col-lg-4" style="margin-left: 40px; background-color: #000000;  background: rgba(0,0,0,0.5);  border-radius: 25px; text-align: center;">
            <form id ="url" action="<?=URL_PROTOCOL.URL_DOMAIN.'/upload/url/' ?>" method="post" enctype="multipart/form-data">
                <h2 style="color: #ffffff;">Bilde fra link</h2><br>
                 <input type="submit" class="btn btn-success" id="goUrl" value="Go" style="float: right; font-size: 17px; display: none;">
                    <label id="urlLabel">
                        <input type="text" name="urlToUpload" class="form-control" id="urlToUpload" style="margin-bottom: 27%;">
                    </label>
            </form>
        </div>
    </div>
</div>