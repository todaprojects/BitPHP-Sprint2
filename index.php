<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Sprint 2</title>
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <header>
        <div>
            <h1>Personnel management</h1>
            <h3><a href="./?projects">Projects</a><a href="./?persons">Persons</a></h3>
        </div>
    </header>

    <main>

        <?php

        if (count($_GET) > 0) {
            if (isset($_GET['persons'])) {
                include_once './inc/persons_table.php';
            } elseif (isset($_GET['projects'])) {
                include_once './inc/projects_table.php';
            }

            if (isset($_POST['update_person']) || isset($_POST['update_project'])) {
                getUpdateForm();
            } elseif (isset($_POST['delete_person']) || isset($_POST['delete_project'])) {
                delete();
            } else {
                getInsertionForm();
            }
        } else {
            echo '<h4>Personnel management system - a CRUD application for managing data of:';
            echo '</br></br> - projects,';
            echo '</br></br> - persons,';
            echo '</br></br> - project assignments.</h4>';
        }

        ?>

    </main>

    <footer>
        <div>
            &copy; 2020-10-30 todaprojects
        </div>
    </footer>

</body>

</html>