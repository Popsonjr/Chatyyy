<?php
class Message {
    private $db;

    public function __construct() {
        $this->db = new Database;
        $this->friendId = "123";
    }
    
    //Get the last message of each user
    public function getLastMessages($uniqueId, $friendId) {
        $query = "SELECT * FROM messages WHERE (senderId = :uniqueId AND receiverId = :friendId) OR (receiverId = :uniqueId AND senderId = :friendId) ORDER BY messageId DESC LIMIT 1";

        $this->db->query($query);
        $this->db->bind(':uniqueId', $uniqueId);
        $this->db->bind(':friendId', $friendId);

        return $this->db->singleResult();

    }
    
    //Update user status
    public function getUserCurrentStatus($friendId) {
        $query = "SELECT status FROM users WHERE uniqueId = :id";
        $this->db->query($query);
        $this->db->bind(':id', $friendId);
        return $this->db->singleResult();
    }
    
    //Get all user messages
    public function getUserMessages($uniqueId, $friendId) {
        $query = "SELECT * FROM messages WHERE (senderId = :uniqueId AND receiverId = :friendId) OR (receiverId = :uniqueId AND senderId = :friendId)";

        $this->db->query($query);

        $this->db->bind(':uniqueId', $uniqueId);
        $this->db->bind(':friendId', $friendId);

        $results = $this->db->resultSet();

        return $results;

    }
    
    //Add new messages
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