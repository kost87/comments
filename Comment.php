<?php

class Comment {
    const TABLE_NAME = 'comment';
    
    private $id;
    private $content;
    private $id_parent;
    private $id_user;
    private $user;
    private $updated_at;
    private $answers;

    public function __construct($id, $content, $id_parent, $id_user){
        $this->id = $id;
        $this->content = htmlspecialchars(strip_tags($content));
        $this->id_parent = $id_parent;
        $this->id_user = $id_user;
    }

    public function __get($property){
        return $this->$property;
    }

    public function __set($property, $value){
        $this->$property = $value;
    }

    public function save()
    {
        $db = Db::instance();
        $this->updated_at = date('Y-m-d H:i:s');
        if ($this->id == 0)
        {
            $query = "INSERT INTO " . self::TABLE_NAME . " (content, id_parent, id_user, updated_at) 
                        VALUES ('" . $this->content . "', " . $this->id_parent . ", " . $this->id_user . ", '" . $this->updated_at . "')";
        }
        else
        {
            $query = "UPDATE " . self::TABLE_NAME . " SET content='" . $this->content . "', updated_at='" . $this->updated_at .  "' WHERE id=" . $this->id;
        }
        $stmt = $db->conn->prepare($query);
        $stmt->execute();
        if ($this->id == 0)
        {
            $this->id = $db->conn->lastInsertId();
            $new_comment = self::findById($this->id);
            $this->user = $new_comment->user;
        }
    }

    public static function findById($id)
    {
        $db = Db::instance();
        $query = "SELECT `comment`.*, user.login FROM `comment` JOIN user on comment.id_user=user.id WHERE `comment`.id=" . $id;
        $stmt = $db->conn->prepare($query);
		$stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
        $comment = new Comment($id, $content, $id_parent, $id_user);
        $comment->user = new User($id_user, $login);
        $comment->updated_at = $updated_at;
        return $comment;
    }

    public static function findAll()
    {
        $db = Db::instance();
        $query = "SELECT `comment`.*, user.login FROM `comment` JOIN user on comment.id_user=user.id ORDER BY `comment`.`id` DESC";
        $stmt = $db->conn->prepare($query);
		$stmt->execute();
		$comments = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $comment = new Comment($id, $content, $id_parent, $id_user);
            $comment->user = new User($id_user, $login);
            $comment->updated_at = $updated_at;
            $comment->answers = array();
            $comments[$id] = $comment;
        }
        unset($comment);
        foreach ($comments as $id => &$comment) {
            if ($comment->id_parent != 0) {
                $comments[$comment->id_parent]->answers[] = &$comment;
            }
        }
        unset($comment);
        foreach ($comments as $id => $comment) {
            if ($comment->id_parent != 0) {
                unset($comments[$id]);
            }
        }
        return $comments;
    }

    public function toArray(): array
    {
        return [
          'id' => $this->id,
          'content' => $this->content,
          'id_parent' => $this->id_parent,
          'id_user' => $this->id_user,
          'user' => $this->user->login,
          'updated_at' => $this->updated_at
        ];
    }
}
?>