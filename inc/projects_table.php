<?php
ob_start();
session_start();

echo '
    <div class="head">
        <span>no.</span>
        <span>project</span>
        <span>assigned persons</span>
        <span>actions</span>       
    </div>
';

require_once './inc/get_projects.php';
$projects = getProjects();

if (count($projects) > 0) {
    $number = 0;
    foreach ($projects as $p) {
        list($id, $project, $persons) = $p;
        echo '
            <div class="list">
                <span class="id">' . ++$number . '</span>
                <span class="name">' . $project . '</span>
                <span class="project">' . $persons . '</span>
                <span>
                    <form action="./?projects" method="post">
                        <input type="hidden" name="project_no" value="' . $number . '">
                        <input type="hidden" name="project_id" value="' . $id . '">
                        <input type="hidden" name="project_name" value="' . $project . '">
                        <button type="submit" name="update_project">update</button>
                    </form>
                </span>
                <span>
                    <form action="./?projects" method="post">
                        <input type="hidden" name="project_id" value="' . $id . '">
                        <button type="submit" name="delete_project">delete</button>
                    </form>
                </span>
            </div>
        ';
    }
} else {
    echo '<p>"Projects" data table is empty</p>';
}

function getUpdateForm() {
    printMsg();
    echo '
                    <div class="menu"><form action="./inc/update_project_data.php" method="post">
                        <input type="hidden" name="project_id" value="' . $_POST['project_id'] . '">
                        <label for="project_name">update project</label></br>
                        <input type="text" name="project_name" id="project_name" value="' . $_POST['project_name'] . '">
                        <button type="submit" name="update_project">save</button>
                    </form></div>
                ';
}

function getInsertionForm() {
    printMsg();
    echo '
                    <div class="menu"><form action="./inc/insert_data.php" method="post">
                        <label for="project_name">add project</label></br>
                        <input type="text" name="project_name" id="project_name" placeholder="name">
                        <button type="submit">save</button>
                    </form></div>
                ';
}

function delete() {
    require_once './inc/delete_data.php';
}

function printMsg() {
    if (isset($_SESSION['err'])) {
        echo '<p id="error">' . $_SESSION['err'] . '</p>';
    } elseif (isset($_SESSION['msg'])) {
        echo '<p id="success">' . $_SESSION['msg'] . '</p>';
    }
    session_unset(); 
}
