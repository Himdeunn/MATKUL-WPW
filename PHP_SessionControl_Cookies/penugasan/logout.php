<?php
    setcookie("username", "", time() - 3600, "/");
    setcookie("nrp", "", time() - 3600, "/");
    header("Location: login.php");
    exit();
?>
