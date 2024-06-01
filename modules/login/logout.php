<?php

unset($_SESSION['logged_user']);
unset($_SESSION['login']);
unset($_SESSION['role']);
session_start();
setcookie(session_name(), '', time() - 60, "/");
header("location: " . HOST);