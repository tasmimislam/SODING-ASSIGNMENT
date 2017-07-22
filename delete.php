 <?php

  $id = "0";
  if(isset($_GET['i'])){
    $id = $_GET['i'];   
  }


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "soding_tasmim";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM task WHERE id=$id";

if ($conn->query($sql) === TRUE) {
     header("Location: viewtask.php?delete=success");
} else {
   header("Location: viewtask.php?delete=failed");     
}

$conn->close();
?> 
