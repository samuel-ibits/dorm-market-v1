
<?php include('Mail.php'); // includes the PEAR Mail class, already on your server.

session_start();
$useri=$_SESSION['dormuserid'];

if (isset($_POST['submit'])){
$usefull = $_POST['usefull']; // form field
 $experience= $_POST['experience']; // form field
 $newfeauture = $_POST['newfeauture']; // form field
 
 $mostvalue = $_POST['mostvalue'];
$mostused= $_POST['mostused'];
$teribleexp = $_POST['teribleexp'];
 $improve = $_POST['improve'];

$username = 'support@dorm.com.ng'; // your email address
$password = 'J[G-W7hxUGpr'; // your email address password

$from = "dormcomn@dorm.com.ng";
$to = "dormcomn@dorm.com.ng";
$subject = " Dorm Feedback form - User feedback";
$body= "userid:".$useri."Is this app usefull to you (Yes/No) : ".$usefull." <br> Rate your experience using this app(1-10): ".$experience." <br>If you could suggest a new feauture what will it be and why?:".$newfeauture." <br> What part of the app do you find most valueable: ".$mostvalue." <br> Which app feauture do you use most?: ".$mostused." <br>  Narrate a terible expereince with the app (if any) : ".$tetibleexp." <br>   Suggest a solution to improve this app: ".$improve."  ";

$headers = array ('From' => $from, 'To' => $to, 'Subject' => $subject); // the email headers
$smtp = Mail::factory('smtp', array ('host' =>'localhost', 'auth' => true, 'username' => $username, 'password' => $password, 'port' =>'25'));$mail = $smtp->send($to, $headers, $body); // sending the email

if (PEAR::isError($mail)){
echo("<p>" . $mail->getMessage() . "</p>");
}
else {
echo("<p>Message successfully sent!</p>");
echo'<script>window.history.go(-2); </script>';
// header("Location: http://www.example.com/"); // you can redirect page on successful submission.
}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="theme-color" content="#1597E2">
   
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dorm - Feedback</title>       
    <link rel="shortcut icon" href="images/dorm_icon.png" type="image/x-icon">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="css/feedback.css" >
    </head>
    <body >
        <div class="container">
            <div class="imagebg"></div>
            <div class="row " style="margin-top: 50px">
                <div class="col-md-6 col-md-offset-3 form-container">
                    <h2>Feedback</h2> 
                    <p> Please provide your feedback below: </p>
                    <form role="form" method="post" id="reused_form">
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>Is this app helpful ?</label>
                                <p>
                                    <label class="radio-inline">
                                      <form actio="" method="">  <input type="radio" name="useful" id="radio_experience" value="yes" >
                                        Yes 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="useful" id="radio_experience" value="no" >
                                        No 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="useful" id="radio_experience" value="maybe" >
                                        Maybe 
                                    </label>
                                </p>
                                <label>Rate your experience with the app ?</label>
                                <p>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="yes" >
                                        Good 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="no" >
                                        Bad 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="maybe" >
                                        Average 
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="comments"> If you could suggest a new feauture what will it be and why?:</label>
                                <textarea class="form-control" type="textarea" name="newfeauture" id="comments" placeholder="Your Comments" maxlength="6000" rows="7"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="name"> What part of the app do you find most valueable:</label>
                                <input type="text" class="form-control" id="" name="mostvalue" required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for=""> Which app feauture do you use the most:</label>
                                <input type="" class="form-control" id="" name="mostused" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="comments"> Narrate a terible experience with the app (if any):</label>
                                <textarea class="form-control" type="textarea" name="teribleexp" id="comments" placeholder="Your Comments" maxlength="6000" rows="7"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label for="comments"> Suggest a solution to improve this app:</label>
                                    <textarea class="form-control" type="textarea" name="improve" id="comments" placeholder="Your Comments" maxlength="6000" rows="7"></textarea>
                                </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button type="submit" class="btn btn-lg btn-warning btn-block" name="submit" >Post </button></form>
                            </div>
                        </div>
                    </form>
                  </div>
            </div>
        </div>
    </body>
</html>