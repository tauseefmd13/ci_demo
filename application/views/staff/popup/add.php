
<div class="modal fade rotate" id="add-staff" style="display:none;">
    <div class="modal-dialog modal-lg"> 
        <form id="add-staff-form" method="post">   
            <div class="modal-content panel panel-primary">
                <div class="modal-header panel-heading">
                    <h4 class="modal-title -remove-title">Add Staff</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control input-staff-firstname" id="name-name" placeholder="Name">
                            </div>
                        </div>                        
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="email" class="form-control input-staff-email" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="address" class="form-control input-staff-address" id="address" placeholder="Address">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="mobile" class="form-control input-staff-contactno" id="mobile" placeholder="Mobile No">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="number" name="salary" class="form-control input-staff-salary" id="salary" placeholder="Salary">
                            </div>
                        </div>
                    </div>        
                </div>
                <div class="modal-footer panel-footer">
                    <div class="row">
                        <div class="col-sm-12">                            
                            <button type="button" class="btn rkmd-btn btn-success" data-addempid="" id="add-staff">Add</button> 
                            <button type="button" class="btn rkmd-btn btn-danger" data-dismiss="modal">Close</button>
                        </div>                    
                    </div>
                </div>
            </div>
        </form>      
    </div>
</div>
