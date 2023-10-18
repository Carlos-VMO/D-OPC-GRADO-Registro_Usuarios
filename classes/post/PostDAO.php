<?php

include_once 'config/Database.php';
include_once 'classes/GenericDAO.php';

class PostDAO extends GenericDao
{

    function save(Post $post)
    {
        try {
            $query = $this->conn->prepare(
                "INSERT INTO post (title, description, tags, thumbnail) VALUES (:title, :description, :tags, :thumbnail)"
            );
            $title = $post->getTitle();
            $description = $post->getDescription();
            $tags = $post->getTags();
            $thumbnail = $post->getThumbnail();

            $query->bindParam(':title', $title);
            $query->bindParam(':description', $description);
            $query->bindParam(':tags', $tags);
            $query->bindParam(':thumbnail', $thumbnail);

            return $query->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    function update(Post $post)
    {
        try {
            $query = $this->conn->prepare(
                "UPDATE post SET title = :title, description = :description, tags = :tags, thumbnail = :thumbnail WHERE post_id = :id"
            );
            $title = $post->getTitle();
            $description = $post->getDescription();
            $tags = $post->getTags();
            $thumbnail = $post->getThumbnail();
            $id = $post->getId();

            $query->bindParam(':title', $title);
            $query->bindParam(':description', $description);
            $query->bindParam(':tags', $tags);
            $query->bindParam(':thumbnail', $thumbnail);
            $query->bindParam(':id', $id);

            return $query->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    function getAll()
    {
        try {
            $query = $this->conn->query("SELECT * FROM post");
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    function getOne($id)
    {
        try {
            $query = $this->conn->query("SELECT * FROM post WHERE post_id = $id");

            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    function delete($id)
    {
        try {
            $query = $this->conn->prepare("DELETE FROM post WHERE post_id = :id");

            $query->bindParam(':id', $id);

            return $query->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
