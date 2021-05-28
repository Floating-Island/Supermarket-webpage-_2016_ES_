<?php
    session_start();
    if(! isset( $_SESSION['Start_Activity_Time'] ) )
        $_SESSION['Start_Activity_Time'] = time();
?>