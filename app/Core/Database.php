<?php

namespace App\Core;

use PDO;
use PDOException;

class Database {
    private static $instance = null;
    private $conn;

    private $host;
    private $db_name;
    private $username;
    private $password;

    private function __construct() {
        // Configuration is loaded from config/config.php (via constants)
        // Ensure config.php is loaded before this class is instantiated.
        // This is typically handled by including config.php early in your bootstrap process (e.g., public/index.php).

        if (!defined('DB_HOST') || !defined('DB_NAME') || !defined('DB_USER') || !defined('DB_PASS') || !defined('DB_CHARSET')) {
            throw new \Exception("Database configuration constants are not defined. Ensure config/config.php is loaded and defines DB_HOST, DB_NAME, DB_USER, DB_PASS, DB_CHARSET.");
        }

        $this->host = DB_HOST;
        $this->db_name = DB_NAME;
        $this->username = DB_USER;
        $this->password = DB_PASS;
        $charset = DB_CHARSET;

        $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset={$charset}";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            // In a real application, log this error and show a user-friendly message
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }

    // Prevent cloning and unserialization
    private function __clone() {}
    public function __wakeup() {}
}

// Usage Example (commented out, for demonstration only):
/*
try {
    $db = Database::getInstance();
    $pdo = $db->getConnection();
    // $stmt = $pdo->query("SELECT * FROM users"); // Example query
    // while ($row = $stmt->fetch()) {
    //     echo $row['username'] . "<br>";
    // }
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}
*/

?>
