<?php
// Database configuration
$host = 'localhost';
$dbname = 'dbz8szoeghdwdc';
$username = 'ulnrcogla9a1t';
$password = 'yolpwow1mwr2';

try {
    // Create PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    
    // Set PDO attributes
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    // Success message (comment out in production)
    // echo "Database connected successfully!";
    
} catch(PDOException $e) {
    // Log error and show user-friendly message
    error_log("Database connection failed: " . $e->getMessage());
    die("Sorry, we're experiencing technical difficulties. Please try again later.");
}

// Function to get database connection
function getConnection() {
    global $pdo;
    return $pdo;
}

// Function to execute prepared statements safely
function executeQuery($sql, $params = []) {
    global $pdo;
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    } catch(PDOException $e) {
        error_log("Query execution failed: " . $e->getMessage());
        return false;
    }
}

// Function to fetch single record
function fetchOne($sql, $params = []) {
    $stmt = executeQuery($sql, $params);
    return $stmt ? $stmt->fetch() : false;
}

// Function to fetch multiple records
function fetchAll($sql, $params = []) {
    $stmt = executeQuery($sql, $params);
    return $stmt ? $stmt->fetchAll() : false;
}

// Function to insert record and return last insert ID
function insertRecord($sql, $params = []) {
    global $pdo;
    $stmt = executeQuery($sql, $params);
    return $stmt ? $pdo->lastInsertId() : false;
}

// Function to count records
function countRecords($table, $condition = '', $params = []) {
    $sql = "SELECT COUNT(*) as count FROM $table";
    if ($condition) {
        $sql .= " WHERE $condition";
    }
    $result = fetchOne($sql, $params);
    return $result ? $result['count'] : 0;
}

// Function to sanitize input
function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

// Function to validate email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to generate secure token
function generateToken($length = 32) {
    return bin2hex(random_bytes($length));
}

// Function to hash password
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Function to verify password
function verifyPassword($password, $hash) {
    return password_verify($password, $hash);
}
?>
