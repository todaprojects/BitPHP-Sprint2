<?php

function getPersons() {
    require_once('connect_db.php');
    $conn = connectDb();

    $sql = '
        SELECT persons.id as id, persons.name as person, projects.id as project_id, projects.name as project FROM persons
        LEFT JOIN projects
        ON persons.project_id = projects.id;
    ';

    $persons = array();

    try {
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $persons[$i++] = array($row['id'], $row['person'], $row['project_id'], ($row['project'] ?? '-'));
            }
        }
    } catch (mysqli_sql_exception $e) {
        exit('<p>Error: database table does not exist!</p></main>
                <footer>
                    <div>
                        &copy; 2020-10-30 todaprojects
                    </div>
                </footer>
        ');
    }
    mysqli_close($conn);
    return $persons;
}
