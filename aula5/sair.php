<?php
session_start();
session_destroy();
header("Location: novo.php");
exit();
?>
