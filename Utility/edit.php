<?php

include ('ConnectDB.php');

$id = $_POST["id"];

$sql = "SELECT * FROM student WHERE id = ?";

try {
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);
  $row = $stmt->fetch();
  echo json_encode($row);
}
catch(Exception $e) {
  $data = array(
    'message' => 'Could not edit entry.'
  );
}
