<?php
//start or continue with current session
session_start();

// destroy current session
session_destroy();

// redirect to login form
header('refresh:0;url=signin.html');
?>