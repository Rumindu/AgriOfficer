
<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/components/topnavbarlogin.php';?>

<div class="form-container">
    <div class="form-header">
        <center><h1><h1>User Login</h1></h1></center>
        <p><b>Please fill the correct credentials to login.</b></p>
    </div>
    <form action="" method="POST">
        
        <!-- email -->
        <label class="form-input-title">Email</label>
        <input type="text" name="email" id="email" class="email" value="<?php echo $data['email'];?>">
        <div class="error-wrapper"><span class="form-invalid"><?php echo $data['email_err'];?></span></div>
        <br>

        <!-- password -->
        <label class="form-input-title">Password</label>
        <input type="password" name="password" id="password" class="password" value="<?php echo $data['password'];?>">
        <div class="error-wrapper"><span class="form-invalid"><?php echo $data['password_err'];?></span></div>

        <br>
        <div class="btn-wrapper">
            <input type="submit" value="Login" class="login-btn">
        </div>
    </form>
    <?php flash('reg_flash');?>
    </div>
</div>

<?php
require APPROOT . '/views/inc/footer.php';?>