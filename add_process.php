<?php

// So when the user submits the add robot form, they get sent to this page.

// What we want to do now is harvest the form variables and use them in an SQL query

// This sql query will be the INSERT INTO query, which ADDS things to the database.

// Step 1: Include the database:
require_once 'db_connection.inc.php';

// Step 2: Harvest Variables
// The form is using the post method therefore the data is stored in the $_POST array
// remember to keep track of the form's name attributes

$robot_name = $_POST['name'];
$robot_price = $_POST['cost'];
$robot_description = $_POST['description'];

// I'll leave it to you to sanitize the variables. You can strip_tags and htmlentities everything for safety

// Step 3: Construct the query using your harvested variables
$add_query = "INSERT INTO robo_villains.robots (name, price, description) VALUES ('{$robot_name}', '{$robot_price}', '{$robot_description}')";
mysqli_query($connection, $add_query);
// When writing the INSERT INTO query there are a few rules to follow. Do NOT use quotation marks when naming off the columns in the first
// set of parentheses. HOWEVER, you do need to have your values as string data, that is why you see the single quotes around my variables.
// The curly braces around the variables within my double quoted SQL query are there as a visual cue only. They serve no actual PHP function,
// which means you can exclude them if you want.

// Step 4: Redirect the user
header('Location: home.php');