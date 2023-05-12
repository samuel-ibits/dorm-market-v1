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
    <title>Accomodia</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="css/mynote.css">
    <link rel="stylesheet" href="css/menucss.css">
    <link rel="stylesheet" href="css/library.css">
    <link rel="stylesheet" href="css/studytools.css">
    <link rel="stylesheet" href="css/accomodia.css">
    <link rel="stylesheet" href="css/swiper.css">

    <style>
        .swiper-slide {
            border-radius: 10px !important;
            overflow: hidden;
        }
    </style>

  <script>
        function ccontact(can) {
            
    var pctid= can.id;
     var userid =document.getElementById('pct').value;
    var xhttps= new XMLHttpRequest();
xhttps.onreadystatechange= function(){
	if(xhttps.readyState == 4 && xhttps.status == 200){
console.log(xhttps.status);
    	    console.log(pctid);
    	    console.log(userid);
    	    
    	    //  document.getElementById("inspect").innerHTML=xhttps.responseText;

}else{
    	    console.log(xhttps.status);
    	    console.log(pctid);
    	    console.log(userid);

}
};

xhttps.open("GET", "ccontact.php?u="+userid+"&p="+pctid, true);
xhttps.send();
alert('An appointment request has been sent youll be contacted concerning the date and time');

     }
    </script>


  <script>
       
        function iinspect(can) {
    var ndel= can.id;
    
     document.getElementById("inspect").style.display = "block";
    document.getElementById("accomodia-card-holder").style.display = "none";
    var xhttps= new XMLHttpRequest();
xhttps.onreadystatechange= function(){
	if(xhttps.readyState == 4 && xhttps.status == 200){
document.getElementById("inspect").innerHTML=xhttps.responseText;
 
}
};

xhttps.open("GET", "inspect.php?u="+ndel, true);
xhttps.send();

        }
    </script>
           
<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("swiper-slide");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>


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
                    <li class="active-nav  menu-item">
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
                    <li class="menu-item">
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
   $email=$row["email"];
  
  
  
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
    
        
if(isset($_POST['pay'])) {

$pctid=$_POST['pctid'];
$amount=$_POST['amount'];
$date=date("Y/m/d");
$time=date("h:i:sa");
$end= date('Y-m-d', strtotime(' + 1 years'));
  
$tranid="traa".rand(100000,999999);

   
$ale1 = "Procesing... ";
echo " <script type='text/javascript'>alert('$ale1'); </script>";

$in = "INSERT INTO tenants VALUES ('$userid', '$pctid', '$tranid', '$name', '$date', '$end', '1 year', '$amount', 'processing')";

if ($conn14->query($in) === TRUE) {
  
    header("Location:https://dorm.com.ng/api/paystack.php?amount=".$amount."&email=".$email."&tranid=".$tranid."");

}else{echo "An error occured please try again <br>";
echo($conn14->error);
    
}
}
    
         ?>
         
        <div class="page-content">
            
            <!--<div class="meeting-card-holder" >-->
            
            <!--    <div class="meeting-card" >-->
            <!--            <span class="remove-card">-->
            <!--                <ion-icon name="close"></ion-icon>-->
            <!--            </span>-->
            <!--        <div class="meeting-card-profile-pic">-->
            <!--            <img src="images/avtr2.png" alt="">-->
            <!--        </div>-->

            <!--        <div class="meeting-card-info">-->
            <!--            <p class="meeting-card-user-name">Great</p>-->
            <!--            <p class="meeting-sub">DORM meeting card</p>-->
            <!--        </div>-->

            <!--        <div class="meeting-qr">-->
            <!--            <div class="print-meeting-card" onclick="window.print()">-->
            <!--                <ion-icon name="print"></ion-icon>-->
            <!--            </div>-->
            <!--        </div>-->

            <!--        <div class="meeeting-id">-->
            <!--            <div>ID: <span class="id">Ytz200</span></div>-->
            <!--        </div>-->

            <!--        <div class="date-and-time">-->
            <!--            <p class="meeting-date">-->
            <!--               Date: <span>3rd june 2021</span> -->
            <!--            </p>-->
            <!--            <p class="meeting-time">-->
            <!--               time: <span> 3.30pm</span>-->
            <!--            </p>-->
            <!--            <p class="meeting-location">-->
            <!--                location: <span>Front of school gate</span>-->
            <!--            </p>-->
            <!--        </div>-->

            <!--        <div class="meeting-card-warning">-->
            <!--            <p>Your ID code is private. Do not share it with anyone, they can impersonate you. always keep it between you and the agent you're meeting for safety. Without booking a meeting, avoid meeting with agents from Dorm, dorm willl not be accountable for the act of victimization against you.</p>-->
            <!--        </div>-->

            <!--    </div>-->

            <!--</div>-->
            <div class="meeting-card-holder-dark-bg" >

            </div>
            <div class="accomodia-inspect" id="inspect">
              Loading...
            </div>

            
            
            
            
            
            
            

            <div class="mobile mobile-search">
                <ion-icon name="search"></ion-icon> 
                <form method="post" action="">
                    <input name="search" type="text" placeholder="Search"><button name="searchs">Go</button>
                    </form>
            </div>

            <div class="mobile mobile-filter-holder">
                <div class="mobile mobile-filter-element-holder">
                    <div class="filter-name" name="" id="filt1-title">
                        All filter

                        <span class="small-arrow up" id="flt1">
                            <ion-icon name="chevron-up"></ion-icon>
                        </span>
                    </div>
                    <div class="filter-name" name="" id="filt2-title">
                        Price

                        <span class="small-arrow up" id="flt2">
                            <ion-icon name="chevron-up"></ion-icon>
                        </span>
                    </div>
                    <div class="filter-name" name="" id="filt3-title">
                        Region
                        <span class="small-arrow up" id="flt3">
                            <ion-icon name="chevron-up"></ion-icon>
                        </span>
                    </div>
                    <div class="filter-name" name="" id="filt4-title">
                        Bedrooms
                        <span class="small-arrow up" id="flt4">
                            <ion-icon name="chevron-up"></ion-icon>
                        </span>
                    </div>
                </div>
                <div class="filter-holder">
                    <div class="mobile-filter" id="filter1">
                        <div>
                            <p>Region</p>
                            <input type="search" placeholder="Choose a Region">
                        </div>
                        <div>
                            <p>Price</p>
                            <div class="price-div-mobile">
                                <div class="two-inputs">
                                    <div class="input-holder-size">
                                        <p>min</p>
                                        <input type="text">
                                    </div>
                                    -
                                    <div class="input-holder-size">
                                        <p>max</p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="last-filter">
                            <p class="region">Bedrooms</p>

                            <ul class="mobile-room-number-radio">
                                <li><input type="radio" name="1" id=""> 1</li>
                                <li><input type="radio" name="1" id=""> 2</li>
                                <li><input type="radio" name="1" id=""> 3</li>
                                <li><input type="radio" name="1" id=""> more</li>
                            </ul>
                        </div>
                    </div>
                    <div class="mobile-filter" id="filter2">
                        <div>
                            <p>Price</p>
                            <div class="price-div-mobile">
                                <div class="two-inputs">
                                    <div class="input-holder-size">
                                        <p>min</p>
                                        <input type="text">
                                    </div>

                                    -

                                    <div class="input-holder-size">
                                        <p>max</p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mobile-filter" id="filter3">
                        <div>
                            <p>Region</p>
                            <input type="search" placeholder="Choose a Region">
                        </div>
                    </div>

                    <div class="mobile-filter" id="filter4">
                        <div class="last-filter">
                            <p class="region">Bedrooms</p>

                            <ul class="mobile-room-number-radio">
                                <li><input type="radio" name="1" id=""> 1</li>
                                <li><input type="radio" name="1" id=""> 2</li>
                                <li><input type="radio" name="1" id=""> 3</li>
                                <li><input type="radio" name="1" id=""> more</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="accomodia-card-holder" id="accomodia-card-holder">

            
                    
                  <?php include'../connect.php';
                     
if(isset($_POST['preorder'])) { 
$region=$_POST['region'];
$min=$_POST['min'];
$max=$_POST['max'];
$bedroom=$_POST['bedroom'];
  
$in = "INSERT INTO preorder VALUES ('', '$region', '$min', '$max', '$bedroom')";

if ($conn14->query($in) === TRUE) {

}
}

 
if(isset($_POST['searchs'])) {$search=$_POST['search'];
$date= date("Y-m-d h:i:sa");
	 $iiin = "INSERT INTO searchbar (id, userid, query, page, date) VALUES ( '', '$userid', '$search', 'Acommodia', '$date')";
if ($conn18->query($iiin)==true) { }else{echo $conn18->error;}

 $sql = "SELECT * FROM product WHERE price LIKE ? or name LIKE ? or about LIKE ? or distance LIKE ? or location LIKE ? or security LIKE ? or status Like ?";
    
    if($stmt = mysqli_prepare($conn14, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sssssss", $param_term, $param_term, $param_term, $param_term, $param_term, $param_term, $param_term);
        
        // Set parameters
        $param_term = $_POST['search'] . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                   echo'         
                
                    <!--card start-->
                                    <div class="accomodia-card">
                   <div class="accomodia-card-image">
                        <img src="'.$row["pic1"].'"
                            alt="">
                        <p class="image-number"><span class="number-of-images">5</span>
                            <ion-icon name="image"></ion-icon>
                        </p>
                    </div>

                    <div class="card-section-2">
                        <h2 class="grey-3 thick">'.$row["name"].'</h2>
                        <p class="location-section-2">
                            <ion-icon name="location"></ion-icon> '.$row["location"].'
                        </p>
                         
                    <span id="'.$row["productid"].'" class="hus_but" onclick="ccontact(this)">
                      <button  id="meetagent" >Contact agent</button></span>
                    </div>

                    <div class="card-section-3">
                        <h2 class="orange thick">'.$row["price"].'</h2>
                        <span id="'.$row["productid"].'" value="'.$row["productid"].'" class="hus_but" onclick="iinspect(this)"><button class="inspect-btn hide-mobile" id="accomodia-ispect-1">
                            <ion-icon name="information"></ion-icon> Inspect
                        </button></span>
                        <button class="inspect-btn">'.$row["status"].'</button>
                    </div>

                    <div class="accomodia-card-mobile-lower-div">
                        <div class="accomodia-card-mobile-lower-div-sub">
                            <div class="blue-border-bottom">
                    <span id="'.$row["productid"].'" class="hus_but" onclick="ccontact(this)">
  <p class="grey thick"  id="meetagent">Contact agent</p></span>
                            </div>
                        </div>
                        <div class="accomodia-card-mobile-lower-div-sub">
                          <span id="'.$row["productid"].'" value="'.$row["productid"].'" class="hus_but" onclick="iinspect(this)">
                          <div class="blue-border-bottom">
                                <p class="orange thick" id="accomodia-ispect-1-pc">Inspect</p>
                            </div></span>
                        </div>
                    </div>
                </div>
                <!--card end-->
             ';
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn14);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
  }

    $selr="SELECT * FROM product";
$result= $conn14->query($selr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
    
$productid=$row["productid"];$userid=$row["userid"]; $name=$row["name"]; $price=$row["price"]; $about=$row["about"];
$pic1=$row["pic1"]; $pic2=$row["pic2"]; $pic3=$row["pic3"]; $pic4=$row["pic4"]; 
$pic5=$row["pic5"]; $pic6=$row["pic6"]; $vid1=$row["vid1"]; $vid2=$row["vid2"]; $vid3=$row["vid3"]; $vid4=$row["vid4"];
$vid5=$row["vid5"]; $vid6=$row["vid6"]; $messageid=$row["messageid"];
$status=$row["status"]; $views=$row["views"]; $contact=$row["contact"]; $link=$row["link"];
$picc1 =str_replace("img/","img/thumbnails/tn_", $pic1);
echo'         
                
                    <!--card start-->
                                    <div class="accomodia-card">
                   <div class="accomodia-card-image">
                        <img src="'.$picc1.'"
                            alt="">
                        <p class="image-number"><span class="number-of-images">5</span>
                            <ion-icon name="image"></ion-icon>
                        </p>
                    </div>

                    <div class="card-section-2">
                        <h2 class="grey-3 thick">'.$row["name"].'</h2>
                        <p class="location-section-2">
                            <ion-icon name="location"></ion-icon> '.$row["location"].'
                        </p>
                        
                    <span id="'.$row["productid"].'" class="hus_but" onclick="ccontact(this)">
                      <button  id="meetagent" >Contact agent</button></span>
                    </div>

                    <div class="card-section-3">
                        <h2 class="orange thick">'.$row["price"].'</h2>
                        <span id="'.$row["productid"].'" value="'.$row["productid"].'" class="hus_but" onclick="iinspect(this)"><button class="inspect-btn hide-mobile" id="accomodia-ispect-1">
                            <ion-icon name="information"></ion-icon> Inspect
                        </button></span>
                        <button class="inspect-btn">'.$row["status"].'</button>
                    </div>

                    <div class="accomodia-card-mobile-lower-div">
                        <div class="accomodia-card-mobile-lower-div-sub">
                            <div class="blue-border-bottom">
                    <span id="'.$row["productid"].'" class="hus_but" onclick="ccontact(this)">
  <p class="grey thick"  id="meetagent">Contact agent</p></span>
                            </div>
                        </div>
                        <div class="accomodia-card-mobile-lower-div-sub">
                          <span id="'.$row["productid"].'" value="'.$row["productid"].'" class="hus_but" onclick="iinspect(this)">
                          <div class="blue-border-bottom">
                                <p class="orange thick" id="accomodia-ispect-1-pc">Inspect</p>
                            </div></span>
                        </div>
                    </div>
                </div>
                <!--card end-->
             ';}}   
             ?>   
                
                
            </div>
         </div>
                
<?php
           echo' <input type="hidden" value="'.$userid.'" id="pct">';
        
  ?>     
        
        <div class="page-side">
            <div class="search-2">
                <ion-icon ></ion-icon> <form action="" method="post"><input type="search" placeholder="Search Houses" name="search" id=""><button name="searchs">Go</button></form>
            </div>


            <div class="accomodia-side">

                <div class="side-accomodia-sub">
                    <p class="region">Region</p>
<form action="" method="post">
                    <input type="text" name="region" placeholder="Choose a Region" class="regioninput">
                </div>

                <div class="side-accomodia-sub">
                    <p class="region">Price</p>

                    <div class="two-inputs">
                        <div class="input-holder-size">
                            <p>min</p>
                            <input type="text" name="min">
                        </div>

                        -

                        <div class="input-holder-size">
                            <p>max</p>
                            <input type="text" name="max">
                        </div>
                    </div>
                </div>

                <div class="side-accomodia-sub">
                    <p class="region">Bedrooms</p>

                    <ul class="room-number-radio">
                        <li><input type="radio" name="bedroom" id=""> 1</li>
                        <li><input type="radio" name="bedroom" id=""> 2</li>
                        <li><input type="radio" name="bedroom" id=""> 3</li>
                        <li><input type="radio" name="bedroom" id=""> more</li>
                    </ul>
                </div>

<button class="send-btn" name="preorder">Send</button></form>

                <div class="accomodia-notification-holder">
                    <ion-icon name="notifications"></ion-icon>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>
    <script>
    function copy() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}</script>

<script>
function backk(){
         document.getElementById("inspect").style.display = "none";
    document.getElementById("accomodia-card-holder").style.display = "block";     
           
             }
 </script>
    <script src="js/script.js"></script>
</body>

</html>