<?php
session_start();

$_SESSION['test'] = 'Session is working!';
echo 'Session test: ' . $_SESSION['test'];
?>