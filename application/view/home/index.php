</body>
<body style="background-image: url(/public/img/7509976.jpeg); -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover; overflow-x: hidden; 
    overflow-y: hidden;">
    <div class="container" style="border: none;">
        <h1 style="color: #ffffff; text-align: center; font-size: 60px; margin: 40px;">The Online Image API</h1>
        <br>
        <div class="container-fluid" style="max-width: 750px;">
        <div class="col-6 col-lg-4" style="margin-left: 100px; background-color: #000000;  background: rgba(0,0,0,0.5); min-height: 150px; min-width: 150px; border-radius: 25px;">
            <form id ="target" action="<?=URL_PROTOCOL.URL_DOMAIN.'/upload/' ?>" method="post" enctype="multipart/form-data">
                <h2 style="color: #ffffff; text-align: center;">Select a file</h2><br>
                <label class="btn btn-primary" style="margin-left: 25%;">
                    Select file
                    <input class="file" type="file" name="fileToUpload" action="submit" id="fileToUpload" style="display: none;"/> 
                </label>
	       </form>
        </div>
        <div class="col-6 col-lg-4" style="margin-left: 40px; background-color: #000000;  background: rgba(0,0,0,0.5); min-height: 150px; min-width: 150px; border-radius: 25px; text-align: center;">
            <form id ="url" action="<?=URL_PROTOCOL.URL_DOMAIN.'/upload/url/' ?>" method="post" enctype="multipart/form-data">
                <h2 style="color: #ffffff;">Image from link</h2><br>
                    <label for="usr">
                        <input type="text" name="urlToUpload" class="form-control" id="urlToUpload">
                    </label>
            </form>
        </div>
    </div>
    <label class="btn btn-success" id="go" style="opacity: none; margin: 100px; margin-left: 45%; display: none;">
    <p style="margin: 5px; font-size: 20px;">Go!</p>
    </label>
</div>