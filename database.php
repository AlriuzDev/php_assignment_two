<?php
  
  class Database{
    
    private $connection;
    function __construct(){      
      $this->connect_db();
    }

    public function connect_db(){
        
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'tracker';

        try {
            $this->connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
        } catch (Exception $e) {
            if (mysqli_connect_error()) {
                die("Database Connection Failed: " . mysqli_connect_error());
            }
        }
    }

    public function create($desc, $type, $option, $amount, $comment){
        // Use prepared statements to prevent SQL injection
        $sql = $this->connection->prepare("INSERT INTO inputs (input_description, input_type, input_option, amount, input_comment) VALUES (?, ?, ?, ?, ?)");
        $sql->bind_param("sssds",$desc, $type, $option, $amount, $comment);
        try {
            $res = $sql->execute();
            $sql->close();
            return $res;
        } catch (Exception $e) {
            echo "<p>An error occurred while processing your request.</p>";
        }
    }
    public function readIncomes(){
        $sql = "SELECT * FROM inputs WHERE input_type = 'income' ";
        $res = mysqli_query($this->connection, $sql);
        return $res;
	}
    public function readExpenses(){
        $sql = "SELECT * FROM inputs WHERE input_type = 'expense' ";
        $res = mysqli_query($this->connection, $sql);
        return $res;
	}
  
    public function close() {
        if ($this->connection) {
            $this->connection->close();
        }
    }
    
  }
  $database = new Database();
?>
