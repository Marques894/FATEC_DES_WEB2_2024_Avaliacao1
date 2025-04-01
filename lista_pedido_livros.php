<?php
$arquivoSolicitados = "livros_solicitados.txt";
$livrosSolicitados = file_exists($arquivoSolicitados) ? file($arquivoSolicitados, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros Solicitados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column justify-content-center align-items-center vh-100">
    <div class="p-4 border rounded shadow-sm text-center" style="width: 400px;">
        <h4 class="mb-3">Livros Solicitados</h4>

        <ul class="list-group">
            <?php if (!empty($livrosSolicitados)): ?>
                <?php foreach ($livrosSolicitados as $livro): ?>
                    <li class="list-group-item"><?= htmlspecialchars($livro) ?></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li class="list-group-item text-center">Nenhum livro solicitado.</li>
            <?php endif; ?>
        </ul>

        <a href="index.php" class="btn btn-primary w-100 mt-3">Voltar</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
