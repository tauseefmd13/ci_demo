<div class="modal fade rotate" id="delete-staff" style="display:none;">
    <div class="modal-dialog" style="width: 24%;"> 
        <form id="delete-staff-form" method="post">   
            <div class="modal-content panel panel-primary">
                <div class="modal-header panel-heading">
                    <h4 class="modal-title -remove-title">Delete Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body panel-body">
                    <div class="row">        
                        <div class="col-sm-12" style="min-height:50px;">
                            <span>Are you sure you want to delete this?</span>
                        </div>
                    </div>        
                </div>
                <div class="modal-footer panel-footer">
                    <div class="row">
                        <div class="col-sm-12">
							<input type="hidden" name="staff_id" id="staff_id">						
                            <button type="button" class="btn rkmd-btn btn-success" id="delete-staff">Yes</button> 
                            <button type="button" class="btn rkmd-btn btn-danger" data-dismiss="modal">No</button>
                        </div>                    
                    </div>
                </div>
            </div>
        </form>      
    </div>
</div>
