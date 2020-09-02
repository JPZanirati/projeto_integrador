<?php
try {
    $host = "localhost";
    $dbname = "site_joao";
    $user = "joao";
    $pass = "MjQwZTZjZTJkOWQ3N2QwNTM0N2JiMGJi";
    $conn = new PDO("mysql:host=${host};dbname=${dbname}", $user, $pass);
} catch (PDOException $e) {
    $erro = "Erro de Conexão" . $e->getMessage();
}
