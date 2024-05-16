<?php

include ('ConnectDB.php');

$id = $_POST["id"];

$sql = "DELETE FROM student where id = ?";

try {
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);
  echo "Task Deleted Successfully.";
}
catch(Exception $e) {
  echo "Could not delete task.";
}

