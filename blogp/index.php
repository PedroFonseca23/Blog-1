<?php
include('includes/db.php');  // Inclui a conexão com o banco
include('includes/header.php');  // Cabeçalho (navbar, etc.)

// Busca os posts no banco de dados
$query = $pdo->query('SELECT * FROM posts ORDER BY created_at DESC');
$posts = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Blog Pessoal</h1>
<?php foreach ($posts as $post): ?>
    <div class="post">
        <h2><a href="post.php?id=<?php echo $post['id']; ?>"><?php echo htmlspecialchars($post['title']); ?></a></h2>
        <p><?php echo substr($post['content'], 0, 200); ?>...</p>
        <small>Publicado em: <?php echo $post['created_at']; ?></small>
    </div>
<?php endforeach; ?>

<?php include('includes/footer.php'); ?>
