<?php
class UserDatabaseGateway {
    public static function all() {
        try {
            $sql = "SELECT * FROM users";
            $statement = CONNECTION->prepare($sql);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            throw $error;
        }
    }
}