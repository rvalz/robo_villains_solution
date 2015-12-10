<?php
// robo_villians/db_connection.inc.php

// This file is used to connect to the database and ONLY to CONNECT TO THE DATABASE.
// We want to create the variable that holds our mysqli connection. We will need this variable
// later in order to do our SQL queries

$connection = mysqli_connect("localhost", "root", "");
// mysqli_connect() takes 4 parameters. (host, username, password, database). However, if you only specify the first 3 parameters
// and omit the database name, you can use mysqli_select_db() as shown below to make the connection. 
// Why? Well, there will be some cases in which you would want your database call to be separated. You will use it when you need it,
// but in this case, I'm just showing you what all your possible options are.

// Note that the username 'root' and password '' are defaults in XAMPP localhost. You can add more user credentials using http://localhost/phpmyadmin.
// Also note that we are inserting data and deleting data in this database. It is important to use
// user credentials that have those privileges. generally, the default "root" credentials have these permissions.

mysqli_select_db($connection, 'robo_villians');


// In order to view this demonstration on your computer's xampp server, you will have to import robo_villians.sql database
// into your localhost/phpmyadmin database.

// Everytime I need to run a query or do anything with the database, I need to include this file and use the $connection variable I have created.
