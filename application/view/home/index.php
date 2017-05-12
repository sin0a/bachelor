</body>
<body style="background-image: url(/public/img/7509976.jpeg); -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover; overflow-x: hidden; 
    overflow-y: hidden; background-repeat: no-repeat;">
    <div class="container" style="border: none;">
        <h1 style="color: #ffffff; text-align: center; font-size: 60px; margin: 40px;">The Online Image API</h1>
        <br>
        <div class="container-fluid" style="max-width: 750px;">
        <form id ="target" action="<?=URL_PROTOCOL.URL_DOMAIN.'/upload/' ?>" method="post" enctype="multipart/form-data">
            <div class="col-6 col-lg-4" style="margin-left: 100px;   background: rgba(0,0,0,0.5); min-height: 150px; min-width: 150px; border-radius: 25px;">
            
                <h2 style="color: #ffffff; text-align: center;">Select a file</h2><br>
                <input type="submit" class="btn btn-success" id="go" value="Go!" style="margin-left: 35%; font-size: 20px; display: none;">
                <label class="btn btn-primary" id="choose" value="Select file" style="margin-left: 28%; ">
                    Select file
                    <input class="file" type="file" name="fileToUpload" action="submit" id="fileToUpload" style="display: none;"/> 
                </label>
            </div>
        </form>
        <div class="col-6 col-lg-4" style="margin-left: 40px; background-color: #000000;  background: rgba(0,0,0,0.5); min-height: 150px; min-width: 150px; border-radius: 25px; text-align: center;">
            <form id ="url" action="<?=URL_PROTOCOL.URL_DOMAIN.'/upload/url/' ?>" method="post" enctype="multipart/form-data">
                <h2 style="color: #ffffff;">Image from link</h2><br>
                 <input type="submit" class="btn btn-success" id="goUrl" value="Go!" style="float: right; font-size: 17px; display: none;">
                    <label id="urlLabel" for="usr">
                        <input type="text" name="urlToUpload" class="form-control" id="urlToUpload">
                    </label>
            </form>
        </div>
    </div>
</div>