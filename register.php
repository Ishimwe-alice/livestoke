<?php
header('Content-Type: application/json');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "livestock_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed"]));
}

// Get POST JSON
$data = json_decode(file_get_contents("php://input"), true);
$tagId = $data['tagId'] ?? '';

if ($tagId == '') {
    echo json_encode(["error" => "No tagId provided"]);
    exit;
}

// Check if tag already exists
$stmtCheck = $conn->prepare("SELECT tagId FROM animals WHERE tagId=?");
$stmtCheck->bind_param("s", $tagId);
$stmtCheck->execute();
if ($stmtCheck->get_result()->num_rows > 0) {
    echo json_encode(["error" => "Tag already registered"]);
    exit;
}

// Insert placeholder record
$stmtInsert = $conn->prepare("INSERT INTO animals (tagId) VALUES (?)");
$stmtInsert->bind_param("s", $tagId);
$stmtInsert->execute();

echo json_encode(["tagId" => $tagId, "status" => "ready_for_registration"]);
$conn->close();
?>