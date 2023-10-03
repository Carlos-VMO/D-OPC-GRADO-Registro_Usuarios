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

    $userDao = new UserDAO();
    $removed = false;

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $removed = $userDao->delete($_GET['id']);
    ?>
        <div class="px-4">
            <?php
            if ($removed) {
                include 'components/msg_success.php';
            } else {
                include 'components/msg_error.php';
            }
            ?>
        </div>
    <?php
    }
    ?>
    <div class="container">
        <h2 class="text-center py-4">Usuarios creados</h2>
        <table class="table table-striped table-bordered">
            <caption>Listado de usuarios</caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $users = $userDao->getAll();

                foreach ($users as $user) {
                ?>
                    <tr>
                        <th scope="row" class="text-center"><?php echo $user['user_id']; ?></th>
                        <td class="text-center">
                            <img src="<?php echo 'images/' . $user['image']; ?>" alt="User image" class="avatar">
                        </td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['surname']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td>
                            <div class="d-flex justify-content-end gap-2" role="group">
                                <a href="<?php echo ROOT . '/edit.php?id=' . $user['user_id']; ?>" class="btn btn-primary">Modificar</a>
                                <a href="<?php echo ROOT . '/index.php?id=' . $user['user_id']; ?>" class="btn btn-danger">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>