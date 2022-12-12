<?php
$this->load->view('templates/header');
?>
<style>
    .dataTables_filter { display: none; }
    .dataTables_wrapper .dt-buttons {
        float:right;  
        text-align:center;
        font-size:12px;
    }
    .dataTables_paginate{
        font-size:10px;
        margin-bottom:5px;
    }
    .dataTables_length{
        font-size:12px;
        margin-bottom:5px;    
    }
    .dataTables_info{
        font-size:12px;
    }
</style>
<section class="showcase">
    <div class="container">
        <div class="pb-2 mt-4 mb-2 border-bottom">
        <h2>Example: Datatables Add Edit Delete with CodeIgniter and Ajax</h2>
      </div>
      <div class="row">
          <div class="col-lg-12"><span id="success-msg"></div>
      </div>
        <div class="row">
            <div class="col-lg-12">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#add-staff" class="float-right btn btn-primary btn-sm" style="margin: 4px;"><i class="fa fa-plus"></i> Add</a>              
            </div>
        </div>
        <div class="row">   
        </div>
        <div class="">
            <table id="staffListing" class="table table-bordered table-hover small"> 
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact No</th>
                        <th scope="col">Address</th>
                        <th scope="col">Salary</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead> 
                <tbody> 
                </tbody> 
               
            </table>
        </div>
    </div>
</div>
</section>

<?php
$this->load->view('staff/popup/display');
$this->load->view('staff/popup/edit');
$this->load->view('staff/popup/add');
$this->load->view('staff/popup/delete');
$this->load->view('templates/footer');
?>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('#staffListing').dataTable({
			"lengthChange": false,
            "paging": true,
            "processing": false,
            "serverSide": true,
            "order": [],            
            "ajax": {
                "url": baseurl+"staff/getStaffListing",
                "type": "POST",
                "data": function ( data ) {
                    data.name = $('#name_filter').val();
                    data.email = $('#email_filter').val();
                    data.mobile = $('#contact_filter').val();
                    data.address = $('#address_filter').val();
                }
            },
            
            "columns": [
                {
                    "bVisible": false, "aTargets": [0]
                },
                null,
                null,
                null,
                null,
                null,
                {
                    mRender: function (data, type, row) {
                        var bindHtml = '';
                        bindHtml += '<a data-toggle="modal" data-target="#dispaly-staff" href="javascript:void(0);" title="View staff" class="display-staff ml-1 btn-ext-small btn btn-sm btn-info"  data-staffid="' + row[0] + '"><i class="fas fa-eye"></i></a>';
                        bindHtml += '<a data-toggle="modal" data-target="#update-staff" href="javascript:void(0);" title="Edit Staff" class="update-staff-details ml-1 btn-ext-small btn btn-sm btn-primary"  data-staffid="' + row[0] + '"><i class="fas fa-edit"></i></a>';
                        bindHtml += '<a data-toggle="modal" data-target="#delete-staff" href="javascript:void(0);" title="Delete Stff" class="delete-staff-details ml-1 btn-ext-small btn btn-sm btn-danger" data-staffid="' + row[0] + '"><i class="fas fa-times"></i></a>';
                        return bindHtml;
                    }
                },
                
            ],
            "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                $(nRow).attr('id', aData[0]);
            }
        });        
        function filterGlobal(v) {
            jQuery('#staffListing').DataTable().search(
                    v,
                    false,
                    false
                    ).draw();
        }
        jQuery('input.global_filter').on('keyup click', function () {
            var v = jQuery(this).val();    
            filterGlobal(v);
        });
        jQuery('input.column_filter').on('keyup click', function () {
            jQuery('#staffListing').DataTable().ajax.reload();
        });
    });
</script>


