<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["livro"])) {
    $livro = trim($_POST["livro"]);
    $arquivoSolicitados = "livros_solicitados.txt";

    $arquivo = fopen($arquivoSolicitados, "a");

    if ($arquivo) {
        fwrite($arquivo, $livro . PHP_EOL); 
        fclose($arquivo);
    }

    header("Location: livros_cadastrados_prof.php");
    exit;
}