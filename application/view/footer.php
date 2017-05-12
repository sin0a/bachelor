
    <footer class="footer">
        <p style="color: #ffffff;">Dett er et bachelorprosjekt ved Høgskolen i Sørøst-Norge campus Bø</p>

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
        $('.img2').hide();
        $('.imgPxl').hide();
        $('.img3').hide();

        $('.file').change(
            function(){
                if ($(this).val()) {
                    $('input:submit').attr('disabled',false);
                    $('input:checkbox').attr('disabled',false);
                    // or, as has been pointed out elsewhere:
                    //$('input:submit').removeAttr('disabled'); 
                } 
            });
        $('.convert').click(
            function(){
                if($(this).is(':checked')){
                    $('select').attr('disabled',false);
                }
                else{
                    $('select').attr('disabled',true);
                }
            });
        $('.greyscale').click(
            function(){
                if($(this).is(':checked')){
                    $('.img1').hide();
                    $('.img2').show();
                }
                else{
                    $('.img2').hide();
                    $('.img1').show();
                }
            });
        $('.pxl').click(
            function(){
                if($(this).is(':checked')){
                    $('.imgPxl').show();
                    $('.img2').hide();
                    $('.img1').hide();
                }
                else{
                    $('.img2').hide();
                    $('.img1').show();
                    $('.imgPxl').hide();
                }
            });

        $('.slider').change(
            function(){
                $('.slider').val($(this).val());
                $('.img2').hide();
                $('.img1').hide();
                $('.imgPxl').hide();
                var id = $(this).val();

                if($('.greyscale').is(':checked')){
                    for (i = 0; i < 100; i++) { 
                    if(i != id){
                        $('.brgg'+i).hide();
                        $('.brg'+i).hide();
                    }
                else{
                    $('.brgg' + i).show();
                }}

                }
                else{
                for (i = 0; i < 100; i++) { 
                    if(i != id){
                        $('.brg'+i).hide();
                        $('.brgg'+i).hide();
                    }
                else{
                    $('.brg' + i).show();
                }}}


            });
        /* Funksjoner som åpner boksene, en for hver boks:*/
        // Blur
        $('#btnBlur').click(function(){
        $('#blur').toggle();
        });
        // Sharpen
        $('#btnSharpen').click(function(){
        $('#sharpen').toggle();
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
        $('#btnZoomOut').show();
        $('#img2').show();
        });
        // Zoom
        $('#btnZoomOut').click(function(){
        $('#img2').hide();
        $('#btnZoomOut').hide();
        $('#btnZoomIn').show();
        $('#img1').show();
        });

    });

    </script>
    <script>
        var url = "<?php echo URL; ?>";
    </script>

    <!-- our JavaScript -->
    <script src="<?php echo URL; ?>js/application.js"></script>
</body>
</html>
