<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("Location: Index.php");
        exit();
    }
?>
