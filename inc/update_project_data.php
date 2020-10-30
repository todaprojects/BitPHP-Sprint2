<?php
session_start();

$name = $_POST['project_name'];

if ($name != '') {
    require_once('connect_db.php');
    $conn = connectDb();

    $id = $_POST['project_id'];
    $sql = 'UPDATE projects SET name = ? WHERE id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $name, $id);
    $stmt->execute();

    $stmt->close();
    mysqli_close($conn);
    $_SESSION['msg'] = 'changes applied successfully!';
} else {
    $_SESSION['err'] = 'project name should not be empty!';
}

header('Location: ../?projects');

exit();
