<?php

// Include the database connection file.
include('ConnectDB.php');

// Retrieve the POST data and sanitize.
$key = isset($_POST["name"]) ? strtolower(trim($_POST["name"])) : '';

// Check if the key is valid
if ($key) {
  // Construct the SQL query with a proper placeholder for the LIKE clause.
  $sql = "SELECT * FROM `student` WHERE LOWER(`name`) LIKE ? OR LOWER(`email`) LIKE ?";

  try {
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    // Use wildcards in the parameter for the LIKE clause.
    $stmt->execute(['%' . $key . '%', '%' . $key . '%']);

    // Initialize an empty array for the response.
    $data = [];

    // Fetch the data.
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $data[] = $row;
    }

    // Output the data as JSON.
    echo json_encode($data);
  } catch (Exception $e) {
    // Handle the exception and return an error message.
    $response = array('message' => 'No records found');
    echo json_encode($response);
  }
} else {
  // If no name is provided, return an error message.
  $sql = "SELECT * FROM student";
  try {
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = [];
    while ($row = $stmt->fetch()) {
      $data[] = $row;
    }
    echo json_encode($data);
  }
  catch (Exception $e) {
    // Handle the exception and return an error message.
    $response = array('message' => 'No records found');
    echo json_encode($response);
  }
}
