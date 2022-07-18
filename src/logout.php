<?php
session_start();
unset($_SESSION["isLoggedIn"]);
unset($_SESSION["name"]);
unset($_SESSION["id"]);
header("Location:index.php");
