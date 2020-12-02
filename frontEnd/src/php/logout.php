<?php
    session_start();
    
    session_destroy();

    echo "<script>window.open('../pages/login.html','_self')</script>"
?>