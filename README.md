
# Library Management System

This project is a simple Library Management System designed to help library staff manage books, issue them to students, and maintain records. The backend is implemented using PHP and MySQL, while the frontend can be HTML, CSS, and JavaScript. Below are the steps to set up the project locally using XAMPP.

## Prerequisites 

- **XAMPP** (Apache, MySQL)
- A web browser (Google Chrome, Firefox, etc.) 

## Setup Instructions

### 1. Download the Project
Download and extract the project source code to your local machine.

### 2. Place the Source Code in the htdocs Directory
After extracting the project, move the source code folder into your XAMPP's `htdocs` directory. The default path for `htdocs` will typically be:


Make sure to place the folder inside `htdocs`.

### 3. Start XAMPP
Open the XAMPP Control Panel and start the following services:
- **Apache** (for web server)
- **MySQL** (for database server)

### 4. Setup the Database
1. Open your web browser and navigate to [phpMyAdmin](http://localhost/phpmyadmin/).
2. Once inside phpMyAdmin, click on **Databases** from the top navigation menu.
3. Create a new database named `library`.
4. Select the newly created `library` database and import the provided SQL file located in the project source code.

### 5. Configure Database Credentials
- Inside the project folder, locate the config file in both `includes` folders.
- Update the database username, password, and other connection settings as necessary according to your local setup.

### 6. Access the Application
Once everything is set up, you can access the application by visiting the following URL:


## Troubleshooting
- Ensure that Apache and MySQL services are running in the XAMPP Control Panel.
- If you encounter any issues accessing the database, check the database connection settings in the config file.

## License
This project is open-source and available under the [MIT License](LICENSE).

[LIBRARY MANAGEMENT SYSTEM ](http://localhost/Online-Library-Management-System-PHP/library/adminlogin.php)
