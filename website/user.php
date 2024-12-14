<?php
require_once 'Database.php';

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Register a new user
    public function register($fullname, $email, $password) {
        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Prepare and execute the SQL statement
        $stmt = $this->db->prepare("INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $fullname, $email, $hashedPassword);

        // Execute and check for success
        if ($stmt->execute()) {
            return true;
        } else {
            return false; // Handle error (e.g., email already exists)
        }
    }

    // Log in a user
    public function login($email, $password) {
        // Prepare the SQL statement
        $stmt = $this->db->prepare("SELECT id, fullname, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        // Get the result and verify password
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            // Verify the password
            if (password_verify($password, $row['password'])) {
                // Store user info in session
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['fullname'] = $row['fullname'];
                return true;
            }
        }
        return false; // Invalid credentials
    }

    // Check if a user is logged in
    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    // Log out the user
    public function logout() {
        session_unset();
        session_destroy();
    }
}
?>
