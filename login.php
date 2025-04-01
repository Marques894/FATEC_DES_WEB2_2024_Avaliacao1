<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    
    if (!empty($username) && !empty($password)) {
        if ($username === 'professor' && $password === 'professor') {
            $_SESSION['login'] = TRUE;
            $_SESSION["username"] = 'prof';
            header("location: dashBoard_professor.php");
            exit();
        } elseif ($username === 'biblio' && $password === 'biblio') {
            $_SESSION['login'] = TRUE;
            $_SESSION["username"] = 'biblio';
            header("location: dashBoard_biblio.php");
            exit();
        } else {
            $_SESSION['login'] = FALSE;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FATEC_DES_WEB2_2024_Avaliacao1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="d-flex flex-column justify-content-center align-items-center vh-100">
    <form class="p-4 border rounded shadow-sm text-center" style="width: 300px;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <h4 class="mb-3">Login</h4>
        <div class="mb-2">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <button type="submit" class=" btn btn-primary w-100">Entrar</button>
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
