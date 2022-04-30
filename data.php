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
    $A=$_POST['A'];
    $C=$_POST['C'];
    $C=$_POST['C'];
    $query="INSERT INTO `questions`(`questions`) 
    VALUES ('A', 'C', 'C')";
    try {
        $result = mysqli_query($connection, $query);
        if($result){
            if(mysqli_affected_rows($connection)>0){
                echo "data submitted";
            }
            else {
                echo "data not submitted";
            }
        }
    } catch(Exception $ex){
        echo ("error in connection");
    }
    $querytwo = "select question.question, answers.answer from answers inner join
    (select question from questions order by id desc limit 1)
    as question on question.question = answers.answer";
    $resulttwo = mysqli_query($connection, $querytwo);
    if($resulttwo){
        if(mysqli_affected_rows($connection)>0){
            $querythree="INSERT INTO `compare`(`value`) VALUES ('correct')";
            $resultthree=mysqli_query($connection,$querythree);
        }else{
                $querythree = "INSERT INTO `compare`(`value`) VALUES ('incorrect')";
                $resultthree=mysqli_query($connection, $querythree);

            }
    }
 if (isset($_POST['Check'])){
     $queryfour = "select value from compare order by id desc limit 1";
     $resultfour = mysqli_query($connection, $queryfour);
     if($resultfour){
         if(mysqli_num_rows($resultfour)){
             while($rows = mysqli_fetch_array($resultfour, MYSQL_BOTH))
             {
                 echo($rows['value']."<br>")
             }
         }
     }else{
         echo "error in result";
     }
 }   
}

?>
