<?php
$host = 'localhost';  // Endereço do servidor (normalmente localhost)
$dbname = 'blog';     // Nome do banco de dados
$username = 'root';   // Usuário do banco de dados
$password = '';       // Senha do banco (por padrão no XAMPP é vazio)

try {
    // Conexão com o banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro ao conectar: ' . $e->getMessage();
}
?>
