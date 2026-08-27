<?php

session_start();

if (!isset($_SESSION["login"])) {

    header("Location: ../Day1/index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>All Users Data</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <h1 class="text-success text-center mb-4">
        All Users Data
    </h1>


    <table class="table table-bordered table-striped text-center">

        <thead class="table-dark">

            <tr>

                <th>ID</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>Actions</th>

            </tr>

        </thead>


        <tbody>

            <?php

            foreach ($_SESSION["usersData"] as $index => $user) {

            ?>

                <tr>

                    <td>
                        <?php echo $index + 1; ?>
                    </td>

                    <td>
                        <?php echo $user["userName"]; ?>
                    </td>

                    <td>
                        <?php echo $user["userEmail"]; ?>
                    </td>

                    <td>

                        <button class="btn btn-danger btn-sm">
                            Delete
                        </button>

                        <button class="btn btn-primary btn-sm">
                            Update
                        </button>

                    </td>

                </tr>

            <?php

            }

            ?>

        </tbody>

    </table>

</div>

</body>

</html>
