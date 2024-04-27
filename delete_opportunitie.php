<?php
$user = "root";
$pass = "";
$server = "localhost";
$dbname = "empowerher";


try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    
    $opportunityId = $_POST['id']; // Corrected variable name

    // Prepare and execute the SQL query to delete the opportunity
    $sql = "DELETE FROM opportunities WHERE id = :opportunity_id"; // Corrected variable name
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':opportunity_id', $opportunityId); // Corrected variable name
    
    if ($stmt->execute()) {
        // Send a success response back to the client
        echo "Opportunity deleted successfully";
    } else {
        // Send an error response back to the client
        echo "Error deleting opportunity";
    }
}
?>

