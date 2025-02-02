<?php
session_start();
session_regenerate_id(true);
function saveSession($name,$email) : void {
    $_SESSION['userName']=$name;
    $_SESSION['userEmail']=$email;
}