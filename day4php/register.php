<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>
<body>

  <?php include 'navbar.php'; ?>

  <?php
      if (isset($_GET["error"])) {
          $errors = [
              'email_exists' => 'This email is already registered.',
              'password_mismatch' => 'Passwords do not match.',
          ];
          $message = $errors[$_GET["error"]] ?? 'Something went wrong. Please try again.';
          echo "<p class='mt-5 alert alert-danger w-75 m-auto text-center'>"
              . htmlspecialchars($message) .
              "</p>";
      }
  ?>

  <div class="container d-flex justify-content-center align-items-center" style="min-height: 85vh;">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 460px;">
      <h3 class="text-center mb-4">Create Account</h3>

      <form method="POST" action="server.php">
        <div class="mb-3">
          <label class="form-label">Full Name</label>
          <input type="text"
                 name="name" 
                 class="form-control" 
                 placeholder="FullName"
                  required>
        </div>

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email"
                 name="email" 
                 class="form-control" 
                 placeholder="Email" 
                 required>
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" 
                name="password" 
                class="form-control"
                placeholder="••••••••"
                 required>
        </div>

        <div class="mb-3">
          <label class="form-label">Confirm Password</label>
          <input type="password" 
                 name="confirm_password" 
                 class="form-control" 
                 placeholder="••••••••" 
                 required>
        </div>

        <button type="submit" 
                name="register" 
                class="btn btn-dark w-100">Register</button>

        <p class="text-center mt-3 mb-0">
          Already have an account? <a href="login.php">Login</a>
        </p>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>