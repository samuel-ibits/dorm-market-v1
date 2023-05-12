 <?php include'../../api/token.php';
$t=$_GET['t'];
if($t==''){$t=$_COOKIE['dormtoken'];}
$userid=validatetoken($t);

if ($userid=="null"){
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
    <title>Course Review</title>
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

     
</head>

<body>
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
}}
?>
    <div class="mobile-add-review-holder">
        <div class="mobile-add-review">
            <div class="add-review-user-image">
                <img src="<?php echo 'https://dorm.com.ng/'.$ppic; ?>" alt="" alt="'.$username.'">
            </div>
            <p class="create-mobile-review">Create a review...</p>
            <form action="" method="" ><input type="search"  name="searchs" class="search" placeholder="Search for a review....">
            <span class="open-mobile-search">
               <button name="search" style="border:none;"> <ion-icon name="search"></ion-icon></button></form>
            </span>

            <span class="open-create-review">
                <ion-icon name="pencil-outline"></ion-icon>
            </span>
        </div>
    </div>
    <div class="post-holder">
        <div class="post-div">
            <div class="top-post-div">
                <div class="course-review-user-info-avater">
                    <img src="<?php echo 'https://dorm.com.ng/'.$ppic; ?>" alt="" >
                </div>
                <div class="post-username">
                    <p><?php echo $username; ?></p>
                    <form action="" method="post"  enctype="multipart/form-data">
                        
                    <input type="text" name="tag" placeholder="#tag" id="">
                </div>
                <div class="post-btn">
                    <button name="ypos">Post</button>
                </div>
                <div class="remove">
                    <ion-icon name="close"></ion-icon>
                </div>
            </div>
            
            <div class="post-div-text">
                <textarea placeholder="How are lectures going" name="comment" id=""></textarea>
            </div>
            <div class="post-div-functions">
                <div class="post-function-holder">
                    <p class="post-function-icon blue-icon">
                        <ion-icon name="image"></ion-icon>
                    </p>
                    <p class="post-function-icon blue-icon">
                        <ion-icon name="mic"></ion-icon>
                    </p>
                    <button class="medium-btn" name="ypos">submit</button></form>
                </div>
            </div>
        </div>
    </div>

    <div class="overlay">

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
                <a href="studytools.php?t=<?php echo$t; ?> ">
                    <li class="menu-item">
                        <div class="icon-img"><img src="images/bag-img.png" alt=""></div>
                        <p class="menu-list-title-sub-side">Study Tools</p>
                    </li>
                </a>
                <a href="coursereview.php?t=<?php echo$t; ?> ">
                    <li class="active-nav  menu-item">
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
                    <li class="menu-item">
                        <div class="icon-img"><img src="images/setting.png" alt=""></div>
                        <p class="menu-list-title-sub-side">Setting</p>
                    </li>
                </a>
            </ul>
            
           
    <?php
 
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

        
             

if(isset($_POST['sendcomment'])){

 $vcom=$_POST['vcom'];
	
	$comms=$_POST['comms'];
	
	$commz=$_FILES["commz"];
	
	$medianame1=basename( $_FILES["commz"]["name"]);
	
$mediatemp1=$_FILES['commz']['tmp_name'];
 $uploaddir1="media/audio/";
   $root="../../";
 $uploaddest1=$root.$uploaddir1.$medianame1;
 move_uploaded_file($mediatemp1,$uploaddest1);
 
 $r="r".rand();

	 $iiin = "INSERT INTO c".$vcom." (id, tagname, date, time, username, userid, comment, sound, title, pic) VALUES ( '$r', 'tagname', '$date', '$time', '$username', '$userid', '$comms', '$uploaddest1', 'title', '$ppic')";
if ($conn5->query($iiin)==true) {echo"done";}else{echo $conn5->error;}
	



}

if(isset($_POST['ypos'])) {  
$counter=$_POST['counter'];
 $tag=$_POST['tag'];
if(empty($tag)){$tag=$_POST['tag1'];}
if(empty($tag)){$tag=$_POST['tag2'];}
 if(empty($tag)){$tag="inside life";}
 $selr="SELECT * FROM reserve WHERE id='".$tag."'";
$result= $conn7->query($selr);
If ($result->num_rows>0){  
While ($row=$result->fetch_assoc()){
	$user1=$row["user1"];
	$user2=$row["user2"];
	$user3=$row["user3"];
	$user4=$row["user4"];
	$user5=$row["user5"];

	if($user1==$username OR $user2==$username OR $user3==$username OR $user4==$username OR $user4==$username ){
$comment=$_POST['comment'];
if(empty($comment)){$comment=$_POST['comment1'];}
if(empty($comment)){$comment="nocomment";}
$rateid="a".rand();
$comid="c".$rateid;
$time=date("h:i:s A");
$date=date("F j, Y");
$title="";
$school=$userschool;
$id="";
$course=$usercourse;


$pic=$ppic;


$media1=$_FILES["media1"];

$medianame1=basename( $_FILES["$media1"]["name"]);
$mediatemp1=$_FILES['$media1']['tmp_name'];

   $uploaddir1="media/audio/";
   $root="../../";
 $uploaddest1=$root.$uploaddir1.$medianame1;
 move_uploaded_file($mediatemp1,$uploaddest1);


$media2=$_FILES["media2"];
$medianame2=basename( $_FILES["media2"]["name"]);
$mediatemp2=$_FILES['media2']['tmp_name'];

  $uploaddir2="media/image/";
  $root="../../";
 $uploaddest2=$root.$uploaddir2.$medianame2;
 move_uploaded_file($mediatemp2,$uploaddest2);

$type1="";
$type2="";

$sql="CREATE TABLE ".$comid." (id CHAR(30) NOT NULL PRIMARY KEY, tagname TEXT NOT NULL, date TEXT NOT NULL, time TEXT NOT NULL, username TEXT NOT NULL, userid TEXT NOT NULL, comment TEXT NOT NULL, sound TEXT NOT NULL, title TEXT NOT NULL)";
if ($conn5->query($sql)===TRUE) {
}
$sql="CREATE TABLE ".$rateid." (id CHAR(30) NOT NULL PRIMARY KEY, color TEXT NOT NULL, tagname TEXT NOT NULL, date TEXT NOT NULL, time TEXT NOT NULL, username TEXT NOT NULL, userid TEXT NOT NULL, comment TEXT NOT NULL, title TEXT NOT NULL)";
if ($conn5->query($sql)===TRUE) {

 $stmt =$conn2->prepare("INSERT INTO review (id, tag, message, date, time, username, userid, rateid, school, course, pic, title, mediatype1, mediaurl1, mediatype2, mediaurl2) VALUES (? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,?)");
 $stmt->bind_param("isssssssssssssss",$id, $tag, $comment, $date, $time, $username, $userid, $rateid, $school, $course, $pic, $title, $type1, $uploaddest1, $type2, $uploaddest2);

 
if ( $stmt->execute()=== TRUE)  {
$ale1 = "comment posted";
echo " <script type='text/javascript'>alert('$ale1'); </script>";
 
} else {
$ale2 = "comment not posted";
echo "<script type='text/javascript'>alert('$ale2'); </script>";

    echo "Error: " . $in . "<br>" . $conn2->error;
}
} else {
$ale2 = "comment not posted";
echo "<script type='text/javascript'>alert('$ale2'); </script>";
echo "Error: " . $sql . "<br>" . $conn2->error;
}
$stmt->close();

		
	}else{
	$ale1 = "This tag has been reserved choose another tag please";
echo "<script type='text/javascript'>alert('$ale1');</script>";
}
}}else{
	
$comment=$_POST['comment'];
if(empty($comment)){$comment=$_POST['comment1'];}
if(empty($comment)){$comment="nocomment";}
$rateid="a".rand();
$comid="c".$rateid;
$time=date("h:i:s A");
$date=date("F j, Y");
$title="";
$school=$userschool;
$id="";
$course=$usercourse;



$pic=$ppic;

 

$media1=$_FILES["media1"];

$medianame1=basename( $_FILES["$media1"]["name"]);
$mediatemp1=$_FILES['$media1']['tmp_name'];

   $uploaddir1="media/audio/";
   $root="../../";
 $uploaddest1=$root.$uploaddir1.$medianame1;
 move_uploaded_file($mediatemp1,$uploaddest1);


$media2=$_FILES["media2"];
$medianame2=basename( $_FILES["media2"]["name"]);
$mediatemp2=$_FILES['media2']['tmp_name'];

  $uploaddir2="media/image/";
  $root="../../";
 $uploaddest2=$root.$uploaddir2.$medianame2;
 move_uploaded_file($mediatemp2,$uploaddest2);

$type1="";
$type2="";



$sql="CREATE TABLE ".$comid." (id CHAR(30) NOT NULL PRIMARY KEY, tagname TEXT NOT NULL, date TEXT NOT NULL, time TEXT NOT NULL, username TEXT NOT NULL, userid TEXT NOT NULL, comment TEXT NOT NULL, sound TEXT NOT NULL, title TEXT NOT NULL, pic TEXT NOT NULL)";
if ($conn5->query($sql)===TRUE) {
}
$sql="CREATE TABLE ".$rateid." (id CHAR(30) NOT NULL PRIMARY KEY, color TEXT NOT NULL, tagname TEXT NOT NULL, date TEXT NOT NULL, time TEXT NOT NULL, username TEXT NOT NULL, userid TEXT NOT NULL, comment TEXT NOT NULL, title TEXT NOT NULL)";
if ($conn5->query($sql)===TRUE) {

 $stmt =$conn2->prepare("INSERT INTO review (id, tag, message, date, time, username, userid, rateid, school, course, pic, title, mediatype1, mediaurl1, mediatype2, mediaurl2) VALUES (? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,?)");
 $stmt->bind_param("isssssssssssssss",$id, $tag, $comment, $date, $time, $username, $userid, $rateid, $school, $course, $pic, $title, $type1, $uploaddest1, $type2, $uploaddest2);

 
if ( $stmt->execute()=== TRUE)  {
$ale1 = "comment posted";
echo " <script type='text/javascript'>alert('$ale1'); </script>";
 
} else {
$ale2 = "comment not posted";
echo "<script type='text/javascript'>alert('$ale2'); </script>";

    echo "Error: " . $in . "<br>" . $conn2->error;
}
} else {
$ale2 = "comment not posted";
echo "<script type='text/javascript'>alert('$ale2'); </script>";
echo "Error: " . $sql . "<br>" . $conn2->error;
}
$stmt->close();

}
}
?>

        
        <div class="page-content">
            <div class="comment-holder" id="comment-holder">        
                <div class="comment-holder-div">
                     <button id="removecomment" class="back-btn">Leave Comments</button>
                    <div class="previous-comments" id="como">
                          loading...
                    </div>
                </div> 
            </div>
            <div class="dark-bg"></div>
            <div class="course-review-grid">
                
                
<?php

if(isset($_POST['searchs'])) {$search=$_POST['search'];

	$selr="SELECT * FROM review WHERE tag like '%{$search}%' OR message like '%{$search}%'";
	
$result= $conn2->query($selr);

  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
$abc=$row["id"];$rop=$row["id"];
	$rateeid=$row["rateid"];
	
	
$suql = "SELECT * FROM c".$rateeid; 
 $connStatus = $conn5->query($suql); 
 $numberOfcoments= mysqli_num_rows($connStatus); 
 if($numberOfcoments==""){$numberOfcoments="0";}
  $numberOfcoment='<span style="color:red">'.$numberOfcoments.' </span>';
  
		$l="steelblue";$m="liked";$n="";
$suql = "SELECT * FROM ".$rateeid." WHERE color like '%{$l}%' OR color like '%{$m}%' OR color like '%{$n}%'"; 
 $connStatus = $conn5->query($suql); 
 $numberOfRows= mysqli_num_rows($connStatus); 
 if($numberOfRows==""){$numberOfRows="0";}
  $numberOfRow='<span style="color:red">'.$numberOfRows.' </span>';
  
		$r="red";$s="nlike";
$suql = "SELECT * FROM ".$rateeid." WHERE color like '%{$r}%' OR color like '%{$s}%'"; 
 $connStatus = $conn5->query($suql); 
 $bnumberOfRows= mysqli_num_rows($connStatus); 
 if($bnumberOfRows==""){$bnumberOfRows="0";}
  $bnumberOfRow='<span style="color:red">'.$bnumberOfRows.' </span>';
  

	
	
if(($row["message"]=="nocomment" or $row["message"]=="") and ($row["mediaurl1"]=="media/" or $row["mediaurl1"]==""or $row["mediaurl2"]=="https://dorm.com.ng/media/ppic/" or $row["mediaurl2"] =="../../media/audio/")and ($row["mediaurl2"]=="media/" or $row["mediaurl2"]=="" or $row["mediaurl1"] =="../../media/audio/")){$posty="none";}else{$posty="block";}
if($row["pic"]=="" or $row["pic"]=="pro.png"){$pic="../../media/ppic/pro.png";}else{$pic="../../".$row["pic"];}



echo'
<div class="course-review-card">
                    <div class="course-review-card-post">
                        <div class="course-review-card-post-div">
                            <div class="course-review-user-info">
                                <div class="course-review-user-info-avater">
                                    <img src="'.$pic.'" alt="profile pic">
                                </div>
                                <div class="course-review-post-data">
                                    <a href="viewprofile.php?t='.$t.'&proid='.$row["userid"].'&check=Submit">
                                    <p class="course-review-user-name">'.$row["username"].'</p></a>
                                    <p class="course-review-post-title">'.$row["tag"].'</p>
                                </div>
                            </div>
                            <div class="course-review-post-data-container">
                                <p>
                                    '.$row["message"].'
                                </p>';
                                   if($row["mediaurl1"]=="media/" or $row["mediaurl1"]=="" or $row["mediaurl1"]=="media/audio/" or $row["mediaurl1"]=="../../media/audio/" or $row["mediaurl1"] =="../../media/audio/"){$row["mediaurl1"]="";$audy="none";}else{$audy="block";}
echo'<CENTER style="display:'.$audy.';text-align:center;border-radius:20px;margin-left:5%;width:90%;background-color:whitesmoke;color:black;font-family:"Comic Sans MS", cursive, sans-serif;">
<audio style="width:70%;background-color:#0066cc;"controls="controls" preload="auto" ><source src="../../'.$row["mediaurl1"].'" type="audio/mp3"><source src="../../'.$row["mediaurl1"].'" type="audio/ogg"><source src="../../'.$row["mediaurl1"].'" type="audio/m4a"></audio></center>';
if($row["mediaurl2"]=="media/" or $row["mediaurl2"]=="media/image/"or $row["mediaurl2"]=="../../media/image/" or $row["mediaurl2"]=="" or $row["mediaurl2"] =="../../media/image/"){$row["mediaurl1"]="";$iaey="none";}else{$iaey="block";}

                      
                             echo'   <div class="post-image" style="display:'.$iaey.'">
                                    <img src="../../'.$row["mediaurl2"].'" id="pi1" style="display:'.$iaey.'"  alt="post image">
                                </div>
                            </div>
                            <div class="course-review-post-functions">
                                <div class="reaction-functions">
                                    <button class="blue">
                                        <ion-icon name="chevron-up"></ion-icon> <span class="number-of-likes">'.$numberOfRows.'</span>
                                    </button>
                                    <button class="orange">
                                        <ion-icon name="chevron-down"></ion-icon><span
                                            class="number-of-unlikes">'.$bnumberOfRows.'</span>
                                    </button>
                                    <button class="blue" id="send-1">
                                        <ion-icon name="chatbox"></ion-icon> <span class="number-of-comments">'.$numberOfcoments.'</span>
                                    </button>
                                </div>
                                
                            </div>
                        </div>
                    </div>


                </div>

';
}}

}
            
          $sul = "SELECT * FROM review ORDER BY id DESC";
$result= $sta = $conn2->query($sul);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
$abc=$row["id"];$rop=$row["id"];
	$rateeid=$row["rateid"];
	
	
$suql = "SELECT * FROM c".$rateeid; 
 $connStatus = $conn5->query($suql); 
 $numberOfcoments= mysqli_num_rows($connStatus); 
 if($numberOfcoments==""){$numberOfcoments="0";}
  $numberOfcoment='<span style="color:red">'.$numberOfcoments.' </span>';
  
		$l="steelblue";$m="liked";$n="";
$suql = "SELECT * FROM ".$rateeid." WHERE color like '%{$l}%' OR color like '%{$m}%' OR color like '%{$n}%'"; 
 $connStatus = $conn5->query($suql); 
 $numberOfRows= mysqli_num_rows($connStatus); 
 if($numberOfRows==""){$numberOfRows="0";}
  $numberOfRow='<span style="color:red">'.$numberOfRows.' </span>';
  
		$r="red";$s="nlike";
$suql = "SELECT * FROM ".$rateeid." WHERE color like '%{$r}%' OR color like '%{$s}%'"; 
 $connStatus = $conn5->query($suql); 
 $bnumberOfRows= mysqli_num_rows($connStatus); 
 if($bnumberOfRows==""){$bnumberOfRows="0";}
  $bnumberOfRow='<span style="color:red">'.$bnumberOfRows.' </span>';
  

	
	
if(($row["message"]=="nocomment" or $row["message"]=="") and ($row["mediaurl1"]=="media/" or $row["mediaurl1"]==""or $row["mediaurl2"]=="https://dorm.com.ng/media/ppic/" or $row["mediaurl1"] =="../../media/image/")and ($row["mediaurl2"]=="media/" or $row["mediaurl2"]=="" or $row["mediaurl2"] =="../../media/audio/")){$posty="none";}else{$posty="block";}
if($row["pic"]=="" or $row["pic"]=="pro.png"){$pic="../../media/ppic/pro.png";}else{$pic="../../".$row["pic"];}



echo'
<div class="course-review-card">
                    <div class="course-review-card-post">
                        <div class="course-review-card-post-div">
                            <div class="course-review-user-info">
                                <div class="course-review-user-info-avater">
                                    <img src="'.$pic.'" alt="profile pic">
                                </div>
                                <div class="course-review-post-data">
                                    <a href="viewprofile.php?t='.$t.'&proid='.$row["userid"].'&check=Submit">
                                    <p class="course-review-user-name">'.$row["username"].'</p></a>
                                    <p class="course-review-post-title">'.$row["tag"].'</p>
                                </div>
                            </div>
                            <div class="course-review-post-data-container">
                                <p>
                                    '.$row["message"].'
                                </p>';
                                   if($row["mediaurl1"]=="media/" or $row["mediaurl1"]=="" or $row["mediaurl1"]=="media/audio/" or $row["mediaurl1"]=="../../../media/audio/" or$row["mediaurl1"] =="../../media/audio/"){$row["mediaurl1"]="";$audy="none";}else{$audy="block";}
echo'<CENTER style="display:'.$audy.';text-align:center;border-radius:20px;margin-left:5%;width:90%;background-color:whitesmoke;color:black;font-family:"Comic Sans MS", cursive, sans-serif;"><audio style="width:70%;background-color:#0066cc;"controls="controls" preload="auto" ><source src="../../'.$row["mediaurl1"].'" type="audio/mp3"><source src="../../'.$row["mediaurl1"].'" type="audio/ogg"><source src="../../'.$row["mediaurl1"].'" type="audio/m4a"></audio></center>';
if($row["mediaurl2"]=="media/" or $row["mediaurl2"]=="media/image/"or $row["mediaurl2"]=="../../../media/image/" or $row["mediaurl2"]=="" or $row["mediaurl2"] =="../../media/image/"){$row["mediaurl1"]="";$iaey="none";}else{$iaey="block";}

                      
                             echo'   <div class="post-image" style="display:'.$iaey.'">
                                    <img src="../../'.$row["mediaurl2"].'" id="pi1" style="display:'.$iaey.'"  alt="post image">
                                </div>
                            </div>
                            <div class="course-review-post-functions">
                                <div class="reaction-functions">
                                    <span id="'.$row["rateid"].'"  onclick="lblckq(this)"> <button class="blue">
                                        <ion-icon name="chevron-up"></ion-icon> <span class="number-of-likes" id="num'.$row["rateid"].'">'.$numberOfRows.'</span>
                                    </button></span>
                                    
                                   <span id="'.$row["rateid"].'"  onclick="blblckq(this)"> <button class="orange">
                                        <ion-icon name="chevron-down"></ion-icon><span
                                            class="number-of-unlikes" id="bnum'.$row["rateid"].'">'.$bnumberOfRows.'</span>
                                    </button></span>
                                    
                                   <span id="'.$row["rateid"].'" value="'.$row["id"].'" onclick="showcomment(this)"> <button class="blue" id="send-1">
                                        <ion-icon name="chatbox"></ion-icon> <span class="number-of-comments" >'.$numberOfcoments.'</span>
                                    </button></span>
                                </div>
                                
                            </div>
                        </div>
                    </div>


                </div>

';
}}
?>
                <!---->



            </div>


        </div>
        <div class="page-side">
            <div class="search-2">
                <ion-icon name="search"></ion-icon> 
                <form action="coursereview.php?t=<?php echo$t; ?> " method="post">
                    <input type="text" placeholder="Search for a note" name="searchs" id=""><button name="search" style="border:none;">Go</button></form>
            </div>
            <div class="double-section">

                <div class="side-user-info">
                    <div class="userimage-info-side">
                        <div class="user-img-side">
                            <img src="<?php echo 'https://dorm.com.ng/'.$ppic; ?>" alt="">
                        </div>
                        <div class="user-info-side">
                            <p class="name-side"><?php echo $name; ?></p>
                            <p class="username-side">@<?php echo $username; ?></p>
                        </div>
                    </div>
                </div>
                <div class="text-icon add-review">
                    <div class="icon"><img src="images/add-icon.png" alt=""></div>
                    <p class="double-section-text">Create Review</p>
                </div>

                <div class="bottom-notification">
                    <ion-icon name="notifications"></ion-icon>
                </div>

            </div>

        </div>
    </div>
    
        
  <script>
        function showcomment(call)
        {
var id=call.id;

var com="cc"+id;

      document.getElementById("comment-holder").style.display = "block";
        //   document.getElementById("ovv").style.display = "block";

             
var xhttps= new XMLHttpRequest();
xhttps.onreadystatechange= function(){
	if(xhttps.readyState == 4 && xhttps.status == 200){
document.getElementById("como").innerHTML=xhttps.responseText;

}
};

xhttps.open("GET", "lcomnt.php?u="+id, true);
xhttps.send();

 }
</script>



<script type="text/Javascript">
function lblckq(call){
var id=call.id;
var bnum="bnum"+id;
var num="num"+id;
 var a="<?php echo $userid; ?>";
 var b="<?php echo $username; ?>";
var xhttps= new XMLHttpRequest();
xhttps.onreadystatechange= function(){
	if(xhttps.readyState == 4 && xhttps.status == 200){
document.getElementById(num).innerHTML=xhttps.responseText;

}
};

xhttps.open("GET", "lblckg.php?u="+id+"&a="+a+"&b="+b, true);
xhttps.send();


}
</script>


<script type="text/Javascript">
function blblckq(call){
var id=call.id;
var bnum="bnum"+id;
var num="num"+id;
 var a="<?php echo $userid; ?>";
 var b="<?php echo $username; ?>";
var xhttps= new XMLHttpRequest();
xhttps.onreadystatechange= function(){
	if(xhttps.readyState == 4 && xhttps.status == 200){
document.getElementById(bnum).innerHTML=xhttps.responseText;

}
};

xhttps.open("GET", "blblckg.php?u="+id+"&a="+a+"&b="+b, true);
xhttps.send();

}
</script>


 
    <script>

$(".comment-holder").fadeOut("fast");
$(".dark-bg").fadeOut("fast");
$("#send-1").click(function () {
  $(".comment-holder").fadeIn("fast");
  $(".dark-bg").fadeIn("fast");
  });

  $("#removecomment").click(function () {
  $(".comment-holder").fadeOut("fast");
  $(".dark-bg").fadeOut("fast");
  });

    </script>
    <script src="js/script.js"></script>
</body>

</html>