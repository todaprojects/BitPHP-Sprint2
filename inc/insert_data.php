<?php
session_start();

if (isset($_POST['project_name'])) {
    $name = $_POST['project_name'];
    $table = 'projects';
} elseif (isset($_POST['person_name'])) {
    $name = $_POST['person_name'];
    $table = 'persons';
}

if ($name != '') {
    require_once('connect_db.php');
    $conn = connectDb();

    $sql = 'INSERT INTO ' . $table. ' (name) VALUES (?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $name);
    $stmt->execute();

    $stmt->close();
    mysqli_close($conn);
    $_SESSION['msg'] = 'new ' . substr_replace($table, '', -1) . ' applied successfully!';
} else { 
    $_SESSION['err'] = substr_replace($table, '', -1) . ' name should not be empty!';
}

header('Location: ../?' . $table);

exit();
