<?php

$connection = null;

function data_connect() {
    global $connection;

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "horror_quiz";

    if($connection == null) {
        $connection = mysqli_connect($server, $username, $password, $database);
    }
}

function data_answerNextQuestion($questions, $answers) {
    // Use the global connection
    global $connection;

    if($connection != null) {
        // Overwrite the existing password value as a hash
        $questions = questions_hash($questions, );
        // Insert username and hashed password
        mysqli_query($connection, "INSERT INTO `questions`(`questions`)
        VALUES ('answers')
       ");
    }
}


function data_verifyAnswer($questions, $answers) {
    // Use the global connection
    global $connection;

    // Create a default value
    $status = false;

    if($connection != null) {
        // Use WHERE expressions to look for username
        $results = mysqli_query($connection, "INSERT INTO `questions`(`questions`)
         VALUES ('answers')
        ");
        
        // mysqli_fetch_assoc() returns either null or row data
        $row = mysqli_fetch_assoc($results);
        
        // If $row is not null, it found row data.
        if($row != null) {
            // Verify password against saved hash
            if(question_verifyAnswer($questions, $row["results"])) {
                $status = true;
            }}
        }


    return $status;
}

function data_close() {
    global $connection;
    
    if($connection != null) {
     mysqli_close($connection);
    }
}

?>
