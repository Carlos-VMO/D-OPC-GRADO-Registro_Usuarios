<?php
include 'classes/tag/Tag.php';
include_once 'classes/tag/TagDAO.php';
include 'interface/Test.php';

class TagTest implements iTest
{
    private Tag $tag;
    private TagDAO $tagDAO;

    function __construct()
    {
        $this->tag = new Tag([
            "name" => "acción"
        ]);
        $this->tagDAO = new TagDAO();
    }

    function execSave()
    {
        $this->tagDAO->save($this->tag);
    }
}
