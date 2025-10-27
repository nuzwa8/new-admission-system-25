<?php
/**
 * Academy Admission System - Admin Login
 * Created: 2025-10-25
 */

require_once '../includes/config.php';

if (isset($_SESSION[ADMIN_SESSION_KEY])) {
    header('Location: dashboard.php');
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($username) || empty($password)) {
        $error = 'Please enter both username and password';
    } else {
        if (AdminAuth::login($username, $password)) {
            header('Location: dashboard.php');
            exit();
        } else {
            $error = 'Invalid username or password';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" data-lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Baba Academy</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-dark) 100%);
        }
        
        .login-card {
            background: var(--bg-card);
            padding: var(--space-xxl);
            border-radius: var(--radius-lg);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin: var(--space-md);
        }
        
        .login-title {
            text-align: center;
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-blue);
            margin-bottom: var(--space-lg);
        }
        
        .login-subtitle {
            text-align: center;
            color: var(--text-secondary);
            margin-bottom: var(--space-xl);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card fade-in">
            <h1 class="login-title">Admin Login</h1>
            <p class="login-subtitle">Baba Academy Management System</p>
            
            <?php if ($error): ?>
                <div class="alert alert-error">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" class="admission-form">
                <div class="form-group">
                    <label for="username" class="form-label required">Username</label>
                    <input type="text" id="username" name="username" class="form-control" 
                           value="<?= htmlspecialchars($username ?? '') ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="password" class="form-label required">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                
                <div class="form-group" style="margin-top: var(--space-xl);">
                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                        Login to Dashboard
                    </button>
                </div>
            </form>
            
            <div style="margin-top: var(--space-lg); padding-top: var(--space-lg); border-top: 1px solid var(--border-color); text-align: center; color: var(--text-secondary); font-size: 14px;">
                <p>Default credentials:</p>
                <p><strong>Username:</strong> admin</p>
                <p><strong>Password:</strong> admin123</p>
            </div>
        </div>
    </div>
</body>
</html>
