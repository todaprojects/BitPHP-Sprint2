<?php
session_start();

$name = $_POST['person_name'];

if ($name != '') {
    require_once('connect_db.php');
    $conn = connectDb();

    $id = $_POST['person_id'];
    $project_id = $_POST['project_id'];

    if ($project_id != '') {
        $sql = 'UPDATE persons SET name = ?, project_id = ? WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sii', $name, $project_id, $id);
    } else {
        $sql = 'UPDATE persons SET name = ?, project_id = null WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si', $name, $id);
    }

    $stmt->execute();

    $stmt->close();
    mysqli_close($conn);
    $_SESSION['msg'] = 'changes applied successfully!';
} else {
    $_SESSION['err'] = 'person name should not be empty!';
}

header('Location: ../?persons');

exit();
