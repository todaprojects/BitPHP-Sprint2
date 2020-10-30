# BitPHP-Sprint2

 Personnel management system - a CRUD application for managing data of:
  - projects;
  - persons;
  - project assignments.

## Features

  ### personnel management
  - print the list of all persons on the database;
  - add new person;
  - change data of listed person:
    - person name;
    - assignment to a project.
  - delete data of listed person.
    
  ### projects management
  - print the list of all projects on the database;
  - add new project;
  - delete data of listed project.
  
## Usage

1) App uses MySql database. The pre-configured database can be imported from the **_'db_personnel_management.sql'_** file, located in the **_'config'_** folder. Database tables:

  ![image](https://user-images.githubusercontent.com/70706753/97680514-7598c300-1a9f-11eb-920f-3100441b39c2.png)

2) MySql database configuration file **_'db_config.php'_** is located in the **_'config'_** folder. The following fields must be set matching your MySql server:

        'localhost' - location of your MySQL server and database
        'username' - user name of your MySQL server
        'password' - user password of your MySQL server

3) After database configuration succeeds, app can be started by running **_'index.php'_** on application's public document root directory.

  ![image](https://user-images.githubusercontent.com/70706753/97693085-49823f80-1aa9-11eb-9fc7-7b3b5bfd9297.png)

    By clicking on 'PROJECTS' or 'PERSONS' links, the app opens a respective page.

4) Managing 'PROJECTS':

    - adding new project:

    ![image](https://user-images.githubusercontent.com/70706753/97696616-83a21000-1aae-11eb-9660-fa90013a8215.png)

    - changing data of listed project:

    ![image](https://user-images.githubusercontent.com/70706753/97696619-856bd380-1aae-11eb-910a-ef922b367aa4.png)

    - deleting project data:

    ![image](https://user-images.githubusercontent.com/70706753/97696628-87359700-1aae-11eb-96e9-6ac024d1c480.png)

5) Managing 'PERSONS':

    - three corresponding actions, mentioned above;

    - assigning project to a person after clicking **_'update'_** button:

    ![image](https://user-images.githubusercontent.com/70706753/97696631-88ff5a80-1aae-11eb-853c-5bbaf0b6b44f.png)
