<?php
ob_start();
session_start();

echo '
    <div class="head">
        <span>no.</span>
        <span>name</span>
        <span>assigned project</span>
        <span>actions</span>       
    </div>
';

require_once './inc/get_persons.php';
$persons = getPersons();

if (count($persons) > 0) {
    $number = 0;
    foreach ($persons as $p) {
        list($id, $person, $project_id, $project) = $p;
        echo '
            <div class="list">
                <span class="id">' . ++$number . '</span>
                <span class="name">' . $person . '</span>
                <span class="project">' . $project . '</span>
                <span>
                    <form action="./?persons" method="post">
                        <input type="hidden" name="person_no" value="' . $number . '">
                        <input type="hidden" name="person_id" value="' . $id . '">
                        <input type="hidden" name="person_name" value="' . $person . '">
                        <input type="hidden" name="project_id" value="' . $project_id . '">
                        <button type="submit" name="update_person">update</button>
                    </form>
                </span>
                <span>
                    <form action="./?persons" method="post">
                        <input type="hidden" name="person_id" value="' . $id . '">
                        <button type="submit" name="delete_person">delete</button>
                    </form>
                </span>
            </div>
        ';
    }
} else {
    echo '<p>"Persons" data table is empty</p>';
}

function getUpdateForm() {
    require_once './inc/get_projects.php';
    $projects = getProjects();
    printMsg();
    echo '
                    <div class="menu"><form action="./inc/update_person_data.php" method="post">
                        <input type="hidden" name="person_id" value="' . $_POST['person_id'] . '">
                        <label for="person_name">update name</label> <label for="project_name">assign project</label></br>
                        <input type="text" name="person_name" id="person_name" value="' . $_POST['person_name'] . '">
                        <select id="project_name" name="project_id">
                        <option value="" selected></option>';
    foreach ($projects as $p) {
        list($id, $project, ) = $p;
        if ($_POST['project_id'] == $id) {
            echo '<option value="' . $id . '" selected>' . $project . '</option>';
        } else {
            echo '<option value="' . $id . '">' . $project . '</option>';
        }
    }
    echo '                            
                        </select>
                        <button type="submit" name="update_person">save</button>
                    </form></div>
                ';
}

function getInsertionForm() {
    printMsg();
    echo '
                    <div class="menu"><form action="./inc/insert_data.php" method="post">
                    <label for="person_name">add person</label></br>
                        <input type="text" name="person_name" id="person_name" placeholder="name">
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
