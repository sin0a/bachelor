
    <footer class="footer">
    <!-- jQuery, loaded in the recommended protocol-less way -->
    <!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
    <script type="text/javascript">
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {

            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

    $(document).ready(
    function(){

        /* Funksjoner som åpner boksene, en for hver boks:*/
        $('.numbersOnly').keyup(function () {
            if (this.value != this.value.replace(/[^0-9\.]/g, '')) {
                this.value = this.value.replace(/[^0-9\.]/g, '');
            }
            if(parseInt(this.value) > 100){
                this.value = 100;
            }
            else if (this.value.indexOf(".") == 0 ||this.value.indexOf(".") == 1 || this.value.indexOf(".") == 2 || this.value.indexOf(".") == 3) {
                this.value = ''; 
            }
        });

        $('.resizeOnly').keyup(function () {
            if (this.value.indexOf("a") == 0){
                 this.value = "auto";
                 if(this.value.indexOf("a") == 0 && this.value.indexOf("u") == 1 && this.value.indexOf("t") == 2 && this.value.indexOf("o") != 3){
                    this.value = "";
                 }
            } else{ 
                if (this.value != this.value.replace(/[^0-9\.]/g, '')) {
                    this.value = this.value.replace(/[^0-9\.]/g, '');
                }
                else if (this.value.indexOf(".") == 0 ||this.value.indexOf(".") == 1 || this.value.indexOf(".") == 2 || 
                    this.value.indexOf(".") == 3 || this.value.indexOf(".") == 4|| this.value.indexOf(".") == 5 || this.value.indexOf(".") == 6) {
                    this.value = ''; 
                }
                if(this.value.length > 5){
                    this.value = '';
                }
            }
        });

        $('.degreesOnly').keyup(function () {
            if ($.isNumeric(this.value) === true) {
                if(parseInt(this.value) > 365){
                    this.value = 365;
                }
                else if(parseInt(this.value) < -365){
                    this.value = -365;
                }
            } 
            else if(this.value == "-" && this.value.length() > 1){
                if($.isNumeric(this.value) === false){
                    this.value = this.value.replace(/[^0-9\.]/g, '');
                }
            } else if($.isNumeric(this.value) === false){
                this.value = this.value.replace(/[^0-9\.]/g, '');
            }
            if (this.value.indexOf(".") == 0 ||this.value.indexOf(".") == 1 || this.value.indexOf(".") == 2 || this.value.indexOf(".") == 3 || this.value.indexOf(".") == 4) {
                this.value = ''; 
            }
        });


        $('.decimalsOnly').keyup(function () {
            if (this.value != this.value.replace(/[^0-9\.]/g, '')) {
                this.value = this.value.replace(/[^0-9\.]/g, '');
            }
            if(this.value > 25.0){
                this.value = 25.0;
            }
            else if (this.value.indexOf(".") == 0 ) {
                this.value = '';
            }
            else if(this.value.length > 4){
                this.value = '';
            } 
        });

        $('.numbersNegative').keyup(function () {
            if ($.isNumeric(this.value) === true) {
                if(parseInt(this.value) > 100){
                    this.value = 100;
                }
                else if(parseInt(this.value) < -100){
                    this.value = -100;
                }
            } 
            else if(this.value == "-" && this.value.length() > 1){
                if($.isNumeric(this.value) === false){
                    this.value = this.value.replace(/[^0-9\.]/g, '');
                }
            } else if($.isNumeric(this.value) === false){
                this.value = this.value.replace(/[^0-9\.]/g, '');
            }
            if (this.value.indexOf(".") == 0 ||this.value.indexOf(".") == 1 || this.value.indexOf(".") == 2 || this.value.indexOf(".") == 3 || this.value.indexOf(".") == 4) {
                this.value = ''; 
            }
        });

        $('.flipOnly').keyup(function () {
            if (this.value === "v" || this.value === "h"){
            } else{
                this.value = "";
            } 
        });

        
        // Blur
        $('#btnBlur').click(function(){
        $('#blur').toggle();
        });
        $('#btnExecute').click(function(){
        $('#execute').toggle();
        });
        // Sharpen
        $('#btnSharpen').click(function(){
        $('#sharpen').toggle();
        $('#inputSharpen').numeric();
        });
        // Greyscale
        $('#btnGreyscale').click(function(){
        $('#greyscale').toggle();
        });
        // Brightness
        $('#btnBrightness').click(function(){
        $('#brightness').toggle();
        });
        // Contrast
        $('#btnContrast').click(function(){
        $('#contrast').toggle();
        });
        // Encode
        $('#btnEncode').click(function(){
        $('#encode').toggle();
        });
        // Fit
        $('#btnFit').click(function(){
        $('#fit').toggle();
        });
        // Resize
        $('#btnResize').click(function(){
        $('#resize').toggle();
        });
        // Gamma
        $('#btnGamma').click(function(){
        $('#gamma').toggle();
        });
        // Flip
        $('#btnFlip').click(function(){
        $('#flip').toggle();
        });
        // Pixelerate
        $('#btnPixelerate').click(function(){
        $('#pixelerate').toggle();
        });
        // Invert
        $('#btnInvert').click(function(){
        $('#invert').toggle();
        });
        // Rotate
        $('#btnRotate').click(function(){
        $('#rotate').toggle();
        });
        // Select file i index.php
        $('#fileToUpload').change(function() {
        $('#go').toggle();
        $('#choose').hide();
        });
        // Url i index.php
        $('#urlToUpload').change(function() {
        $('#goUrl').show();
        });
        // Zoom
        $('#btnZoomIn').click(function(){
        $('#img1').hide();
        $('#btnZoomIn').hide();
        $('#btnZoomIn2').show();
        $('#btnZoomOut').hide();
        $('#btnZoomOut2').show();
        $('#img2').show();
        });
        // Zoom
        $('#btnZoomIn2').click(function(){
        $('#img2').hide();
        $('#btnZoomIn2').hide();
        $('#btnZoomOut2').hide();
        $('#btnZoomOut3').show();
        $('#img3').show();
        });
        // Zoom
        $('#btnZoomIn3').click(function(){
        $('#img4').hide();
        $('#btnZoomIn2').hide();
        $('#btnZoomOut2').hide();
        $('#btnZoomOut3').show();
        $('#img1').show();
        });
        // Zoom
        $('#btnZoomIn3').click(function(){
        $('#img2').hide();
        $('#btnZoomIn2').hide();
        $('#btnZoomOut2').hide();
        $('#btnZoomOut3').show();
        $('#img3').show();
        });
        // Zoom
        $('#btnZoomOut2').click(function(){
        $('#img2').hide();
        $('#btnZoomIn2').hide();
        $('#btnZoomIn').show();
        $('#btnZoomOut2').hide();
        $('#btnZoomOut').show();
        $('#img1').show();
        });
        // Zoom
        $('#btnZoomOut3').click(function(){
        $('#img3').hide();
        $('#btnZoomIn2').show();
        $('#btnZoomOut3').hide();
        $('#btnZoomOut2').show();
        $('#img2').show();
        });
          // Zoom
        $('#btnZoomOut').click(function(){
        $('#img1').hide();
        $('#btnZoomIn').hide();
        $('#btnZoomIn4').show();
        $('#btnZoomOut').hide();
        $('#btnZoomOut4').show();
        $('#img4').show();
        });
        // Zoom
        $('#btnZoomIn4').click(function(){
        $('#img4').hide();
        $('#btnZoomIn4').hide();
        $('#btnZoomOut4').hide();
        $('#btnZoomOut').show();
        $('#btnZoomIn').show();
        $('#img1').show();
        });
         // Zoom
        $('#btnZoomOut4').click(function(){
        $('#img4').hide();
        $('#btnZoomIn4').hide();
        $('#btnZoomIn5').show();
        $('#btnZoomOut4').hide();
        $('#img5').show();
        });
        // Zoom
        $('#btnZoomIn5').click(function(){
        $('#img5').hide();
        $('#btnZoomIn5').hide();
        $('#btnZoomOut4').show();
        $('#btnZoomIn4').show();
        $('#img4').show();
        });
        // Form
        $("#btnSubmit").click(function() {
        $("#editform").submit();
        $("btnSubmit").hide();
        });


    });

    </script>
    <script>
        var url = "<?php echo URL; ?>";
    </script>

    <!-- our JavaScript -->
    <script src="<?php echo URL; ?>js/application.js"></script>
</footer>
</body>
</html>
