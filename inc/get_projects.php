<?php

function getProjects() {
    require_once('connect_db.php');
    $conn = connectDb();

    $sql = '
        SELECT 
            projects.id as id, 
            projects.name as project, 
            group_concat(persons.name ORDER BY persons.name ASC SEPARATOR \', \') as persons 
        FROM persons
        RIGHT JOIN projects
        ON persons.project_id = projects.id
        GROUP BY projects.id;
    ';

    $projects = array();
    
    try {
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $projects[$i++] = array($row['id'], $row['project'], ($row['persons'] ?? '-'));
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
    return $projects;
}
