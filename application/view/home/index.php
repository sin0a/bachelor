</body>
<body style="background-image: url(/public/img/1611421.jpeg); -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
  <br>
  <br>
  <br>
  <br>
    <div class="container" style="border: none;">
        <h1 style="color: #ffffff; text-align: center; font-size: 100px; margin: 40px;">Working title</h1>
        <div class="container-fluid" style="max-width: 450px;">
        <div class="col-6 col-lg-4" style="float: right;">
            <form id ="target" action="<?=URL_PROTOCOL.URL_DOMAIN.'/upload/' ?>" method="post" enctype="multipart/form-data">
                <h2 style="color: #ffffff;">Local</h2>
                <label class="btn btn-primary">
                    Select file
                    <input class="file" type="file" name="fileToUpload" action="submit" id="fileToUpload" style="display: none;"/> 
                </label>
	       </form>
        </div>
        <div class="col-6 col-lg-4" style="float: left; ">
            <form id ="url" action="<?=URL_PROTOCOL.URL_DOMAIN.'/upload/url/' ?>" method="post" enctype="multipart/form-data">
                <h2 style="color: #ffffff;">Link</h2>
                    <label for="usr">
                        <input type="text" name="urlToUpload" class="form-control" id="urlToUpload">
                    </label>
            </form>
        </div>
    </div>
</div>