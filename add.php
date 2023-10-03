<?php
include 'config/config.php';
include 'classes/test/UserTest.php';
include_once 'utils/functions.php';

//$test = new UserTest();
//$test->execSave();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Creación de usuarios</title>
</head>

<body>
    <?php
    include 'components/navbar.php';
    ?>
    <div class="container">
        <?php
        if ($_POST && !empty($_POST)) {

            $user = new User($_POST);
            $userDao = new UserDAO();

            if (!empty($_FILES['image']['name'])) {
                $user->setImage(saveImage($_FILES['image']));
            }

            $saved = $userDao->save($user);
        ?>
            <div class="px-4">
                <?php
                if ($saved) {
                    include 'components/msg_success.php';
                } else {
                    include 'components/msg_error.php';
                }
                ?>
            </div>
        <?php
        }
        ?>
        <h2 class="text-center py-4">Crear usuario</h2>
        <div class="card w-50 mx-auto">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group mb-4">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="surname" name="surname" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="correo">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="foto">Foto de Perfil:</label>
                        <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>