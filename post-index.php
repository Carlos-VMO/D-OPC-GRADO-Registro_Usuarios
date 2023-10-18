<?php
include 'config/config.php';
include 'classes/post/PostDAO.php';
include 'classes/test/PostTest.php';
// $test = new PostTest();
// $test->execSave();
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

    $postDao = new PostDAO();
    $removed = false;

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $removed = $postDao->delete($_GET['id']);
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
    <div class="container mb-5">
        <div class="d-flex justify-content-end">
            <a href="post-add.php" class="btn btn-success">Crear publicación</a>
        </div>
        <h2 class="text-center py-4">Publicaciones creadas</h2>
        <hr>
        <div class="row">
            <?php
            $posts = $postDao->getAll();

            foreach ($posts as $post) {
            ?>
                <div class="card col-lg-4">
                    <img src="<?php echo 'images/' . $post['thumbnail']; ?>" class="card-img-top" alt="<?php echo $post['title'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $post['title'] ?></h5>
                        <p class="card-text"><?php echo $post['description'] ?></p>
                        <p class="mb-3">
                            <i class="tag"><?php echo formatTags($post['tags']) ?></i>
                        </p>
                        <p>Creado el: <?php echo formatTags($post['created_at']) ?></p>
                        <a href="<?php echo ROOT . 'post-edit.php?id=' . $post['post_id']; ?>" class="btn btn-primary">Editar</a>
                        <a href="<?php echo ROOT . 'post-index.php?id=' . $post['post_id']; ?>" class="btn btn-danger">Eliminar</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <?php
    include 'components/footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>