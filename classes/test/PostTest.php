<?php
include 'classes/post/Post.php';
include_once 'classes/post/PostDAO.php';
include 'interface/Test.php';

class PostTest implements iTest
{
    private Post $post;
    private PostDAO $postDAO;

    function __construct()
    {
        $this->post = new Post([
            "title" => "Pelicula 1",
            "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nisi augue, maximus sit amet semper sed, fringilla et massa. Nulla egestas luctus justo eget molestie. Aliquam erat volutpat. Phasellus sapien nulla, iaculis sed mi quis, scelerisque pretium sapien. Mauris id elit quis mi ultrices convallis non id lectus. Nulla quis mattis neque, at laoreet tortor. Curabitur vulputate sollicitudin lorem eu blandit. Donec et egestas lorem. Morbi ac est nisi.",
            "tags" => "acción,aventura,romance",
            "thumbnail" => "itinerario-3.jpg"
        ]);
        $this->postDAO = new PostDAO();
    }

    function execSave()
    {
        $this->postDAO->save($this->post);
    }
}
