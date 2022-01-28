<?php
include("database.php");
$id = $_GET['emp_id'];
// sql to delete a record
$sql = "DELETE FROM employees WHERE empId='$id'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("Location:index.php");

} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>