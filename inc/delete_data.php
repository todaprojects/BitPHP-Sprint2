<?php
session_start();

if (isset($_POST['delete_project'])) {
    $id = $_POST['project_id'];
    $table = 'projects';
} elseif (isset($_POST['delete_person'])) {
    $id = $_POST['person_id'];
    $table = 'persons';
}

require_once('connect_db.php');

$conn = connectDb();
$sql = 'DELETE FROM ' . $table . ' WHERE id = ?';

$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();

$stmt->close();
mysqli_close($conn);

$_SESSION['msg'] = 'deletion completed!';
header('Location: ./?' . $table);

exit();
