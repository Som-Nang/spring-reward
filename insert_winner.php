<?php
// Assuming $dbh is your PDO connection
include('dbconnect.php');
// Enable error reporting for debugging purposes (remove in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Get data from the AJAX request
$data = json_decode(file_get_contents("php://input"));

$winnerDetails = $data->winnerDetails; // Assuming winnerDetails is an object
$selectedOption = $data->selectedOption; // Assuming selectedOption is an object

// Ensure that the required properties are present
if (isset($winnerDetails->id, $selectedOption->id)) {
    $winnerDetailsId = $winnerDetails->id;
    $winnerPrizeId = $selectedOption->id;

    // Insert into tblwinner
    $sql = "INSERT INTO tblwinner (prizeid, userID) VALUES (:prizeId, :userID)";
    $query = $dbh->prepare($sql);

    // Bind parameters
    $query->bindParam(':prizeId', $winnerPrizeId, PDO::PARAM_INT);
    $query->bindParam(':userID', $winnerDetailsId, PDO::PARAM_INT);

    // Execute the query
    $query->execute();

    // Check if the insertion was successful
    if ($query->rowCount() > 0) {
        echo "Winner data inserted successfully.";
    } else {
        echo "Failed to insert winner data.";
    }
} else {
    echo "Invalid data structure received.";
}
