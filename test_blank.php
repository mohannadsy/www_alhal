<?php
include('include/nav.php');

echo get_auto_code($con , 'accounts' , 'code' , 'acc_');
include('include/footer.php');
?>