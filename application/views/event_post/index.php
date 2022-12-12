<!-- File upload form -->
<form method="post" action="<?php echo base_url('event_post/uploadImage');?>" enctype="multipart/form-data">
    <div class="form-group">
        <label>Choose Files</label>
        <input type="file" class="form-control" name="attachment[]" multiple/>
    </div>
    <div class="form-group">
        <input class="form-control" type="submit" name="fileSubmit" value="UPLOAD"/>
    </div>
</form>