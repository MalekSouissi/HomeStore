<?php
// Other settings
session_start();
// Connect to the database
require_once ("Model.php");
// Functions for managing utilisateurs
class USER {
    private $conn;
    public function __construct()   {
        $database = new DBController();
        $db = $database->connectDB();
        $this->conn = $db;
 }

    public function runQuery($sql)  {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function register($uname,$umail,$upass)  {
        try {
            $new_password = password_hash($upass, PASSWORD_DEFAULT);            
            $stmt = $this->conn->prepare("INSERT INTO utilisateurs (userName,email,password) VALUES(:uname, :umail, :upass)");
            $stmt->bindparam(":uname", $uname);
            $stmt->bindparam(":umail", $umail);
            $stmt->bindparam(":upass", $new_password);                                        
            $stmt->execute();   
            return $stmt;   
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }               
    }

    public function doLogin($uname,$upass)   {
        try {
            $stmt = $this->conn->prepare("SELECT userId, userName, password FROM utilisateurs WHERE userName=:uname  ");
            $stmt->execute(array(':uname'=>$uname));
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() == 1) {
                if(password_verify($upass, $userRow['password'])) {
                    $_SESSION['user_session'] = $userRow['user_id'];
                    return true;
                } else {
                    return false;
                }
            }
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function is_loggedin() {
        if(isset($_SESSION['user_session'])) {
            return true;
        }
    }

    public function redirect($url) {
        header("Location: $url");
        exit;
    }

}
?>