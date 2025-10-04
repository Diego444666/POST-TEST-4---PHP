<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'admin' && $password == '12345') {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RecomL</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <h2>Login ke RecomL</h2>
        <p>Temukan musik yang sesuai dengan mood Anda.</p>
        
        <?php 
            if(isset($_GET['status']) && $_GET['status'] == 'logout'){
                echo "<p class='success-msg'>Anda berhasil logout.</p>";
            }
            if($error){
                echo "<p class='error-msg'>$error</p>";
            }
        ?>

        <form action="login.php" method="POST" class="login-form">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>