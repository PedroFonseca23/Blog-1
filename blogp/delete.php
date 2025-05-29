<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include('includes/db.php');

// Verifica se o ID do post foi passado
if (!isset($_GET['id'])) {
    die('Post não encontrado.');
}

$id = (int)$_GET['id'];

// Exclui o post do banco de dados
$query = $pdo->prepare('DELETE FROM posts WHERE id = :id');
$query->execute(['id' => $id]);

header('Location: admin.php'); // Redireciona após a exclusão
exit();
?>