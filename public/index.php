<!-- .htaccess file redirect to public/.htaccess file then public/.htaccess redirect to public/index.php
public/index.php redirected to app/bootloarder.php  -->
<?php
require_once'../app/bootloader.php';

$init=new Core;