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

// Busca o post para edição
$query = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
$query->execute(['id' => $id]);
$post = $query->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    die('Post não encontrado.');
}

// Processa a atualização do post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $updateQuery = $pdo->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
    $updateQuery->execute([$title, $content, $id]);

    header('Location: admin.php'); // Redireciona após a edição
    exit();
}
?>

<h1>Editar Post</h1>
<form method="POST">
    <label for="title">Título</label><br>
    <input type="text" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required><br><br>

    <label for="content">Conteúdo</label><br>
    <textarea name="content" required><?php echo htmlspecialchars($post['content']); ?></textarea><br><br>

    <button type="submit">Salvar Alterações</button>
</form>
