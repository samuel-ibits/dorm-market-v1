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
    <title>Setting</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="css/studytools.css">
     <link rel="stylesheet" href="css/mynote.css">
    <link rel="stylesheet" href="css/menucss.css">
    <link rel="stylesheet" href="css/library.css">
   

    
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
                <a href="studytools.php?t=<?php echo$t; ?>">
                    <li class="menu-item">
                        <div class="icon-img"><img src="images/bag-img.png" alt=""></div>
                        <p class="menu-list-title-sub-side">Study Tools</p>
                    </li>
                </a>
                <a href="coursereview.php?t=<?php echo$t; ?>">
                    <li class="menu-item">
                        <div class="icon-img"><img src="images/coursereview.png" alt=""></div>
                        <p class="menu-list-title-sub-side">Course Review</p>
                    </li>
                </a>
                <a href="texter.php?t=<?php echo$t; ?>">
                    <li class="menu-item">
                        <div class="icon-img"><img src="images/text.png" alt=""></div>
                        <p class="menu-list-title-sub-side">Texter</p>
                    </li>
                </a>
                <a href="accomodia.php?t=<?php echo$t; ?>">
                    <li class="menu-item">
                        <div class="icon-img"><img src="images/house.png" alt=""></div>
                        <p class="menu-list-title-sub-side">Accomodia</p>
                    </li>
                </a>
                <a href="market.php?t=<?php echo$t; ?>">
                    <li class="menu-item">
                        <div class="icon-img"><img src="images/market.png" alt=""></div>
                        <p class="menu-list-title-sub-side">Market</p>
                    </li>
                </a>
                <a href="setting.php?t=<?php echo$t; ?>">
                    <li class="active-nav  menu-item">
                        <div class="icon-img"><img src="images/setting.png" alt=""></div>
                        <p class="menu-list-title-sub-side">Setting</p>
                    </li>
                </a>
            </ul>
            <?php include'../connect.php';


$rselr="SELECT * FROM profile WHERE Id='".$userid."'";
$result= $conn6->query($rselr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
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
                    <img src="https://dorm.com.ng/'.$ppic.'" alt="'.$username.'">
                </div>
                <div class="user-info">
                    <p class="name">'.$name.'</p>
                    <p class="username">@'.$username.'</p>
                </div>
                <div class="icon-holder">
                    <i class="bi bi-three-dots"></i>
                </div>
            </div>
        </div>';
}}
        
         ?>

        <div class="page-content">
            <div class="study-tools-page">
                <a href="profile.php?t=<?php echo$t; ?>" class="study-tool-card">

                    <div class="center">
                        <div class="study-tool-icon">
                            <ion-icon name="person"></ion-icon>
                        </div>
                    </div>
                    <div class="study-tool-info">
                        <p class="study-tool-title">PROFILE</p>
                        <p class="study-tool-sub-text">Veiw and edit profile</p>
                    </div>

                </a>
                <a href="wallet.php?t=<?php echo$t; ?>" class="study-tool-card">

                    <div class="center">
                        <div class="study-tool-icon">
                            <ion-icon name="wallet"></ion-icon>
                        </div>
                    </div>
                    <div class="study-tool-info">
                        <p class="study-tool-title">WALLET</p>
                        <p class="study-tool-sub-text">keep track of account trasactions</p>
                    </div>

                </a>
                
                
                  <a href="manageproduct.php?t=<?php echo$t; ?>" class="study-tool-card">

                    <div class="center">
                        <div class="study-tool-icon">
                            <ion-icon name="analytics-outline"></ion-icon>
                        </div>
                    </div>
                    <div class="study-tool-info">
                        <p class="study-tool-title"> MANAGE ORDERS</p>
                        <p class="study-tool-sub-text">Track your orders.</p>
                    </div>
                </a>

             
                <a href="marketdashboard.php?t=<?php echo$t; ?>" class="study-tool-card">

                    <div class="center">
                        <div class="study-tool-icon">
                            <ion-icon name="speedometer"></ion-icon>
                        </div>
                    </div>
                    <div class="study-tool-info">
                        <p class="study-tool-title"> MARKET DASHBOARD</p>
                        <p class="study-tool-sub-text">track product data being sold on market e.g Boosted products,
                            inventory,transaction history.</p>
                    </div>

                </a>
                <a href="accomodiadashboard.php?t=<?php echo$t; ?>" class="study-tool-card">

                    <div class="center">
                        <div class="study-tool-icon">
                            <ion-icon name="home"></ion-icon>
                        </div>
                    </div>
                    <div class="study-tool-info">
                        <p class="study-tool-title"> ACCOMODIA DASHBOARD</p>
                        <p class="study-tool-sub-text">Real estate management system for managing your Houses.</p>
                    </div>

                </a>
               

                <a href="resourceteam.php?t=<?php echo$t; ?>" class="study-tool-card">

                    <div class="center">
                        <div class="study-tool-icon">
                            <ion-icon name="people"></ion-icon>
                        </div>
                    </div>
                    <div class="study-tool-info">
                        <p class="study-tool-title">RESOURCE TEAM</p>
                        <p class="study-tool-sub-text">complete simple tasks and earn reward(s) on dorm</p>
                    </div>

                </a>

                <a href="feedback.php?t=<?php echo$t; ?>" class="study-tool-card">

                    <div class="center">
                        <div class="study-tool-icon">
                            <ion-icon name="chatbubble"></ion-icon>
                        </div>
                    </div>
                    <div class="study-tool-info">
                        <p class="study-tool-title">FEEDBACK</p>
                        <p class="study-tool-sub-text">give feed back on our services so we can serve you better</p>
                    </div>

                </a>


                <a href="#!" class="study-tool-card" id="shareDorm">

                    <div class="center">
                        <div class="study-tool-icon">
                            <ion-icon name="share-social"></ion-icon>
                        </div>
                    </div>
                    <div class="study-tool-info">
                        <p class="study-tool-title">SHARE</p>
                        <p class="study-tool-sub-text">share dorm to your friends and family </p>
                    </div>

                </a>

                <a href="index.html" class="study-tool-card">

                    <div class="center">
                        <div class="study-tool-icon">
                            <ion-icon name="exit"></ion-icon>
                        </div>
                    </div>
                    <div class="study-tool-info">
                        <p class="study-tool-title">EXIT</p>
                    </div>

                </a>
            </div>
        </div>
        <div class="page-side">

            <div class="blue-area-2">
                <p class="heading-text">Setting</p>

                <div class="bottom-side-list">
                    <ul class="smaller">
                        <a href="profile.php?t=<?php echo$t; ?>">
                            <li class="menu-item">
                                <div class="icon-img-small-icon">
                                    <ion-icon name="person"></ion-icon>
                                </div>
                                <p class="menu-list-title-sub-side-1">Profile</p>
                            </li>
                        </a>

                        <a href="wallet.php?t=<?php echo$t; ?>">
                            <li class="menu-item">
                                <div class="icon-img-small-icon">
                                    <ion-icon name="wallet"></ion-icon>
                                </div>
                                <p class="menu-list-title-sub-side-1">Wallet</p>
                            </li>
                        </a>
                        <a href="manageproduct.php?t=<?php echo$t; ?>">
                            <li class="menu-item">
                                <div class="icon-img-small-icon">
                                    <ion-icon name="home"></ion-icon>
                                </div>
                                <p class="menu-list-title-sub-side-1">Manage product</p>
                            </li>
                        </a>
                      
                        <a href="marketdashboard.php?t=<?php echo$t; ?>">
                            <li class="menu-item">
                                <div class="icon-img-small-icon">
                                    <ion-icon name="speedometer"></ion-icon>
                                </div>
                                <p class="menu-list-title-sub-side-1">Market dashboard</p>
                            </li>
                        </a>
                        <a href="accomodiadashboard.php?t=<?php echo$t; ?>">
                            <li class="menu-item">
                                <div class="icon-img-small-icon">
                                    <ion-icon name="speedometer"></ion-icon>
                                </div>
                                <p class="menu-list-title-sub-side-1">Accomodia dashboard</p>
                            </li>
                        </a>
                        <a href="resourceteam.php?t=<?php echo$t; ?>">
                            <li class="menu-item">
                                <div class="icon-img-small-icon">
                                    <ion-icon name="people"></ion-icon>
                                </div>
                                <p class="menu-list-title-sub-side-1">Resource team</p>
                            </li>
                        </a>
                        <a href="feedback.php?t=<?php echo$t; ?>">
                            <li class="menu-item">
                                <div class="icon-img-small-icon">
                                    <ion-icon name="chatbubble"></ion-icon>
                                </div>
                                <p class="menu-list-title-sub-side-1">Feedback</p>
                            </li>
                        </a>
                        <a href="#!" id="shareDorm">
                            <li class="menu-item">
                                <div class="icon-img-small-icon">
                                    <ion-icon name="share-social"></ion-icon>
                                </div>
                                <p class="menu-list-title-sub-side-1">Share</p>
                            </li>
                        </a>
                        <a href="index.html">
                            <li class="menu-item">
                                <div class="icon-img-small-icon">
                                    <ion-icon name="exit"></ion-icon>
                                </div>
                                <p class="menu-list-title-sub-side-1">Exit</p>
                            </li>
                        </a>
                    </ul>
                </div>
                <div class="notification-holder-2">
                    <ion-icon name="notifications"></ion-icon>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".study-tool-tool").fadeOut('fast');
        $(".grid-icon").click(function () {
            $(".study-tool-tool").fadeToggle('fast');
            $(".grid-icon").fadeToggle('fast');
            $(".close-icon").fadeToggle('fast');
        });

        $(".close-icon").click(function () {
            $(".study-tool-tool").fadeToggle('fast');
            $(".grid-icon").fadeToggle('fast');
            $(".close-icon").fadeToggle('fast');
        });
    </script>
    <script src="js/script.js"></script>
</body>

</html>