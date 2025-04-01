<?php
$arquivoCadastrados = "livros_cadastrados.txt";
$arquivoSolicitados = "livros_solicitados.txt";
$livros = file_exists($arquivoCadastrados) ? file($arquivoCadastrados, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["livro"])) {
    $livro = trim($_POST["livro"]);
    $arquivo = fopen($arquivoSolicitados, "a");

    if ($arquivo) {
        fwrite($arquivo, $livro . PHP_EOL);
        fclose($arquivo);

        echo "<script>alert('Livros solicitado realizado com sucesso!'); window.location.href='livros_solicitados_prof.php';</script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros Cadastrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/login.css">
</head>
<body class="d-flex flex-column justify-content-center align-items-center vh-100">
    <div class="p-4 border rounded shadow-sm text-center" style="width: 400px;">
        <h4 class="mb-3">Livros Cadastrados</h4>
        <ul class="list-group">
            <?php if (!empty($livros)): ?>
                <?php foreach ($livros as $livro): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3 gap-5">
                        <?= htmlspecialchars($livro) ?>
                        <form action="" method="post" class="d-flex">
                            <input type="hidden" name="livro" value="<?= htmlspecialchars($livro) ?>">
                            <button type="submit" class="btn btn-sm btn-success">Solicitar</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li class="list-group-item text-center">Nenhum livro cadastrado.</li>
            <?php endif; ?>
        </ul>
        <a href="dashBoard_professor.php" class="btn btn-primary w-100 mt-3">Voltar</a>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
