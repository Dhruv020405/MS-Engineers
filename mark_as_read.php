<?php
error_log("mark_as_read.php script called."); // Debugging output

// Check if ID is set and numeric
if(isset($_POST['id']) && is_numeric($_POST['id'])) {
    $id = $_POST['id'];

    // Include the database connection file
    include('connect.php');

    try {
        // Establish a connection to the database
        $connectDB = new PDO($dns, $username, $password);
        $connectDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Update the status to 'read' in the database
        $updateQuery = "UPDATE contact SET Status = 'read' WHERE `Sr.no` = :id";
        $updateStatement = $connectDB->prepare($updateQuery);
        $updateStatement->bindParam(':id', $id, PDO::PARAM_INT);
        $updateStatement->execute();

        // Output success message
        echo "Message marked as read successfully.";
    } catch(PDOException $e) {
        // Output any errors that occur during database operation
        echo "Error: " . $e->getMessage();
    }
} else {
    // Output error message if ID is not set or not numeric
    echo "Invalid ID.";
}
?>