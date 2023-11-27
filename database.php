<?php

class Database
{

    private $connection;
    function __construct()
    {
        $this->connect_db();
    }

    public function connect_db()
    {

        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'invtkr';

        try {
            $this->connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
        } catch (Exception $e) {
            if (mysqli_connect_error()) {
                die("Database Connection Failed: " . mysqli_connect_error());
            }
        }
    }

    public function create($fname, $lname, $username, $password, $avatar)
    {
        // Use prepared statements to prevent SQL injection
        $sql = $this->connection->prepare("INSERT INTO users (first_name, last_name, username, password, avatar) VALUES (?, ?, ?, ?, ?)");
        $sql->bind_param("sssss", $fname, $lname, $username, $password, $avatar);
        try {
            $res = $sql->execute();
            $sql->close();
            return $res;
        } catch (Exception $e) {
            echo "<p>An error occurred while processing your request.</p>";
        }
    }

    public function validUser($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $res = mysqli_query($this->connection, $sql);
        return $res;
    }

    public function fetchProducts()
    {
        $sql = "SELECT * FROM products";
        $res = mysqli_query($this->connection, $sql);
        if ($res) {
            // run the query and store the results
            while ($row = mysqli_fetch_assoc($res)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function createdProduct($title, $price, $description, $image1, $image2, $image3)
    {
        $sql = $this->connection->prepare("INSERT INTO products (title, price, description, image1, image2, image3)
        VALUES(?, ?, ?, ?, ? ,?)");
        $sql->bind_param("sdssss", $$title, $price, $description, $image1, $image2, $image3);
        try {
            $res = $sql->execute();
            $sql->close();
            return $res;
        } catch (Exception $e) {
            echo "<p>An error occurred while processing your request.</p>";
        }
    }

    public function displayProductById($id)
    {
        $sql = "SELECT * FROM products WHERE productID = '$id'";
        $res = mysqli_query($this->connection, $sql);
        if ($res) {
            // run the query and store the results
            while ($row = mysqli_fetch_assoc($res)) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function updatedProductById($id, $title, $price, $description)
    {
        $sql = "UPDATE products SET title = '$title', price = '$price', description = '$description' WHERE productID = '$id'";
        $res = mysqli_query($this->connection, $sql);
        return $res;
    }

    public function deleteRecord($id)
    {
        $sql = "DELETE FROM products WHERE productID = '$id'";
        $res = mysqli_query($this->connection, $sql);
        if ($res) {
            header("Location:index.php?msg3=delete");
        } else {
            echo "Record does not delete try again";
        }
    }
    public function close()
    {
        if ($this->connection) {
            $this->connection->close();
        }
    }
}
$database = new Database();
