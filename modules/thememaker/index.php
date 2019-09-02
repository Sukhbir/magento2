<?php
/**
 * programm To create Theme.
 */
?>
<html>
    <head>
        <title>Theme Generator</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <script src="assets/js/jquery.js"></script>
        <script>

            //Function to the get the Home page Data
            $(document).ready(function() {
                $.ajax({
                    url: "directory.php",
                    type: "POST",
                    data: {"body_theme_data": "body_theme_data"},
                    success: function (data) {
                        $('body').html(data);
                    }
                });
                $.ajax({
                    url: "directory.php",
                    type: "POST",
                    data: {"firstform": "firstform"},
                    success: function (data) {
                        $('#path_sheet').html(data);
                    }
                });
                
            });

           
            //Function to the dire corrospondence Directory Listening
            function dataget(value, i){
                var parentTag = $( i ).parent().attr('id');
                dataset = value;
                $.ajax({
                    url: "directory.php",
                    type: "POST",
                    data: {"submit" : dataset},
                    success: function(data){
                        $('#'+parentTag).html(data);
                    }
                });
            }

            //addrow function for directory
            function addrow() {
                $.ajax({
                    url: "directory.php",
                    type: "POST",
                    data: {"addrow" : "addrow"},
                    success: function(data){
                        $('#path_sheet').append(data);
                    }
                });
            }

            //submit the form data
            function sendform(){
                main_form = $('#main_form').serialize();
                filepaths = $('#path_sheet').serializeArray();
                $.ajax({
                    url: "directory.php",
                    type: "POST",
                    data: {filepaths:filepaths,
                        main_form:main_form
                    },
                    beforeSend: function() {
                        $('#loading-image').show();
                    },
                    success: function(data){
                        $('body').append(data);
                    },
                    complete: function() {
                        $('#loading-image').hide();
                    }
                });
            }


            $('.alert').load(function () {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            })


        </script>
    </head>
</html>

