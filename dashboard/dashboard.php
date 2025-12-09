<?php  
// Check login status
include('../helper/check_login.php');

// Read session values
$username = $_SESSION["username"];
$isAdmin  = $_SESSION["is_admin"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f0f2f5;
        }

        /* Sidebar styling */
        .sidebar {
            width: 230px;
            height: 100vh;
            background: #252525;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 30px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 22px;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
            font-size: 16px;
            border-bottom: 1px solid #333;
        }

        .sidebar a:hover {
            background: #444;
        }

        /* Main content */
        .content {
            margin-left: 230px;
            padding: 20px;
        }

        .logout-btn {
            margin-top: 20px;
        }

        .admin-alert {
            padding: 15px;
            background: #d1ffd1;
            color: #0b6b0b;
            border-left: 5px solid #0b6b0b;
            margin-bottom: 20px;
            width: 90%;
        }

        .normal-alert {
            padding: 15px;
            background: #ffe1e1;
            color: #b30000;
            border-left: 5px solid #b30000;
            margin-bottom: 20px;
            width: 90%;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2><?php echo ucfirst($username); ?></h2>

        <a href="dashboard.php">Dashboard</a>

        <?php if ($isAdmin == "1") : ?>
            <a href="#">Add Books</a>
            <a href="#">Manage Users</a>
            <a href="#">View Reports</a>
        <?php else : ?>
            <a href="#">My Books</a>
            <a href="#">My Profile</a>
        <?php endif; ?>

        <form method="POST" action="../auth/logout.php" class="logout-btn">
            <input type="submit" value="Logout" 
                   style="width:100%; padding:10px; border:none; background:#ff4d4d; color:white; cursor:pointer;">
        </form>
    </div>


    <!-- Main Content -->
    <div class="content">
        <h1>Welcome, <?php echo ucfirst($username); ?> 👋</h1>

        <?php if ($isAdmin == "1") : ?>
            <div class="admin-alert">
                You are logged in as <strong>Admin</strong>.  
                You have full system access.
            </div>
        <?php else : ?>
            <div class="normal-alert">
                You are logged in as a <strong>normal user</strong>.  
                Limited access granted.
            </div>
        <?php endif; ?>

        <p>This is your dashboard area where you can manage your actions.</p>
    </div>

</body>
</html>
