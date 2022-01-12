<?php
class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASS;
    private $databaseName = DB_NAME;

    private $dbh;
    private $error;
    private $statement;

    public function __construct() {
        //set DSN
        $dsn = 'mysql:host=' .$this->host. ';dbname=' . $this->databaseName;

        //set options
        $options = array(
            PDO::ATTR_PERSISTENT =>true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        //PDO Instance
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->password, $options);

        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            // echo "sdf";
            // echo $e;
        }
    }

    public function query($query) {
        $this->statement = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null){
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;

                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;    

                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }

        $this->statement->bindvalue($param, $value, $type);
    }

    public function test() {
        return 'test successful';
    }

    public function execute() {
        return $this->statement->execute();
    }

    public function resultSet() {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function singleResult() {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

}