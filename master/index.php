<?php
session_start();
$_SESSION['login']='NULL';
header('Location: app/router/router.php?action=truc');