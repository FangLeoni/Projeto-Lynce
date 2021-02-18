<?php
    session_start();
    
    session_destroy();

    echo "<script>window.open('/frontEnd/src/pages/login.html','_self')</script>"
?>