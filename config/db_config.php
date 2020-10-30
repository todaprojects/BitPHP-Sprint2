<?php

define('DB_HOST', 'localhost');     // MySQL hostname - the location of your MySQL server and database
define('DB_USER', 'username');      // user name of your MySQL server
define('DB_PASSWORD', 'password');  // user password of your MySQL server
define('DB_NAME', 'db_personnel_management');   // the name of database (should not be changed if importing a pre-configured database from 'db_personnel_management.sql')

/*

Database user ('DB_USER') should have privileges not lower than following (SQL statement):

    GRANT SELECT, INSERT, UPDATE, DELETE ON `db_personnel_management`.* TO 'username'@'localhost'; 
    -- `db_personnel_management`, 'username' and 'localhost' should match the above defined values: respectively next to 'DB_NAME', 'DB_USER' and 'DB_HOST'

 */