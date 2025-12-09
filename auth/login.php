<?php
session_start();

// If already logged in, redirect
if (isset($_SESSION["username"])) {
    header("Location: ../dashboard/dashboard.php");
    exit();
}

// DB connection
include("../config/db_config.php");

// Handle form POST
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $form_username = trim($_POST["username"]);
    $form_password = trim($_POST["password"]);

    if (empty($form_username) || empty($form_password)) {
        $error = "Please provide both username and password.";
    } else {
        // Fetch user record
        $stmt = $conn->prepare("SELECT id, username, password, is_admin FROM users WHERE username = ?");
        $stmt->bind_param("s", $form_username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $record = $result->fetch_assoc();

            // Verify hashed password
            if (password_verify($form_password, $record["password"])) {

                // Set session values
                $_SESSION["username"]  = $record["username"];
                $_SESSION["id"]        = $record["id"];
                $_SESSION["is_admin"]  = $record["is_admin"];

                header("Location: ../dashboard/dashboard.php");
                exit();
            } else {
                $error = "Incorrect username or password.";
            }
        } else {
            $error = "Incorrect username or password.";
        }
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">

                    <h3 class="text-center mb-3">Login</h3>

                    <?php if (!empty($error)) : ?>
                        <div class="alert alert-danger py-2"><?= $error ?></div>
                    <?php endif; ?>

                    <form method="POST" action="./login.php">

                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="username" 
                                placeholder="Enter your username"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input 
                                id="userInputPassword" 
                                type="password" 
                                name="password" 
                                class="form-control" 
                                placeholder="Enter your password"
                                required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mt-2">
                            Login
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
var passwordElement = document.getElementById("userInputPassword");
console.log(passwordElement);
</script>

</body>
</html>
