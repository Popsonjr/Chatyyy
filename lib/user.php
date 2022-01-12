<?php
class User {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    //login
    public function login($email, $password) {


        $query = "SELECT * FROM users WHERE email = :email AND password = :password";
        $this->db->query($query);

        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);
        
        //Assign row
        $row = $this->db->singleResult();

        return $row;
    }
    
    //Register new users
    public function register($data) {
        $query = "INSERT INTO users (uniqueId, username, password, email, image, status) VALUES(:uniqueId, :username, :password, :email, :image, :status)";

        $this->db->query($query);

        $this->db->bind(':uniqueId', $data['uniqueId']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':status', $data['status']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }
    
    //Get Friend's List
    public function getFriendList($uniqueId) {
        $query = "SELECT * FROM users WHERE uniqueId != :uniqueId";

        $this->db->query($query);
        $this->db->bind(':uniqueId', $uniqueId);

        $results = $this->db->resultSet();
        return $results;
    }
}