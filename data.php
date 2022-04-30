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
if(isset($_POST['submit'])){
    $1991=$_POST['1991'];
    $query="INSERT INTO `questions`(`questions`) 
    VALUES ('1991')";
    try {
        $result = mysqli_query($connection, $query);
        if($result){
            if(mysqli_affected_rows($connection)>0){
                echo "data submitted";
            }
            else {
                echo "data not submitted"
            }
        }
    } catch(Exception $ex){
        echo ("error in connection");
    }
    $querytwo = "select question.question, answer.answer from answer inner join (select question from question
    order by id desc limit 1) as question on question.question = answer.answer"
    $resulttwo = mysqli_query($connection, $querytwo);
    if($resulttwo){
        if(mysqli_affected_rows($connection)>0){
            $querythree="insert into compare (value) values 
            ('correct')";
            $resultthree=mysqli_query($connection,$querythree);
        }else{
                $querythree = "into into compare (value) values
                ('incorrect')";
                $resultthree=mysqli_query($connection, $querythree);

            }
    }
    
}

?>
