
 <?php include'../../api/token.php';
$t=$_GET['t'];
if($t==''){ $t=$_COOKIE['dormtoken'];}
$userid=validatetoken($t);

if($userid=='null'){
 header('Location: https://dorm.com.ng/v2.5/app');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="theme-color" content="#1597E2">
    <link rel="shortcut icon" href="images/dorm_icon.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Texter</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="css/mynote.css">
    <link rel="stylesheet" href="css/studytools.css">
    <link rel="stylesheet" href="css/menucss.css">
    <link rel="stylesheet" href="css/coursereview.css">
    <link rel="stylesheet" href="css/texter.css">

    <style>
      
    </style>
</head>

<body>
    <div class="top-mobile-menu">
        <div class="mobile-logo"><img src="images/dorm_no_bg.png" alt=""></div>

        <span class="noti-mobile">
            <ion-icon name="notifications"></ion-icon>
        </span>
    </div>

    <div class="page-container">
        <div class="menu">
            <div class="logo-img">
                <img class="logo-pc" src="images/dorm_logo_white.png" alt="">

                <span class="menu-toggler">
                    <ion-icon name="menu"></ion-icon>
                </span>
            </div>
            <ul class="menu-list">
                <a href="studytools.php?t=<?php echo$t; ?> ">
                    <li class="menu-item">
                        <div class="icon-img"><img src="images/bag-img.png" alt=""></div>
                        <p class="menu-list-title-sub-side">Study Tools</p>
                    </li>
                </a>
                <a href="coursereview.php?t=<?php echo$t; ?> ">
                    <li class="menu-item">
                        <div class="icon-img"><img src="images/coursereview.png" alt=""></div>
                        <p class="menu-list-title-sub-side">Course Review</p>
                    </li>
                </a>
                <a href="texter.php?t=<?php echo$t; ?> ">
                    <li class="active-nav   menu-item">
                        <div class="icon-img"><img src="images/text.png" alt=""></div>
                        <p class="menu-list-title-sub-side">Texter</p>
                    </li>
                </a>
                <a href="accomodia.php?t=<?php echo$t; ?> ">
                    <li class="menu-item">
                        <div class="icon-img"><img src="images/house.png" alt=""></div>
                        <p class="menu-list-title-sub-side">Accomodia</p>
                    </li>
                </a>
                <a href="">
                    <li class="menu-item">
                        <div class="icon-img"><img src="images/market.png" alt=""></div>
                        <p class="menu-list-title-sub-side">Market</p>
                    </li>
                </a>
                <a href="">
                    <li class="menu-item">
                        <div class="icon-img"><img src="images/setting.png" alt=""></div>
                        <p class="menu-list-title-sub-side">Setting</p>
                    </li>
                </a>
            </ul>
            
      <?php include '../connect.php';
    include '../../api/texterapi.php';
error_reporting(0);


$selry="SELECT * FROM profile WHERE Id='".$userid."'";
$result= $conn6->query($selry);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
$nam=$row["name"];
$name = substr($nam, 0, 7);
$balance=$row["mcred"];



   $name=$row["name"];
  $pic=$row["ppic"];
  $userschool=$row["school"];
  
  $usercourse=$row["course"];
  
  $username=$row["username"];
  
  
  
  
  $ppic=$row["ppic"];
  if($ppic=="media/"){$ppic="media/ppic/pro.png";
  }else{ $ppic=$row["ppic"];}
 
         echo'   <div class="user">
                <div class="user-img">
                    <img src="https://dorm.com.ng/'.

$ppic.'" alt="'.$username.'">
                </div>
                <div class="user-info">
                    <p class="name">'.$name.'</p>
                    <p class="username">@'.

$username.'</p>
                </div>
                <div class="icon-holder">
                    <i class="bi bi-three-dots"></i>
                </div>
            </div>
        </div>';
}}
        
        $tphone=$_GET['phone'] ;
         

if(isset($_POST['send'])) { 

$topic=$_POST['sender'];
if(empty($topic)){$ale2 = "Message Credit Not Sent. Please update profile";
echo "<script type='text/javascript'>alert('$ale2'); </script>";}else{
    
$message=$_POST['message'];
$phone=$_POST['phone'];
$time= date("h:i:sa");
$date=date("Y/m/d");

$n=11;
$chart=strlen($phone);
if($chart > $n){
    $integer=(Int)($chart/$n);
    $msgn=$integer;
    
    }else{$msgn=1;}
    
if($balance >= $msgn){    
    
texterapi($topic, $phone, $message);
    
    
$in = "INSERT INTO texter VALUES ('', '$topic', '$message', '$phone', '$date', '$time', '$name', '$userid')";


if ($conn10->query($in) === TRUE) {
    $ale1 = "Message Sent Successfuly";
    
echo " <script type='text/javascript'>alert('$ale1'); </script>";
$nbalance=$balance - $msgn; 

    $upd="UPDATE profile SET mcred = $nbalance where Id='".$userid."'";
    mysqli_query($conn6,$upd);
        if ($conn6->query($upd) === TRUE) {$ale2 = "Your message credit remains". $nbalance;
echo "<script type='text/javascript'>alert('$ale2'); </script>";
} 

} else {
$ale2 = "Message Not Sent";
echo "<script type='text/javascript'>alert('$ale2'); </script>";

}

 

}else{$ale2 = "Message Credit Not Sufficient. Please Recharge";
echo "<script type='text/javascript'>alert('$ale2'); </script>";
}


    
}

} 


    
    ?>
        <div class="page-content">
          <div class="texter-send-msg">
            <div class="head">
                <h1>TEXTER</h1>
            </div>

            <div class="body-texter">
                <div class="mobile-bottom-texter">
                    <div class="mobile-bottom-texter-first-div">
                        <div class="mobile-number-of-texter">
                            You have <span class="bolder-text"> <?php echo $balance; ?> </span> texter credit
                        </div>
                    </div>
                    
                    </div>
    
                    <div class="mobile-bottom-texter-2">
                        <div class="mobile-bottom-texter-list">
                            <ul>
                                <li>Send text messages to friends and family without airtime</li>
        
                                <li>Get texter credits by increasing your engagement on dorm.com.ng</li>
                            </ul>
                        </div>               
                    </div>

                <div class="input-1-holder">
                    <p class="label-for-input">Recievers Number</p>
                   <form method="post" action=""> <input type="number" placeholder="08198765432" name="phone"  value="<?php echo $tphone; ?>" id="">
                    <p class="blue-text">Select from contact</p>
                </div>



                <div class="input-1-holder">
                    <p class="label-for-input">Message</p>
                   <textarea name="message" placeholder="Hello there . . ." id="" cols="30" rows="10   a"></textarea>
                </div>

                <div class="input-2-holder">
                    <h3>Sender Name</h3>
                   <div class="sender-div">
                    <div class="sender-input">
                        <input type="radio" name="sender" value="<?php echo $name; ?>" id="">        
                        <p>Profile Name</p>
                    </div>

                    <div class="sender-input">
                        <input type="radio" name="sender" value="<?php echo $username; ?>"  id="">        
                        <p>User Name</p>
                    </div>

                    <div class="sender-input">
                        <input type="radio" name="sender" value="Anonymous"  id="">        
                        <p>Hidden</p>
                    </div>
                   </div>
                </div>
              
                <div class="big-send-btn">
                    <button name="send">SEND</button></form>
                </div>
                <div class="bottom-texter">
                <div class="bottom-texter-first-div">
                    <div class="number-of-texter">
                        You have <span class="bolder-text"><?php echo $balance; ?></span> texter credit
                    </div>
                </div>
                
                </div>

                <div class="bottom-texter-2">
                    <div class="bottom-texter-list">
                        <ul>
                            <li>Send text messages to friends and family without airtime</li>
    
                            <li>Get texter credits by increasing your engagement on dorm.com.ng</li>
                        </ul>
                    </div>               
                </div>
            </div>
          </div>


        </div>
        <div class="page-side">
            <div class="search-2">
                <ion-icon name="search"></ion-icon> <input type="text" placeholder="Search for a note" name="" id="">
            </div>
               <div class="double-section">

                <div class="side-user-info">
                    <div class="userimage-info-side">
                        <div class="user-img-side">
                            <img src="https://dorm.com.ng/<?php echo $ppic; ?>" alt="">
                        </div>
                        <div class="user-info-side">
                            <p class="name-side"><?php echo $name; ?></p>
                            <p class="username-side">@<?php echo $username; ?></p>
                        </div>
                    </div>
                </div>
                <a href="texter.php?t=<?php echo$t; ?> ">
                    <div class="text-icon add-review">
                        <div class="icon">
                            <img src="images/add-icon.png" alt="">
                        </div>
                        <p class="double-section-text">Select Contact</p>
                    </div>
                </a>
               
               

                <div class="bottom-notification-2">
                    <ion-icon name="notifications"></ion-icon>
                </div>

            </div>

        </div>
    </div>
  <script src="js/script.js"></script>
</body>

</html>