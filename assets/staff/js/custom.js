jQuery(document).on('click', 'a.display-staff', function(){
    var staff_id = jQuery(this).data('staffid');
    jQuery.ajax({
        type:'POST',
        url:baseurl+'staff/display',
        data:{staff_id: staff_id},
        dataType:'html',    
        beforeSend: function () {
            jQuery('#render-dispaly-data').html('<div class="text-center"><i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i></div>');
        },                      
        success: function (html) {
            jQuery('#render-dispaly-data').html(html);
			jQuery('#dispaly-staff').modal('show');
                                 
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }        
    });
});
jQuery(document).on('click', 'a.update-staff-details', function(){
    var staff_id = jQuery(this).data('staffid');	
    jQuery.ajax({
        type:'POST',
        url:baseurl+'staff/edit',
        data:{staff_id: staff_id},
        dataType:'html',    
        beforeSend: function () {
            jQuery('#render-update-data').html('<div class="text-center"><i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i></div>');
        },                      
        success: function (html) {			
            jQuery('#render-update-data').html(html);
			jQuery('#update-staff').modal('show');
                                 
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }        
    });
});
jQuery(document).on('click', 'a.delete-staff-details', function(){
    var staff_id = jQuery(this).attr('data-staffid');
	$('#delete-staff').on('shown.bs.modal', function (event) {	 
	  jQuery('#staff_id').val(staff_id);
	});
});
jQuery(document).on('click', 'button#delete-staff', function(){
    var staff_id = jQuery('#staff_id').val();
    jQuery.ajax({
        type:'POST',
        url:baseurl+'staff/delete',
        data:{staff_id: staff_id},
        dataType:'html',  
        success: function (html) {
			jQuery('span#success-msg').html('');
            jQuery('span#success-msg').html('<div class="alert alert-success">Deleted staff successfully.</div>');  
			jQuery('#staffListing').DataTable().ajax.reload();		
			jQuery('#delete-staff').modal('hide');			
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }        
    });
});
jQuery(document).on('click', 'button#add-staff', function(){
    jQuery.ajax({
        type:'POST',
        url:baseurl+'staff/save',
        data:jQuery("form#add-staff-form").serialize(),
        dataType:'json',    
        beforeSend: function () {
            jQuery('button#add-staff').button('loading');
        },
        complete: function () {
            jQuery('button#add-staff').button('reset');
            setTimeout(function () {
                jQuery('span#success-msg').html('');
            }, 5000);
            
        },                
        success: function (json) {
            $('.text-danger').remove();
            if (json['error']) {             
                for (i in json['error']) {
                    var element = $('.input-staff-' + i.replace('_', '-'));
                    if ($(element).parent().hasClass('input-group')) {                       
                        $(element).parent().after('<div class="text-danger" style="font-size: 14px;">' + json['error'][i] + '</div>');
                    } else {
                        $(element).after('<div class="text-danger" style="font-size: 14px;">' + json['error'][i] + '</div>');
                    }
                }
            } else {
                jQuery('span#success-msg').html('<div class="alert alert-success">Record added successfully.</div>');
                jQuery('#staffListing').DataTable().ajax.reload();
                jQuery('form#add-staff-form').find('textarea, input').each(function () {
                    jQuery(this).val('');
                });
                jQuery('#add-staff').modal('hide');
                
            }

        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }        
    });
});
jQuery(document).on('click', 'button#update-staff', function(){
    jQuery.ajax({
        type:'POST',
        url:baseurl+'staff/update',
        data:jQuery("form#update-staff-form").serialize(),
        dataType:'json',    
        beforeSend: function () {
            jQuery('button#update-staff').button('loading');
        },
        complete: function () {
            jQuery('button#update-staff').button('reset');
            setTimeout(function () {
                jQuery('span#success-msg').html('');
            }, 5000);
            
        },                
        success: function (json) {
            $('.text-danger').remove();
            if (json['error']) {             
                for (i in json['error']) {
                  var element = $('.input-staff-' + i.replace('_', '-'));
                  if ($(element).parent().hasClass('input-group')) {                       
                    $(element).parent().after('<div class="text-danger" style="font-size: 14px;">' + json['error'][i] + '</div>');
                  } else {
                    $(element).after('<div class="text-danger" style="font-size: 14px;">' + json['error'][i] + '</div>');
                  }
                }
            } else {
                jQuery('span#success-msg').html('<div class="alert alert-success">Record updated successfully.</div>');
                jQuery('#staffListing').DataTable().ajax.reload();
                jQuery('form#update-staff-form').find('textarea, input').each(function () {
                    jQuery(this).val('');
                });
                jQuery('#update-staff').modal('hide');
            }                       
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }        
    });
});