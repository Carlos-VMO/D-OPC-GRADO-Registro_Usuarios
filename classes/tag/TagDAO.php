<?php

include_once 'config/Database.php';
include_once 'classes/GenericDAO.php';

class TagDAO extends GenericDao
{

    function save(Tag $tag)
    {
        try {
            $query = $this->conn->prepare(
                "INSERT INTO tag (name) VALUES (:name)"
            );
            $name = $tag->getName();

            $query->bindParam(':name', $name);

            return $query->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    function update(Tag $tag)
    {
        try {
            $query = $this->conn->prepare(
                "UPDATE tag SET name = :name WHERE tag_id = :id"
            );
            $name = $tag->getName();
            $id = $tag->getId();

            $query->bindParam(':name', $name);
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
            $query = $this->conn->query("SELECT * FROM tag");
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    function getOne($id)
    {
        try {
            $query = $this->conn->query("SELECT * FROM tag WHERE tag_id = $id");

            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    function delete($id)
    {
        try {
            $query = $this->conn->prepare("DELETE FROM tag WHERE tag_id = :id");

            $query->bindParam(':id', $id);

            return $query->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
