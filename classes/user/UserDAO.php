<?php

include_once 'config/Database.php';
include_once 'classes/GenericDAO.php';

class UserDAO extends GenericDao
{

    function save(User $user)
    {
        try {
            $query = $this->conn->prepare(
                "INSERT INTO user_ (name, surname, email, password, image) VALUES (:name, :surname, :email, :password, :image)"
            );
            $name = $user->getName();
            $surname = $user->getSurname();
            $email = $user->getEmail();
            $password = $user->getPassword();
            $image = $user->getImage();

            $query->bindParam(':name', $name);
            $query->bindParam(':surname', $surname);
            $query->bindParam(':email', $email);
            $query->bindParam(':password', $password);
            $query->bindParam(':image', $image);

            return $query->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    function update(User $user)
    {
        try {
            $query = $this->conn->prepare(
                "UPDATE user_ SET name = :name, surname = :surname, email = :email, image = :image WHERE user_id = :id"
            );
            $name = $user->getName();
            $surname = $user->getSurname();
            $email = $user->getEmail();
            $image = $user->getImage();
            $id = $user->getId();

            $query->bindParam(':name', $name);
            $query->bindParam(':surname', $surname);
            $query->bindParam(':email', $email);
            $query->bindParam(':image', $image);
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
            $query = $this->conn->query("SELECT * FROM user_");
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    function getOne($id)
    {
        try {
            $query = $this->conn->query("SELECT * FROM user_ WHERE user_id = $id");

            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    function delete($id)
    {
        try {
            $query = $this->conn->prepare("DELETE FROM user_ WHERE user_id = :id");

            $query->bindParam(':id', $id);

            return $query->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
