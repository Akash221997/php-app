<!DOCTYPE html>
<html>
<head>
    <title>Simple To-Do List</title>
</head>
<body>
    <h1>To-Do List</h1>

    <form action="index.php" method="post">
        <input type="text" name="task" placeholder="Add a new task" required>
        <input type="submit" value="Add">
    </form>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the new task from the form
        $newTask = $_POST["task"];
        
        // Check if the task is not empty
        if (!empty($newTask)) {
            // Open a file to store tasks (create it if it doesn't exist)
            $file = fopen("tasks.txt", "a");
            
            // Add the new task to the file
            fwrite($file, $newTask . "\n");
            
            // Close the file
            fclose($file);
        }
    }
    ?>

    <h2>Tasks:</h2>
    <ul>
        <?php
        // Read and display the list of tasks from the file
        $tasks = file("tasks.txt", FILE_IGNORE_NEW_LINES);
        
        foreach ($tasks as $task) {
            echo "<li>$task</li>";
        }
        ?>
    </ul>
</body>
</html>
