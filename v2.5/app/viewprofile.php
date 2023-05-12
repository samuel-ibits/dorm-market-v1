
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
    <title>Profile</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="css/mynote.css">
    <link rel="stylesheet" href="css/menucss.css">
    <link rel="stylesheet" href="css/library.css">
    <link rel="stylesheet" href="css/studytools.css">
    <link rel="stylesheet" href="css/profile.css">

    <style>
        .bi-cash-stack {
            color: inherit;
        }

        @media only screen and (max-width: 600px) {
            .page-content {
                width: 100%;
                height: auto;
                overflow-y: scroll;
                position: absolute;
                padding: 0rem 1rem;
            }
        }
    </style>
</head>
<?php include '../connect.php';



if(isset($_GET['check'])) { 
$proid= $_GET['proid'];
}
  if($proid==""){$useridr=$userid;}else{$useridr=$proid;}
  
 
$rselr="SELECT * FROM profile WHERE Id='".$useridr."'";
$result= $conn6->query($rselr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
    
  $pic=$row["ppic"];
 if($pic=="" or $pic=="../../../media/profiles/" or $pic=="/media/profiles"  or $pic=="/media/ppic/pro.png"or $pic=="media/"){$ppic="media/ppic/pro.png";$ppid="images/image.jpg";
  }else{ $ppic=$row["ppic"];$ppid=$row["ppic"];}
$name=$row["name"];
$username=$row["username"];
$phone=$row["phone"];
$sta=$row["sta"];
$mcred=$row["mcred"];
$course=$row["course"];
$school=$row["school"];
$email=$row["email"];
$descyour=$row["descyour"];
$year=$row["year"];
$pocketid=$row["pockid"];
$howsch=$row["howsch"];
$descou=$row["descou"];
$dessch=$row["dessch"];
$dob=$row["dob"];
$bescou=$row["bescou"];
$besstudtm=$row["besstudtm"];
$rescrush=$row["rescrush"];
$irep=$row["irep"];
$enjdoing=$row["enjdoing"];
$favfood=$row["favfood"];
$ihate=$row["ihate"];
$icherish=$row["icherish"];
	
  
 }
  }
  
if(isset($_POST['save'])) {
echo'<script>alert("saved");</script>';

	$stmt =$conn6->prepare("Update profile SET Id=?, ppic=?, name=?, username=?, phone=?, sta=?, date=?, mcred=?, course=?, school=?, email=?, descyour=?, year=?, pocketid=?, howsch=?, descou=?, dessch=?, dob=?, bescou=?, besstudtm=?, rescrush=?, irep=?, enjdoing=?, favfood=?, ihate=?, icherish=?, location=?, state=? WHERE Id=?") ;
$stmt->bind_param("sssssssssssssssssssssssssssss", $id, $uploaddest1, $name, $username, $phonee, $sta, $dater, $mcred, $course, $school, $email, $descyour, $year, $pocketid, $howsch, $descou, $dessch, $dob, $bescou, $besstudtm, $rescrush, $irep, $enjdoing, $favfood, $ihate, $icherish, $location, $state, $id);
$id=$userid;
$ppi=$_FILES["ppi"];
 


		$file="ppi";
		
$medianame1=basename( $_FILES["$file"]["name"]);
$mediatemp1=$_FILES["$file"]['tmp_name'];
$loc="../../";
  $uploaddir="media/profiles/";
 $uploaddest1=$uploaddir.$medianame1;
 if($uploaddest1=="media/profiles/"){$uploaddest1=$pic;}
 move_uploaded_file($mediatemp1,$loc.$uploaddest1);
 if($uploaddest1=="media/profiles/" or $uploaddest1=="" ){$uploaddest1="media/";}
 
$dater=$daterr;

$name=$_POST['name'];
$username=$_POST['username'];
$phonee=$_POST['phone'];
$sta="1";
$mcred=5;
$course=$_POST['course'];
$school=$_POST['school'];
$email=$_POST['email'];
$descyour=$_POST['descyour'];
$year=$_POST['year'];
$pocketid=$_POST['pockid'];
$howsch=$_POST['howsch'];
$descou=$_POST['descou'];
$dessch=$_POST['dessch'];
$dob=$_POST['dob'];
$bescou=$_POST['bescou'];
$besstudtm=$_POST['besstudtm'];
$rescrush=$_POST['rescrush'];
$irep=$_POST['irep'];
$enjdoing=$_POST['enjdoing'];
$favfood=$_POST['favfood'];
$ihate=$_POST['ihate'];
$icherish=$_POST['icherish'];
	$location=$_POST['location'];
	$state=$_POST['state'];
if ( $stmt->execute()=== TRUE) {

    
$ale1 = "Profile update success";
echo " <script type='text/javascript'>alert('$ale1'); </script>";

}else{echo "An error occured please try again <br>";
echo($stmt->error);
    
}
} 


  ?>

<body onload="subname()">

   
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
                    <li class="menu-item">
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
                <a href="market.php?t=<?php echo$t; ?> ">
                    <li class="menu-item">
                        <div class="icon-img"><img src="images/market.png" alt=""></div>
                        <p class="menu-list-title-sub-side">Market</p>
                    </li>
                </a>
                <a href="setting.php?t=<?php echo$t; ?> ">
                    <li class="active-nav  menu-item">
                        <div class="icon-img"><img src="images/setting.png" alt=""></div>
                        <p class="menu-list-title-sub-side">Setting</p>
                    </li>
                </a>
            </ul>
            <?php
           echo'   <div class="user">
                <div class="user-img">
           
                </div>
                <div class="user-info">
                  
                </div>
                <div class="icon-holder">
                </div>
            </div>
        </div>';
    
         ?>
         

        
        <div class="page-content">
            <div class="profile-page">
                <div class="profile-wrapper">

                    <div class="profile-top-div">

                        <div class="profile-image-div">

                            <div class="profile-image-holder">

                                
                                   <div class="select-image-profile">
                                  
<label for="ppi"  >
                                    <i class="bi bi-camera-fill" ></i></label>
                                </div>
                                <div class="profile-image" id="profile-image-div-holder">
                                    <img src="https://dorm.com.ng/<?php echo $ppic; ?>" alt="" srcset="">
                                </div>
                            </div>
                            <div class="text-element">
                                <p><?php echo $name; ?></p>
                                <p><?php echo $username; ?></p>
                                <p><?php echo $irep; ?>
                                </p>
                            </div>
                            <div class="center-button" style="gap: .5rem;">
                                
                               <form method="post" action="" enctype="multipart/form-data">
                                
                            </div>
                        </div>
                    </div>
 <input  name="ppi" id="ppi" style="display:none;" />

                    <div class="profile-body">

                        <div>
                            <div class="cartegorier" id="cart1">
                                <p class="cartegory-title">
                                    <i class="bi bi-person-fill"></i> Personal info
                                </p>

                                <p class="cartegory-icon"><i class="bi bi-arrow-right-circle-fill"></i>
                                </p>
                            </div>
                            <div class="profile-elements" id="profile-el-1">
                                <div class="input-wrapper-profile">
                                    <div class="changer">
                                        <input type="text" id="Name-input" placeholder="Name" value="<?php echo $name; ?>" name="name" > <span id="name-text"
                                            class="changevalue"></span>
                                    </div>
                                </div>
                                <div class="input-wrapper-profile">
                                    <div class="changer">
                                        <input type="text" id="Username-input" placeholder="Username" value="<?php echo $username; ?>"name="username"> <span
                                            id="Username-text" class="changevalue"></span>
                                    </div>
                                </div>
                                <div class="input-wrapper-profile">
                                    <div class="changer">
                                        <input type="text" id="Phone-input" placeholder="Phone number" value="<?php echo $phone; ?>" name="phone"> <span
                                            id="Phone-text" class="changevalue"></span>
                                    </div>
                                </div>

                                <div class="input-wrapper-profile">
                                    <div class="changer">
                                        <input type="text" id="Course-input" placeholder="Course" value="<?php echo $course; ?>"name="course"> <span
                                            id="Course-text" class="changevalue"></span>
                                    </div>
                                </div>
                                <div class="input-wrapper-profile">
                                    <div class="changer">
                                        <input type="text" id="Year-input" placeholder="Year" value="<?php echo $mcred; ?> message credits"  > <span id="Year-text"
                                            class="changevalue"></span>
                                    </div>
                                </div>
                                <div class="input-wrapper-profile">
                                    <div class="changer">
                                        <input type="text" id="School-input" placeholder="School" value="<?php echo $school; ?>" name="school"> <span
                                            id="School-text" class="changevalue"></span>
                                    </div>
                                </div>
                                <div class="input-wrapper-profile">
                                    <div class="changer">
                                        <input type="text" id="Bio-input"  placeholder="Bio" value="<?php echo $descyour; ?>" name="descyour"> <span id="Bio-text"
                                            class="changevalue"></span>
                                    </div>
                                </div>
                                <div class="input-wrapper-profile">
                                    <div class="changer">
                                        <input type="text" id="Date-input" placeholder="Date of birth" value="<?php echo $dob; ?>" name="dob"> <span
                                            id="Date-text" class="changevalue"></span>
                                    </div>
                                </div>
                            </div>


                            <div class="cartegorier" id="cart2">
                                <p class="cartegory-title">
                                    <i class="bi bi-person-fill"></i> Favourites
                                </p>

                                <p class="cartegory-icon"><i class="bi bi-arrow-right-circle-fill"></i></p>
                            </div>
                            <div class="profile-elements" id="profile-el-2">
                                <div>
                                    <div class="input-wrapper-profile">
                                        <div class="changer">
                                            <input type="text" id="How-input" placeholder="How has school been" value="<?php echo $howsch; ?>" name="howsch"> <span
                                                id="How-text" class="changevalue"></span>
                                        </div>
                                    </div>
                                    <div class="input-wrapper-profile">
                                        <div class="changer">
                                            <input type="text" id="course-input" placeholder="Best course so far" value="<?php echo $bescou; ?>" name="bescou"> <span
                                                id="course-text" class="changevalue"></span>
                                        </div>
                                    </div>
                                    <div class="input-wrapper-profile">
                                        <div class="changer">
                                            <input type="text" id="study-input" placeholder="Best study time" value="<?php echo $besstudtm; ?>" name="besstudtm"> <span
                                                id="study-text" class="changevalue"></span>
                                        </div>
                                    </div>
                                    <div class="input-wrapper-profile">
                                        <div class="changer">
                                            <input type="text" id="Recent-input" placeholder="Recent crush" value="<?php echo $rescrush; ?>" name="rescrush"> <span
                                                id="Recent-text" class="changevalue"></span>
                                        </div>
                                    </div>
                                    <div class="input-wrapper-profile">
                                        <div class="changer">
                                            <input type="text" id="represent-input" placeholder="What i represent" value="<?php echo $irep; ?>" name="irep">
                                            <span id="represent-text" class="changevalue"></span>
                                        </div>
                                    </div>
                                    <div class="input-wrapper-profile">
                                        <div class="changer">
                                            <input type="text" id="enjoy-input" placeholder="What i enjoy doing most" value="<?php echo $enjdoing; ?>" name="enjdoing">
                                            <span id="enjoy-text" class="changevalue"></span>
                                        </div>
                                    </div>
                                    <div class="input-wrapper-profile">
                                        <div class="changer">
                                            <input type="text" id="favorite-input" placeholder="My favorite food" value="<?php echo $favfood; ?>" name="favfood"> <span
                                                id="favorite-text" class="changevalue"></span>
                                        </div>
                                    </div>
                                    <div class="input-wrapper-profile">
                                        <div class="changer">
                                            <input type="text" id="hate-input" placeholder="What i hate most" value="<?php echo $ihate; ?>" name="ihate"> <span
                                                id="hate-text" class="changevalue"></span>
                                        </div>
                                    </div>
                                    <div class="input-wrapper-profile">
                                        <div class="changer">
                                            <input type="text" id="love-input" placeholder="What i love" value="<?php echo $icherish; ?>" name="icherish"> <span
                                                id="love-text" class="changevalue"></span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cartegorier" id="cart3">
                                <p class="cartegory-title">
                                    <i class="bi bi-truck"></i> Shipping details
                                </p>
                                <p class="cartegory-icon"><i class="bi bi-arrow-right-circle-fill"></i>
                                </p>
                            </div>

                            <div class="profile-elements" id="profile-el-3">
                                <div class="input-wrapper-profile">
                                    <div class="changer">
                                        <input type="text" id="location-input" placeholder="Location" name="location"> <span
                                            id="location-text" class="changevalue"></span>
                                    </div>
                                </div>

                                <div class="input-wrapper-profile">
                                    <div class="changer">
                                        <input type="text" id="state-input" placeholder="State" name="state"> <span id="state-text"
                                            class="changevalue"></span>
                                    </div>
                                </div>
</form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-side">

            <div class="blue-area-2">
                <p class="heading-text">Setting</p>

                <div class="bottom-side-list">
                    <ul class="smaller">
                        <a href="profile.php?t=<?php echo$t; ?> ">
                            <li class="menu-item active-tool-icon ">
                                <div class="icon-img-small-icon">
                                    <ion-icon name="person"></ion-icon>
                                </div>
                                <p class="menu-list-title-sub-side-1">Profile</p>
                            </li>
                        </a>

                        <a href="wallet.php?t=<?php echo$t; ?> ">
                            <li class="menu-item">
                                <div class="icon-img-small-icon">
                                    <ion-icon name="wallet"></ion-icon>
                                </div>
                                <p class="menu-list-title-sub-side-1">Wallet</p>
                            </li>
                        </a>
                        <a href="manageproduct.php?t=<?php echo$t; ?> ">
                            <li class="menu-item">
                                <div class="icon-img-small-icon">
                                    <i class="bi bi-graph-up-arrow"></i>
                                </div>
                                <p class="menu-list-title-sub-side-1">Manage products</p>
                            </li>
                        </a>
                        <a href="marketdashboard.php?t=<?php echo$t; ?> ">
                            <li class="menu-item">
                                <div class="icon-img-small-icon">
                                    <ion-icon name="speedometer"></ion-icon>
                                </div>
                                <p class="menu-list-title-sub-side-1">Market dashboard</p>
                            </li>
                        </a>
                        <a href="resourceteam.php?t=<?php echo$t; ?> ">
                            <li class="menu-item">
                                <div class="icon-img-small-icon">
                                    <ion-icon name="people"></ion-icon>
                                </div>
                                <p class="menu-list-title-sub-side-1">Resource team</p>
                            </li>
                        </a>
                        <a href="feedback.php?t=<?php echo$t; ?> ">
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
                        <a href="">
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
        $(".bi-bell-fill").click(function () {
            $(".notification").fadeToggle('fast');
        });


        $("#cart1").click(function () {
            $("#profile-el-1").toggle('fast');
        });

        $("#cart2").click(function () {
            $("#profile-el-2").toggle('fast');
        });


        $("#cart3").click(function () {
            $("#profile-el-3").toggle('fast');
        });


        $("#profile-image-div-holder").click(function () {
            $("#profile-image-div-holder").toggleClass("profile-image image-full-screen");
        });
    </script>
    <script src="js/script.js"></script>
    <script src="js/profile.js"></script>
</body>

</html>