<?php
$arquivo = "livros_cadastrados.txt";


if (file_exists($arquivo)) {
    $livros = file($arquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
} else {
    $livros = [];
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros Cadastrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style/login.css">
</head>
<body class="d-flex flex-column justify-content-center align-items-center vh-100">
    <div class="p-4 border rounded shadow-sm text-center" style="width: 300px;">
        <h4 class="mb-3">Livros Cadastrados</h4>
        <ul class="list-group list-group-flush">
            <?php if (!empty($livros)): ?>
                <?php foreach ($livros as $livro): ?>
                    <li class="list-group-item"> <?php echo htmlspecialchars($livro); ?> </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li class="list-group-item">Nenhum livro cadastrado.</li>
            <?php endif; ?>
        </ul>
        <a href="dashboard_biblio.php" class="btn btn-primary w-100 mt-3">Voltar</a>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>