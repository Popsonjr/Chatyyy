<?php
class User {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    //Get User Details
    public function getUser($uniqueId){
        $query = "SELECT * FROM users WHERE uniqueId = :uniqueId";
        $this->db->query($query);

        $this->db->bind(':uniqueId', $uniqueId);
        $row = $this->db->singleResult();
        return $row;
    }

    //Logout
    public function logout($logoutId) {
        $query = "UPDATE users SET status = 'Offline' WHERE uniqueId = :logoutId";
        $this->db->query($query);

        $this->db->bind(':logoutId', $logoutId);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }

    }

    //login
    public function login($email, $password) {


        $query = "SELECT * FROM users WHERE email = :email AND password = :password";
        $this->db->query($query);

        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);
        
        //Assign row
        $row = $this->db->singleResult();
        if ($row) {
            $query = "UPDATE users SET status = 'Online' WHERE uniqueId = :uniqueId";
            $this->db->query($query);
            $this->db->bind(':uniqueId', $row->uniqueId);
            if($this->db->execute()){
                return $row;
            } 
        } else {
            return false;
        }

        
    }
    
    //Check if email exist
    public function emailCheck($email) {
        $query = "SELECT email FROM users WHERE email = :email";
        $this->db->query($query);
        $this->db->bind(':email', $email);
        if($this->db->singleResult()) {
            return true;

        }else {
            return false;
        }
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

    //Search Friend List
    public function searchUsers($uniqueId, $searchTerm){
        $query = "SELECT * FROM users WHERE NOT uniqueId = :uniqueId AND username LIKE :searchTerm";
        $this->db->query($query);
        $this->db->bind(':uniqueId', $uniqueId);
        $this->db->bind(':searchTerm', '%'.$searchTerm.'%');

        if($this->db->resultSet()){
            return $this->db->resultSet();
        } else {
            return false;
        }
        
    }
    

}