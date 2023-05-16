    <div style="clear:both;color:#aaa; padding:20px;">

        <hr />
        <center>&copy; <?php echo date('Y'); ?> Hospital Management System</center>

    </div>

    <script>
        $("#image-upload").on("change", function() {
            /* Current this object refer to input element */
            var $input = $(this);
            var reader = new FileReader();
            reader.onload = function() {
                $("#image-container").attr("src", reader
                    .result);
            }
            reader.readAsDataURL($input[0].files[0]);
        });
    </script>