<?php
include 'config/config.php';
include 'classes/tag/TagDAO.php';
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

    $tagDao = new TagDAO();
    $removed = false;

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $removed = $tagDao->delete($_GET['id']);
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
            <a href="tag-add.php" class="btn btn-success">Crear tag</a>
        </div>
        <h2 class="text-center py-4">Tags creados</h2>
        <hr>
        <div class="row">
            <?php
            $tags = $tagDao->getAll();

            foreach ($tags as $tag) {
            ?>
                <div class="card col-lg-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo formatTags($tag['name']) ?></h5>
                        <a href="<?php echo ROOT . 'tag-edit.php?id=' . $tag['tag_id']; ?>" class="btn btn-primary">Editar</a>
                        <a href="<?php echo ROOT . 'tag-index.php?id=' . $tag['tag_id']; ?>" class="btn btn-danger">Eliminar</a>
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