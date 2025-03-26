<html>
<body>
    <?php
    if (isset($_COOKIE["uname"]))
        echo "Welcome " . $_COOKIE["uname"] . "!<br />";
    else
        echo "You are not logged in!<br />";
    ?>
</body>
</html>