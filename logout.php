<?php
session_start();
if (empty($_SESSION['id'])) {
    header('location: logins.php');
    exit;
}

include('dbcon.php');
session_destroy();
?>

<!DOCTYPE html>
<html>

<body>
    <div style="width: 150px; margin: auto; height: 500px; margin-top: 300px;"></div>

    <progress max="100"><strong>Progress: 60% done.</strong></progress><br>
    <span class="itext">Logging out, please wait!...</span>

    <?php
    echo '<meta http-equiv="refresh" content="2;url=logins.php">';
    ?>
</body>
</html>
