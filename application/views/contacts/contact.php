<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Contact</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<div class="container" id="container">
    <h1><?php echo $title ?></h1>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div id="message"></div>
        <?php echo form_open('contact/contactSubmit', array('id' => 'contactForm')) ?>
        <div class="form-group">
            <input type="text" name="name" id="name" class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
            <input type="text" name="email" id="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info">Send Message</button>
        </div>
        <?php echo form_close() ?>
    </div>
</div>
</div>
    <script>
    $(function() {
        $("#contactForm").on('submit', function(e) {
            e.preventDefault();

            var contactForm = $(this);

            $.ajax({
                url: contactForm.attr('action'),
                type: 'post',
                data: contactForm.serialize(),
                success: function(response){
                    console.log(response);
                    if(response.status == 'success') {
                        $("#contactForm").hide();
                    }

                    $("#message").html(response.message);

                }
            });
        });
    });
</script>
</body>
</html>