<?php
session_start();
include 'config/database.php';

if (isset($_POST['signin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query_sql = "SELECT * FROM admin
                    WHERE USERNAME = '$username' AND PASSWORD ='$password'";

    $result = mysqli_query($mysqli, $query_sql);

    if (mysqli_num_rows($result) > 0) {
        // Ambil informasi loket dari hasil query
        $row = mysqli_fetch_assoc($result);
        $loket = $row['loket'];

        // Set sesi signin dan sesi loket
        $_SESSION['signin'] = true;
        // Setelah proses verifikasi login berhasil
        $_SESSION['username'] = $username; // Simpan informasi admin (misalnya, nama pengguna) dalam sesi
        $_SESSION['loket'] = $loket;

        echo "
            <script>
                alert('Login Berhasil');
                document.location.href = 'panggilan-antrian/index.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Username atau Password salah!');
                document.location.href = 'login.php';
            </script>
            ";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Halaman Login">
    <meta name="author" content="Indra Styawantoro">
    <title>Login - Aplikasi Antrian Berbasis Web</title>
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <!-- Custom Style -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <div class="container pt-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-5">
                            <div class="mb-4 text-center">
                                <h3 class="h4">Login</h3>
                                <img src="assets/img/logo.png" alt="Logo" style="max-width: 250px;">
                            </div>
                            <!-- Form login -->
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username:</label>
                                    <input type="username" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <button type="submit" name="signin" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto py-4">
        <div class="container-fluid">
            <div class="copyright text-center mb-2 mb-md-0">
                &copy; 2024 - <a href="https://rssams.co.id" target="_blank" class="text-danger text-decoration-none">rssams.co.id</a>. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>
