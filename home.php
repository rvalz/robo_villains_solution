<?php
    // I will be connecting to the database on this page. I will be running an SQL query that will populate my table.
    require_once 'db_connection.inc.php';
    // Since this line of code is here, I have access to all the variables declared in db_connection.inc.php.
    // This means I have access to the variable $connection, which I will use in the table below.
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Robo Villians</title>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<div class="container">
    <?php
        // Remember you can add PHP tags where ever you want. However, when using includes and requires, remember that you need to
        // consider where on the page you want to add it. Taking a look at the HTML code in the header.inc.php file, I choose
        // to add the header in this specific location
        require_once 'header.inc.php';
    ?>

	<p class="lead">Here at <em>Robo Villians <sup>(&trade;)</sup></em> we manufacture only the highest quality of killer robots for your super-vilian scheming. We've made robots that fought Ultra-man, WonderDude, and Captain Fog. </p>

	<section>
    
    <?php
        // So once we've connected to the database we need to write code that will populate all the rows from the database
        // into this very nicely designed table.
        // Since we will need to connect to the database on this page (home.php) We will have to include our db_connection.inc.php
        // at the top of the page. So I've done that.

        // First things first, lets create a variable for our SQL query. We will be using the SELECT query.
        $sql = "SELECT * FROM robo_villains.robots"; // It is a string.

        // Next we will use the mysqli_query() function to execute the query. This will give me my results.
        // The function mysqli_connect() takes two arguments/parameters, the first is the connection to the database,
        // the second is the actual query which is a string.
        $results = mysqli_query($connection, $sql);
        
        
        
        // In the below paragraph we need to count the number of robots in our database and display that data.
        // Well, the number of robots is the same as the number of rows in our table. So we can use
        // mysqli_num_rows() in order to get the number of rows from our $results variable, which contains our database data.
        // mysqli_num_rows() returns the number of rows in the database. So if we save that number in a variable, we can echo
        // it out directly in the HTML code below.
        $num_rows = mysqli_num_rows($results);
    ?>
    
    <p>We currently have <?php echo $num_rows; ?> robots in stock.</p>
  
    <table class="table table-striped table-hover" id="robots">
    	<thead>
        	<tr>
            	<th>Name</th>
            	<th>Cost</th>
                <th>Description</th>
				<th>Admin</th>
            </tr>
        </thead>
    	<tbody>
            <?php
                // For the table, we want to create a loop that loops through my table rows and shows my database data.
                // We have our results from a little while earlier. Let's use that.
                // Once we have the results, we need to write code that will harvest all of my data.
                // The function that we need to use is mysqli_fetch_array(), mysqli_fetch_row, or mysqli_fetch_assoc.
                // These functions take a $result and turns it into a usable array.
                // All of these arrays take a mysqli_query object. In our case, it's the $results variable.
            
                // If you looked up the method on google you would've found mysqli_fetch_array() coupled with a 
                // while loop in order to obtain all the values of your sql table. We will use mysqli_fetch_assoc.
                // This combo is a technique used to loop through every row in a database. Generally, mysqli_fetch_assoc
                // only returns one row. But if you run it through a loop as written exactly below every single row
                // of the database will be looped through and saved as an array.
                
                while ($rows = mysqli_fetch_assoc($results)) {
                // the while loop logic reads: WHILE there are data rows in $results that can be set in an associative array, save each 
                // set of data from the rows into an array.
                // What is happening is, for each row save create a $rows variable that holds an array. It looks like this:
                // $rows = array("robot_id"=>"1", name"=>"example name", "price"=>"example price" "description", "example description");
                // This array is formed from data that is in my table. However, you don't explicitly see this array. mysqli_fetch_assoc() just creates it.
                
                // So in order to get each dataset, I just have to call the data from the associative array. I will also format it appropriately.
                // Let's end our php tag and write some HTML code in this loop.
                // We want to loop through the data and save each set of data in a <tr>, each column of data will be saved in a <td>
                ?>
                    <tr>
                        <td><?php echo $rows['name']; ?></td>
                        <td><?php echo $rows['price']; ?></td>
                        <td><?php echo $rows['description']; ?></td>
                        
                        <!-- 
                            The last column will have my delete button. This delete button will loop as well.
                            This button doesn't have to be in the table. We don't need it. All we need to do 
                            is have the delete button point to delete_robot.php along with a unique identifier of which
                            robot to delete. Hmm, what would be a good unique identifier to identify the robot that we can use?
                            Maybe robot_id, the auto incrementing primary key. The auto incrementation would make each new robot
                            have a unique robot_id. We can use this. 
                            
                            What we will do is save this unique key in the URL.
                         -->
                        <td><a href="delete_robot.php?id=<?php echo $rows['robot_id']; ?>">Delete</a></td>
                        <!-- 
                            Alright, so what did I do here? I added a question mark after the url. This is how you can
                            create key, value pairs in the URL. After the question mark, I created the key, value pair of
                            id = $rows['robot_id'].
                            So when we land on delete_robot.php, I have this data saved in the URL. To harvest this data, we use
                            $_GET. Remember, $_GET gives us data from the URL. To see how this works, look at delete_robot.php.
                        -->
                    </tr>   
                <?php 
                    // Don't forget to put the end curly brace for the while loop in a set of PHP tags AFTER the looped HTML code.
                }
                
            ?>
<!-- rows go here -->
		
        </tbody>
    </table>
    
    </section>
    
    <?php
        require_once 'footer.inc.php';
    ?>
    
</div>

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script>

</script>

</body>
</html>
