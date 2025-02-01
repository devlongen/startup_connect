<?php

$conn = new mysqli("database", "adminSC", "password", "startup_connect", 3306);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

return $conn;