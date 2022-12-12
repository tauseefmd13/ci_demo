<?php
    $id = $staffInfo['id'] ? $staffInfo['id'] : '';
    $name = $staffInfo['name'] ? $staffInfo['name'] : '';    
    $email = $staffInfo['email'] ? $staffInfo['email'] : '';
    $address = $staffInfo['address'] ? $staffInfo['address'] : '';
    $mobile = $staffInfo['mobile'] ? $staffInfo['mobile'] : '';
    $salary = $staffInfo['salary'] ? $staffInfo['salary'] : '';
?>
<input type="hidden" name="staff_id" value="<?php print $id; ?>">
<div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <input type="text" name="name" class="form-control input-staff-firstname" id="name" placeholder="Name" value="<?php print $name; ?>">
            </div>
        </div>        
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <input type="text" name="email" class="form-control input-staff-email" id="email" placeholder="Email" value="<?php print $email; ?>">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <input type="text" name="address" class="form-control input-staff-address" id="address" placeholder="Address" value="<?php print $address; ?>">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <input type="text" name="mobile" class="form-control input-staff-mobile" id="mobile" placeholder="mobile No" value="<?php print $mobile; ?>">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <input type="text" name="salary" class="form-control input-staff-salary" id="salary" placeholder="Salary" value="<?php print $salary; ?>">
            </div>
        </div>
    </div>