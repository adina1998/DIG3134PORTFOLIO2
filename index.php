<?php
$server = "localhost";
    $username = "root";
    $password = "";
    $database = "horror_quiz";

if(isset($_POST['submit'])){
    $anthonyhopkins=$_POST['anthonyhopkins'];
    $query= "INSERT INTO `questions`(`questions`) 
    VALUES (false, 'anthonyhopkins')";
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
            while($rows = mysqli_fetch_array($resultfour))
        {
            echo($rows['value']."<br>");
        }
    }
        }else{
            echo "error in result";
        }
     }   
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <h1>The quiz for Horror Movie Lovers</h1>

        <br>
       <form action="" method="post">
           <table > </table>
        <img src="images/silenceofthelambs.jpg" width="250" height="300" alt="silence of the lambs poster">
            <br>
            <br>
           <tr>
               <td> Who is the male lead actor in the movie above?</td>
           </tr>
           <br>
           <br>
           <tr><input type="radio" name="anthonyhopkins" value="anthonyhopkins"> Anthony Hopkins</tr>

           <tr><input type="radio" name="tedtally"value="tedtally"> Ted Tally</tr>

           <tr><input type="radio" name="anthonyheald" value="anthonyheald">Anthony Heald</tr>

           <tr><input type="radio" name="jodiefoster" value="jodiefoster">Jodie Foster</tr>
           <br>
           <br>
           <img src="images/scream.jpg" width="250" height="300" alt="silence of the lambs poster">
            <br>
            <br>
           <tr>
            <td> Who was the original Ghost face?</td>
            </tr>
            <br>
            <br>
            <tr><input type="radio" name="courtneycox" value="courtneycox">Courtney Cox</tr>

            <tr><input type="radio" name="davidarquette" value="davidarquette">David Arquette</tr>

            <tr><input type="radio" name="skeetulrich" value="skeetulrich">Skeet Ulrich</tr>

            <tr><input type="radio" name="mathewlillard" value="mathewlillard">Mathew Lillard</tr>
            <br>
            <br>
            <img src="images/thesixthsense.jpg" width="250" height="300" alt="silence of the lambs poster">
            <br>
            <br>
        
            <tr>
                <td> Who played the mother in the film above?</td>
                </tr>
                <br>
                <br>
                <tr><input type="radio" name="tonicollete" value="tonicollete">Toni Collette</tr>
    
                <tr><input type="radio" name="oliviawilliams" value="oliviawilliams">Olivia Williams</tr>
    
                <tr><input type="radio" name="mischabarton" value="mischabarton">Mischa Barton</tr>
    
                <tr><input type="radio" name="brucewillis" value="brucewillis">Bruce Willis</tr>
                <br>
                <br>
                <td> <input type="submit" name="submit" value="submit"> </td>
                <td> <input type="submit" name="Check" value="Check"> </td>                
                
                <br>
                <br>
       </form> 
    </body>
</html>