<?php
    session_start();

    session_destroy();

    echo "<script>window.open('../pages/index.html','_self')</script>"
?>