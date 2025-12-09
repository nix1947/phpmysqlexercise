<?php
session_start();

// If logged in, redirect
if (isset($_SESSION["username"])) {
    header("Location: ../dashboard/dashboard.php");
    exit();
}

include('../config/db_config.php');

$fullname = $username = $email = "";
$userPassword = $confirmPassword = "";
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname         = trim($_POST["fullname"]);
    $username         = trim($_POST["username"]);
    $email            = trim($_POST["email"]);
    $userPassword     = trim($_POST["password"]);
    $confirmPassword  = trim($_POST["confirmPassword"]);

    // Validate empty
    if (empty($fullname) || empty($username) || empty($email) || empty($userPassword) || empty($confirmPassword)) {
        $error = "Please fill out all fields.";
    }
    // Validate password match
    elseif ($userPassword !== $confirmPassword) {
        $error = "Password and Confirm Password do not match.";
    }
    else {
        // Hash password
        $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);

        // Prepare SQL
        $sql = "INSERT INTO users (fullname, username, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $fullname, $username, $email, $hashedPassword);

        if ($stmt->execute()) {
            $success = "Your account has been created successfully!";
            $fullname = $username = $email = "";
        } else {
            $error = "Registration failed. Username or Email might already exist.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">

                    <h3 class="text-center mb-3">Create an Account</h3>

                    <!-- Error Message -->
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>

                    <!-- Success Message -->
                    <?php if (!empty($success)): ?>
                        <div class="alert alert-success">
                            <?= $success ?> <br>
                            <a href="./login.php" class="fw-bold">Login here</a>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="./register.php">

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" 
                                   name="fullname" 
                                   class="form-control"
                                   value="<?= htmlspecialchars($fullname) ?>"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" 
                                   name="username" 
                                   class="form-control" 
                                   value="<?= htmlspecialchars($username) ?>"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" 
                                   name="email" 
                                   class="form-control"
                                   value="<?= htmlspecialchars($email) ?>"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" 
                                   name="password" 
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" 
                                   name="confirmPassword" 
                                   class="form-control"
                                   required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Register
                        </button>

                        <p class="text-center mt-3">
                            Already have an account? 
                            <a href="./login.php">Login</a>
                        </p>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
