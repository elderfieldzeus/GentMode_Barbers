<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: ../../../../gentmodebarber/index.html');
    exit();
}
