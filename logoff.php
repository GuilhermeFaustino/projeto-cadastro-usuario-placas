<?php
    ob_start();
    unset($_SESSION['$autUser']);
    header('Location: index.php');
    ob_end_flush();
?>