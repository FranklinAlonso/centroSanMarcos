<?php
    session_start();
    unset($_SESSION['usuario']);
    header("location: ../Sesion/login.html");
?>