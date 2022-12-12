<?php
    $name = $staffInfo['name'] ? $staffInfo['name'] : '';
    $email = $staffInfo['email'] ? $staffInfo['email'] : '';
    $address = $staffInfo['address'] ? $staffInfo['address'] : '';
    $mobile = $staffInfo['mobile'] ? $staffInfo['mobile'] : '';
    $salary = $staffInfo['salary'] ? $staffInfo['salary'] : '';
?>
<div class="row">   
    <div class="col-lg-12">
        <p><strong>Name: </strong><?php print $name?></p>
        <p><strong>Email: </strong><?php print $email?></p>
        <p><strong>Address: </strong><?php print $address?></p>
        <p><strong>Phone: </strong><?php print $mobile?></p>
        <p><strong>Salary: </strong><?php print $salary?></p>
    </div>
</div><!-- /.row -->
