<?php

class User {
    const TABLE_NAME = 'user';

    private $id;
    private $login;

    public function __construct($id, $login){
        $this->id = $id;
        $this->login = $login;
    }

    public function __get($property){
        return $this->$property;
    }

    public static function findById($id){
        $db = Db::instance();
        $query = "SELECT * FROM `" . self::TABLE_NAME . "` WHERE id=" . $id;
        $stmt = $db->conn->prepare($query);
		$stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row)
        {
            die("Пользователь не зарегистрирован");
        }
        extract($row);
        return new User($id, $login);
    }
}