
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
    <title>GP Calc</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="css/mynote.css">
    <link rel="stylesheet" href="css/noteweb.css">
    <link rel="stylesheet" href="css/studytools.css">
    <link rel="stylesheet" href="css/menucss.css">
</head>

<body>
    <div class="study-tools-tool-holder">
        <div class="study-tool-tool">
            <ul class="tool-icon-holder">
                <ul class="tool-icon-holder">
                    <li class="tool-icon"><a href="notebook.php?t=<?php echo$t; ?>"><img src="images/nootbook.png" alt=""></a></li>
                    <li class="tool-icon"><a href="noteweb.php?t=<?php echo$t; ?>"><img src="images/upload.png" alt=""></a></li>
                    <li class="active-tool-icontool-icon"><a href="gpcalc.php?t=<?php echo$t; ?>"><img src="images/calculator.png" alt=""></a></li>
                    <li class="tool-icon"><a href="library.php?t=<?php echo$t; ?>"><img src="images/book.png" alt=""></a></li>
                    <li class="tool-icon"><a href=""><img src="images/monitor.png" alt=""></a></li>
                </ul>
        </div>
        <div class="study-tool-tools-toggle">
            <span class="grid-icon">
                <ion-icon name="grid"></ion-icon>
            </span>
            <span class="close-icon">
                <ion-icon name="close"></ion-icon>
            </span>
        </div>
    </div>


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
                    <li class="active-nav  menu-item">
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
                <a href="">
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
        
   
        
if(isset($_POST['go'])) {
	$search=$_POST['search'];
	
	
	$selry="SELECT * FROM noteweb where id=".$search;
$result= $conn15->query($selry);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){

$usernw=$row["userid"];
$refidnw=$row["refid"];
$idnw=$row["id"];
$urlnw=$row["url"];
$namenw=$row["name"];
}}
	
	
    $table1="personaljotternote".$usernw;
    $table="personalfiles".$usernw;
	
	$selry="SELECT * FROM ".$table." where id=".$refid;
$result= $conn15->query($selry);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
$url=$row["url"];
$name=$row["name"];

echo'<br>'.$name.'    <a  href="../../../'.$url.'#toolbar=0 width="100%" style="margin:10px;"> open</a>  <a href="'.$url.'" style="margin:10px;" download> download</a>';



}}else{
    	$selry="SELECT * FROM ".$table." where id=".$refid;
$result= $conn15->query($selry);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
$message=$row["message"];
$title=$row["title"];

$name=$row["name"];

echo'<br>'.$name.'   <a href="#" id="downloadLink" onclick="downloadInnerHtml("new.txt","main","text/html")" style="margin:10px;" > download</a>';
echo'<br><div id="main">
<h3>'.$title.'</h3>
   <span>'.$message.'</span>
</div>';



}}else{echo'Incorect note id, Try again';}
}
}


?>

        <div class="page-content">
            <div class="noteweb-page">

               <object type="text/html" data="https://dorm.com.ng/v2.5/app/gpacalculator.io/cumulative-gpa-calculator/" width="100%" height="900px" style="top:0px;max-width: 100%;    

overflow:hidden" ></object>
            </div>
        </div>
       
        <div class="page-side">
            <div class="blue-area">
                <p class="heading-text">Study tools</p>

                <div class="bottom-side-list">
                    <ul class="menu-list more-padding text-smaller">
                        <a href="notebook.php?t=<?php echo$t; ?>">
                            <li class="menu-item">
                                <div class="icon-img-small-icon"><img src="images/nootbook.png" alt=""></div>
                                <p class="menu-list-title-sub-side-2">Note Book</p>
                            </li>
                        </a>

                        <a href="noteweb.php?t=<?php echo$t; ?>">
                            <li class="menu-item">
                                <div class="icon-img-small-icon"><img src="images/upload.png" alt=""></div>
                                <p class="menu-list-title-sub-side-2">Note Web</p>
                            </li>
                        </a>
                        <a href="gpcalc.php?t=<?php echo$t; ?>">
                            <li class="active-tool-icon menu-item">
                                <div class="icon-img-small-icon"><img src="images/calculator.png" alt=""></div>
                                <p class="menu-list-title-sub-side-2">CGPA Calculator</p>
                            </li>
                        </a>
                        <a href="library.php?t=<?php echo$t; ?>">
                            <li class="menu-item">
                                <div class="icon-img-small-icon"><img src="images/book.png" alt=""></div>
                                <p class="menu-list-title-sub-side-2">Library</p>
                            </li>
                        </a>
                        <a href="cbt.php?t=<?php echo$t; ?>">
                            <li class="menu-item">
                                <div class="icon-img-small-icon"><img src="images/monitor.png" alt=""></div>
                                <p class="menu-list-title-sub-side-2">CBT Test</p>
                            </li>
                        </a>
                    </ul>
                </div>
                <div class="notification-holder-3">
                    <ion-icon name="notifications"></ion-icon>
                </div>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>

</html>