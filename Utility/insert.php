<?php

include('ConnectDB.php');

// Retrieve the POST data.
$id = $_POST['id'];
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$pass = $_POST['pass'] ?? '';

if (is_null($id) || empty($id)) {
  $sql = "INSERT INTO student (`name`, `email`, `password`) VALUES (?, ?, ?)";
  try {
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $email, $pass]);
    echo "Task Added Successfully.";
  }
  catch (Exception $e) {
    echo "Could not add task.";
  }
}
else {
  $sql = "UPDATE student SET `name` = ?, `email` = ?, `password` = ? WHERE `id` = ?";
  try {
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    // Execute the statement with the provided data
    $stmt->execute([$name, $email, $pass, $id]);
    // Success message
    echo "Task Edited successfully";
  } catch (Exception $e) {
    // Error message
    echo "Could not edit task: " . $e->getMessage();
  }

}
