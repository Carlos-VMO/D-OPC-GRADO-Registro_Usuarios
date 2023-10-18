<?php
include 'config/config.php';
include_once 'utils/functions.php';
include 'classes/tag/TagDAO.php';
include 'classes/test/TagTest.php';
include 'classes/post/Post.php';
include 'classes/post/PostDAO.php';

// $test = new TagTest();
// $test->execSave();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Creación de usuarios</title>
</head>

<body>
    <?php
    include 'components/navbar.php';
    ?>
    <div class="container mb-5">
        <?php
        if ($_POST && !empty($_POST)) {

            $post = new Post($_POST);
            $postDao = new PostDAO();

            if (!empty($_FILES['thumbnail']['name'])) {
                $post->setThumbnail(saveImage($_FILES['thumbnail']));
            }

            $saved = $postDao->save($post);
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
        <h2 class="text-center py-4">Crear post</h2>
        <div class="card w-50 mx-auto">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group mb-4">
                        <label for="title">Titulo</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                    <div class="form-group mb-4">
                        <label for="tags">Tags</label>
                        <select class="form-control" id="tags" name="tags[]" multiple required>
                            <?php
                            $tagDao = new TagDAO();
                            $tags = $tagDao->getAll();

                            foreach ($tags as $tag) {
                            ?>
                                <option value="<?php echo $tag['name'] ?>"><?php echo formatTags($tag['name']) ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="thumbnail">Portada:</label>
                        <input type="file" class="form-control-file" id="thumbnail" name="thumbnail" accept="image/*" required>
                    </div>
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