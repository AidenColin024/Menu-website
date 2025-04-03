<?php
session_start();
session_destroy();
header("Location: Inlog.php");
exit();
?>