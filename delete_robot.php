<?php
// This is the delete_robot.php file.
// All we have to do in this file is:
// 1. Connect to the Database
// 2. Harvest the robot_id to delete from the URL 
// 3. Write a DELETE SQL query
// 4. Redirect the user back to the homepage.

// Step 1: Connect to the Database
require_once 'db_connection.inc.php';

// Step 2: Harvest the robot_id to delete from the URL 
    $robo_id = $_GET['id'];

// Step 3: Write the Delete SQL Query

    $delete_sql = "DELETE FROM robo_villains.robots WHERE robot_id = $robo_id";
    mysqli_query($connection, $delete_sql);
    // Once the query is run, your database will be updated immediately.

// Step 4: Redirect the user back to the homepage.
    header('Location: home.php');

// this file doesn't end with ? > ... ask me about that!