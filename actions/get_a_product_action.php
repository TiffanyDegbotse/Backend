<?php 
require_once '../settings/connection.php';
function getProductById($id) {
    global $conn;
    $sql = "SELECT * FROM products WHERE ProductID = $id";
    // Execute the query
    $result = $conn->query($sql);
    // Check if execution worked
    if (!$result) {
        echo "Error: " . $conn->error;
    } 
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $conn->close();
        return $row;
    } else {
        $conn->close();
        // Return null if no record found
        return null;
    }
}