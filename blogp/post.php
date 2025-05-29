<?php
include('includes/db.php');  // Inclui a conexão com o banco
include('includes/header.php');  // Cabeçalho

// Verifica se o parâmetro 'id' foi passado pela URL
if (!isset($_GET['id'])) {
    die('Post não encontrado.');
}

$id = (int)$_GET['id'];

// Busca o post com o id fornecido
$query = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
$query->execute(['id' => $id]);
$post = $query->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    die('Post não encontrado.');
}
?>

<h1><?php echo htmlspecialchars($post['title']); ?></h1>
<p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
<small>Publicado em: <?php echo $post['created_at']; ?></small>

<?php include('includes/footer.php'); ?>
