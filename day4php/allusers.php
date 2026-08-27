<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'connection.php';

if (!isset($_SESSION['loginID'])) {
    header("Location: login.php");
    exit();
}

include 'navbar.php';

$allUsers = $db->index("users");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">All Users</h2>
                <a href="register.php" class="btn btn-sm btn-success">Add New User</a>
            </div>
        </div>
        <div class="row">
            <?php
            if (!empty($allUsers)) {
                foreach ($allUsers as $user) {
                    echo '
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">' . htmlspecialchars($user['name']) . '</h5>
                                <p class="card-text">
                                    <strong>Email:</strong> ' . htmlspecialchars($user['email']) . '<br>
                                </p>
                            </div>
                            <div class="card-footer bg-white border-top text-center">
                                <a href="showUser.php?id=' . $user['id'] . '" class="btn btn-sm btn-warning">Show</a>
                                <a href="index.php?tab=users&edit_id=' . $user['id'] . '" class="btn btn-sm btn-primary">Edit</a>
                                <form action="server.php" method="POST" style="display:inline" onsubmit="return confirm(\'Are you sure you want to delete this user?\');">
                                    <input type="hidden" name="table" value="users">
                                    <input type="hidden" name="id" value="' . $user['id'] . '">
                                    <button type="submit" name="delete" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    ';
                }
            } else {
                echo '<div class="col-12"><p class="text-muted text-center">No users found.</p></div>';
            }
            ?>
        </div>
    </div>
    <?php require "bootstrapJs.php"; ?>
</body>
</html>