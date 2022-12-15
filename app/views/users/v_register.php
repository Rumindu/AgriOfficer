
<?php 
require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/components/topnavbarlogin.php';?>

<div class="form-container">
    <div class="form-header">
        <center><h1><h1>User Signup</h1></h1></center>
        <p><b>Please fill the form register</b></p>
    </div>
    <form action="<?php echo URLROOT?>/Users/register" method="POST">
        <!-- name -->
        <div class="form-input-title">Name</div>
        <input type="text" name="name" id="name" class="name" value="<?php echo $data['name'];?>">
        <div class="error-wrapper"><span class="form-invalid"><?php echo $data['name_err'];?></span></div>
        <br>

        <!-- email -->
        <div class="form-input-title">Email</div>
        <input type="text" name="email" id="email" class="email" value="<?php echo $data['email'];?>">
        <div class="error-wrapper"><span class="form-invalid"><?php echo $data['email_err'];?></span></div>
        <br>

        <!-- password -->
        <label class="form-input-title">Password</label>
        <input type="password" name="password" id="password" class="password" value="<?php echo $data['password'];?>">
        <span class="form-invalid"><?php echo $data['password_err'];?></span>
        <br>

        <!-- confirm password -->
        <label class="form-input-title">Confirm password</label>
        <input type="password" name="confirm_password" id="confirm_password" class="confirm_password" value="<?php echo $data['confirm_password'];?>">
        <div class="error-wrapper"><span class="form-invalid"><?php echo $data['confirm_password_err'];?></span></div>
        <br>

        <div class="btn-wrapper">
            <input type="submit" value="Register" class="register-btn">
        </div>

    </form>
</div>

<?php
require APPROOT . '/views/inc/footer.php';?>