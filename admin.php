<?php
include 'config/config.php';
include 'classes/user/UserDAO.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Listado de usuarios</title>
</head>

<body>
    <?php
    include 'components/navbar.php';
    ?>
    <div class="container mb-5">
        <h2 class="text-center py-4">Administración</h2>
        <hr>
        <div class="d-flex flex-column gap-3 admin-menu">
            <a href="post-index.php">
                <div class="card cursor-pointer">
                    <div class="card-body">
                        <div class="card-title">
                            <h5>Post</h5>
                        </div>
                        Gestiona los post que se verán en la página.
                    </div>
                </div>
            </a>
            <a href="tag-index.php">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h5>Tags</h5>
                        </div>
                        Gestiona los tags que se utilizarán a lo largo de la página.
                    </div>
                </div>
            </a>
        </div>
    </div>
    <?php
    include 'components/footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>