<!DOCTYPE html>
<html>
<head>
	<title>PHP Codeigniter load more data on page scroll</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<div class="container">
	<h2 class="text-center">PHP Codeigniter 3 - load more data with infinite scroll pagination</h2>
	<br/>
	<div class="col-md-12" id="ajax-post-container">
		<?php
		  $this->load->view('posts/ajax_post', $posts);
		?>
	</div>
</div>


<div class="loader" style="display:none">
	<img src="<?php echo base_url('assets/images/loader.gif')?>">
</div>


<script type="text/javascript">
	var page = 1;
	var total_pages = '<?php echo $count;?>';
 
	$(window).scroll(function() {
	    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
	        page++;
	        if(page < total_pages) {
	        	loadMore(page);
	        }
	    }
	});


	function loadMore(page){
	  $.ajax(
	        {
	            url: '?page=' + page,
	            type: "GET",
	            beforeSend: function()
	            {
	                $('.loader').show();
	            }
	        })
	        .done(function(data)
	        {	           
	            $('.loader').hide();
	            $("#ajax-post-container").append(data);
	        });
	}
</script>


</body>
</html>