<?php
class Message {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getUserMessages($uniqueId, $friendId) {
        $query = "SELECT * FROM messages WHERE (senderId = $uniqueId AND receiverId = $friendId) OR (receiverId = $uniqueId AND senderId = $friendId)";

        $this->db->query($query);

        $results = $this->db->resultSet();

        return $results;

    }

    public function addNewMessage($message) {
        $query = "INSERT INTO messages (senderId, receiverId, message) VALUES (:senderId, :receiverId, :message)";

        $this->db->query($query);
        $this->db->bind(':senderId', $message['senderId']);
        $this->db->bind(':receiverId', $message['receiverId']);
        $this->db->bind(':message', $message['message']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}