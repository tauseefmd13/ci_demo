<!DOCTYPE html>
<html>
  <head>
    <title>Dynamically Add New Option in Select2 using Ajax in PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    	<!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    
    <link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  </head>
  <body>
  	<div class="container">
  		<br />
  		<br />
    	<h1 align="center">Dynamically Add New Option Tag in Select2 using Ajax in PHP</h1>
    	<br />
    	<br />	
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <select name="category" id="category" class="form-control form-control-lg select2">
            <?php
            foreach($results as $row)
            {
              echo '<option value="'.$row->category_name.'">'.$row->category_name.'</option>';
            }
            ?>
          </select>
        </div>
      </div> 
    </div>
  </body>
</html>

<script>

$(document).ready(function(){

  $('.select2').select2({
    placeholder:'Select Category',
    theme:'bootstrap4',
    tags:true,
  }).on('select2:close', function(){
    var element = $(this);
    var new_category = $.trim(element.val());

    if(new_category != '')
    {
      $.ajax({
        url:"<?php echo base_url(); ?>category/add",
        method:"POST",
        data:{category_name:new_category},
        success:function(data)
        {
          if(data == 'yes')
          {
            element.append('<option value="'+new_category+'">'+new_category+'</option>').val(new_category);
          }
        }
      })
    }

  });

});

</script>