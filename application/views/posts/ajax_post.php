<?php foreach($posts as $post){ ?>
<div>
	<h3><a href=""><?php echo $post->title ?></a></h3>
	<p><?php echo $post->description ?></p>	
</div>
<?php } ?>