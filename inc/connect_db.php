<?php

$configFile = './config/db_config.php';

if (file_exists($configFile)) {
    require_once $configFile;
} else {
    require_once '.' . $configFile;
}

function connectDb() {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        return $conn;
    } catch (mysqli_sql_exception $e) {
        exit('<p>Error: database connection details are incorrect!</p></main>
                <footer>
                    <div>
                        &copy; 2020-10-30 todaprojects
                    </div>
                </footer>
        ');
    }
}
