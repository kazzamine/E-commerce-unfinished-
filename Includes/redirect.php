<?php
require_once './config.inc.php';
//check if signed in
if(!isset($_SESSION['id'])){
    header("Location:login.php?location=" . urlencode($_SERVER['REQUEST_URI']));
}