<?php
    session_start();
    unset($_SESSION["isLoggedIn"]);
    unset($_SESSION["name"]);
    header("Location:index.php");
