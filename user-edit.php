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
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Edición de usuarios</title>
</head>

<body>
    <?php
    include 'components/navbar.php';
    ?>
    <div class="container mb-5">
        <?php
        $userDao = new UserDAO();
        $user = $userDao->getOne($_GET['id']);

        if (!$user) {
            include 'components/msg_error.php';
        }

        if ($_POST && !empty($_POST)) {

            $_POST['image'] = $user['image'];
            $newUser = new User($_POST);

            if (!empty($_FILES['image']['name'])) {
                $newUser->setImage(saveImage($_FILES['image']));
            }

            $saved = $userDao->update($newUser);
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
        <h2 class="text-center py-4">Editar usuario</h2>
        <div class="card w-50 mx-auto">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group mb-4">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['name']; ?>" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="surname" name="surname" value="<?php echo $user['surname']; ?>" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="correo">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="foto">Foto de Perfil:</label>
                        <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?? $_POST['id']; ?>">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>
    <?php
    include 'components/footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>