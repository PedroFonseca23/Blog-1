<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redireciona para o login se não estiver logado
    exit();
}


?>

<a href="logout.php">Sair</a>  

<?php
include('includes/db.php');  // Inclui a conexão com o banco
include('includes/header.php');  // Cabeçalho da área de admin

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Insere o post no banco de dados
    $query = $pdo->prepare('INSERT INTO posts (title, content) VALUES (?, ?)');
    $query->execute([$title, $content]);

    echo "Post adicionado com sucesso!";
}

?>

<h1>Adicionar Novo Post</h1>
<form method="POST">
    <label for="title">Título</label><br>
    <input type="text" name="title" required><br><br>

    <label for="content">Conteúdo</label><br>
    <textarea name="content" required></textarea><br><br>

    <button type="submit">Adicionar Post</button>
</form>

<?php include('includes/footer.php'); ?>
