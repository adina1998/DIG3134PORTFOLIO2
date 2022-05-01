<?php

$connection = null;

function database_connect() {
    global $connection;

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "horror_quiz";



    if($connection == null) {
        $connection = mysqli_connect($server, $username, $password, $database);
    }
}

function database_verifyAnswer($question, $answer){
    global $connection;
    $status = false;
    if($connection != null) {
        // Use WHERE expressions to look for username
        $results = mysqli_query($connection,"INSERT INTO `questions`(`questions`) 
        VALUES ('anthonyhopkins')");
        
        // mysqli_fetch_assoc() returns either null or row data
        $row = mysqli_fetch_assoc($results);
        
        // If $row is not null, it found row data.
        if($row != null) {
            // Verify password against saved hash
            if(question_verify($question, $row["answer"])) {
                $status = true;
            }
        }
}

    return $status;
} 



function database_close() {
    // user global connection
    global $connection;

    if($connection != null) {
        mysqli_close($connection);
    }
}

?>
