
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
    <title>Notebook</title>
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
    <link rel="stylesheet" href="css/notebook.css">
</head>

<body>
    <div class="study-tools-tool-holder">
        <div class="study-tool-tool">
            <ul class="tool-icon-holder">
                <ul class="tool-icon-holder">
                    <li class="active-tool-icon tool-icon"><a href="notebook.php?t=<?php echo$t; ?>"><img src="images/nootbook.png" alt=""></a></li>
                    <li class="tool-icon"><a href="noteweb.php?t=<?php echo$t; ?>"><img src="images/upload.png" alt=""></a></li>
                    <li class="tool-icon"><a href="gpcalc.php?t=<?php echo$t; ?>"><img src="images/calculator.png" alt=""></a></li>
                    <li class="tool-icon"><a href="library.php?t=<?php echo$t; ?>"><img src="images/book.png" alt=""></a></li>
                    <li class="tool-icon"><a href="cbt.php?t=<?php echo$t; ?>"><img src="images/monitor.png" alt=""></a></li>
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
   
        

//submit new notes

if(isset($_POST['submitnew'])){
        
$tab="personaljotternote".$userid;

    $idd='jn'.rand();
 $date=date("Y-m-d h:i:sa");
 $name=$_POST['namer'];
 
$namee=$_POST['namer']."2.txt";
$message=$_POST['messanger'];


$filee=fopen($namee, "a") or die("Failed to create file"); 
fwrite($filee, $message) or die("Failed to create file"); 
fclose($filee);


move_uploaded_file($filee, '../../media/personalnotes/'.$namee);





$sqp="CREATE TABLE ".$tab." (id CHAR(30) NOT NULL PRIMARY KEY, name TEXT NOT NULL, message TEXT NOT NULL, time TEXT NOT NULL, status TEXT NOT NULL)";
if ($conn15->query($sqp)==TRUE) {}

      $sqll = "INSERT INTO ".$tab." (id, name, message, time, status)VALUES ('$idd', '$name', '$message', '$date', 'offline')";

if ($conn15->query($sqll) == TRUE) {
  echo '<script> alert("Saved successfully to notebooks. Click My notes or Noteweb to publish")</script>';
} 

}



//Upload files

if(isset($_POST['submit'])){
 // Count total files
 $countfiles = count($_FILES['file']['name']);
 
 // Looping all files
 for($i=0;$i<$countfiles;$i++){
   $filename = $_FILES['file']['name'][$i];
   
   // Upload file
   move_uploaded_file($_FILES['file']['tmp_name'][$i],'../../media/personalnotes/'.$filename);
    
$table="personalfiles".$userid;
$idd='jf'.rand();
 $date=date("Y-m-d h:i:sa");
$realfilename="../../media/personalnotes/".$filename;


$sql="CREATE TABLE ".$table." (id CHAR(30) NOT NULL PRIMARY KEY, name TEXT NOT NULL, url TEXT NOT NULL, time TEXT NOT NULL, status TEXT NOT NULL)";
if ($conn15->query($sql)==TRUE) {}
    $sqll = "INSERT INTO ".$table." (id, name, url, time, status)VALUES ('$idd', '$filename', '$realfilename', '$date', 'offline')";

if ($conn15->query($sqll) == TRUE) {
  echo '<script> alert("Uploaded successfully to notebooks. Goto note books to publish")</script>';
} else {
  echo '<script> alert("Upload not successfull")</script>';
}



 }
} 

    
    

?>
        
        <div class="page-content">
            <div class="notebookpage">
                <div class="notebook">
                    <form action="" method="post">
                    <input type="text" name="namer" placeholder="Title of note">

                    <textarea name="messanger" placeholder="Start typing your note...." id="" cols="30" rows="10"></textarea>

                </div>
                <div class="save">
                    <button name="submitnew">SAVE</button>
                </div>
               </form>
            </div>
        </div>
        <div class="page-side">
            <div class="blue-area">
                <p class="heading-text">Study tools</p>

                <div class="bottom-side-list">
                    <ul class="menu-list more-padding text-smaller">
                        <a href="notebook.php?t=<?php echo$t; ?>">
                            <li class="active-tool-icon  menu-item">
                                <div class="icon-img-small-icon"><img src="images/nootbook.png" alt=""></div>
                                <p class="menu-list-title-sub-side-1">Note Book</p>
                            </li>
                        </a>

                        <a href="noteweb.php?t=<?php echo$t; ?>">
                            <li class="menu-item">
                                <div class="icon-img-small-icon"><img src="images/upload.png" alt=""></div>
                                <p class="menu-list-title-sub-side-1">Note Web</p>
                            </li>
                        </a>
                        <a href="gpcalc.php?t=<?php echo$t; ?>">
                            <li class="menu-item">
                                <div class="icon-img-small-icon"><img src="images/calculator.png" alt=""></div>
                                <p class="menu-list-title-sub-side-1">CGPA Calculator</p>
                            </li>
                        </a>
                        <a href="library.php?t=<?php echo$t; ?>">
                            <li class="menu-item">
                                <div class="icon-img-small-icon"><img src="images/book.png" alt=""></div>
                                <p class="menu-list-title-sub-side-1">Library</p>
                            </li>
                        </a>
                        <a href="cbt-test.php?t=<?php echo$t; ?>">
                            <li class="menu-item">
                                <div class="icon-img-small-icon"><img src="images/monitor.png" alt=""></div>
                                <p class="menu-list-title-sub-side-1">CBT Test</p>
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