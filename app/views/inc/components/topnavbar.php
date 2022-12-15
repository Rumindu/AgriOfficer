<nav class="top-nav">
  <!-- <a class="active" href="#home">Home</a> -->
  <!-- <a href="<?php echo URLROOT ?>/Users/login">Login</a>
  <a href="<?php echo URLROOT ?>/Users/register">Register</a> -->
  <!-- <a href="#about">About</a> -->

    <div class="logo-wrapper">
      <img class="logo" src="<?php echo URLROOT ?>/public/img/navbar-logo-large.webp?>" alt="logo">
    </div>
    <div class="right-corner">
      <div class="btn-notification">

      </div>
      <div class="profile">
        <div class="name-container">
          <span> <b><?php echo $_SESSION['user_name']; ?></b> <br> Agri Officer </span>
        </div>
        <div class="profile-pic">
          <img class="avatar" src="<?php echo URLROOT ?>/public/img/avatar.png?>" alt="Profile">
        </div>
      </div>
    </div>
  </nav>

</div>