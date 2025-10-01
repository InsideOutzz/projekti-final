<?php
session_start();

// Dummy user data for demo (replace with database in real app)
$valid_email = "user@example.com";
$valid_password = "password123";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Basic validation
    if (empty($email) || empty($password)) {
        $error = "Please enter both email and password.";
    } else {
        // Check credentials (replace with DB query in real app)
        if ($email === $valid_email && $password === $valid_password) {
            $_SESSION['user'] = $email; // Mark user as logged in
            header("Location: dashboard.php"); // Redirect to a protected page
            exit;
        } else {
            $error = "Invalid email or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Sign In</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f5f5f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-container {
      background: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 300px;
    }
    h2 {
      margin-bottom: 20px;
      text-align: center;
    }
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 12px 10px;
      margin: 8px 0 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    button {
      width: 100%;
      padding: 12px;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }
    button:hover {
      background-color: #0056b3;
    }
    .error {
      color: red;
      margin-bottom: 15px;
      text-align: center;
    }
    .signup-link {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }
    .signup-link a {
      color: #007BFF;
      text-decoration: none;
    }
    .signup-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="login-container">
  <h2>Sign In</h2>

  <?php if ($error): ?>
    <div class="error"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form method="POST" action="">
    <input type="email" name="email" placeholder="Email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" />
    <input type="password" name="password" placeholder="Password" required />
    <button type="submit">Sign In</button>
  </form>

  <div class="signup-link">
    Don't have an account? <a href="signup.php">Sign Up</a>
  </div>
</div>

</body>
</html>