<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['login'])) {
        header("location: login.php");
        exit;
    } else {
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $editora = $_POST['editora'];
        $isbn = $_POST['isbn'];
        
        if (empty($titulo) || empty($autor) || empty($editora) || empty($isbn)) {    
            echo "<script>alert('Preencha todos os dados, por favor!');</script>";
        } else {
            $info = "$titulo | $autor | $editora | $isbn" . PHP_EOL;

            $handle = fopen("livros_cadastrados.txt", "a");
            fwrite($handle, $info);
            fclose($handle);
            
            echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='cadastro_livro.php';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="d-flex flex-column justify-content-center align-items-center vh-100">
    
    <div class="text-center">
        <h4 class="mb-4">Cadastrar Livros</h4>
        <form class="d-flex flex-column gap-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input class="form-control" type="text" name="titulo" placeholder="Título">
            <input class="form-control" type="text" name="autor" placeholder="Autor">
            <input class="form-control" type="text" name="editora" placeholder="Editora">
            <input class="form-control" type="number" name="isbn" placeholder="ISBN">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="dashBoard_biblio.php" class="btn btn-primary">Voltar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
