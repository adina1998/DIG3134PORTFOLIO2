<?php
include("data.php");

function data_answerNextQuestion() {
    // Validate and sanitize.
    $result = data_sanitize();
    // Open connection.
    data_connect();

    // Use connection.
    //
    // We want to make sure we don't add
    //  duplicate values.
    if(!data_verifyAnswer($result["questions"], $result["answers"])) {
        // Username does not exist.
        // Add a new one.
        data_answerNextQuestion($result["questions"], $result["answers"]);
    }
    
    // Close connection.
    data_close();
}


?>