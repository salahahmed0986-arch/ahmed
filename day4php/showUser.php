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

$userId = $_GET["id"] ?? null;
$user = $userId ? $db->show("users", $userId) : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">User Details</h2>
                <a href="index.php?tab=users" class="btn btn-sm btn-secondary mb-3">Back to All Users</a>
            </div>
        </div>
        <div class="row">
          <?php
if (!empty($user)) {
    echo '
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
    ';
}
?>