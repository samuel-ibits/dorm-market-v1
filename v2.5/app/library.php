
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
    <title>Library</title>
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

    <style>

        
        @media only screen and (max-width: 600px) 
        {
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

<body>

    <div class="study-tools-tool-holder">
        <div class="study-tool-tool">
            <ul class="tool-icon-holder">
                <li class="tool-icon"><a href="notebook.php?t=<?php echo$t; ?> "><img src="images/nootbook.png" alt=""></a></li>
                <li class="tool-icon"><a href="noteweb.php?t=<?php echo$t; ?> "><img src="images/upload.png" alt=""></a></li>
                <li class="tool-icon"><a href=""><img src="images/calculator.png" alt=""></a></li>
                <li class="active-tool-icon tool-icon"><a href="library.php?t=<?php echo$t; ?> "><img src="images/book.png" alt=""></a></li>
                <li class="tool-icon"><a href="cbt.php?t=<?php echo$t; ?> "><img src="images/monitor.png" alt=""></a></li>
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
                <a href="studytools.php?t=<?php echo$t; ?> ">
                    <li class="active-nav  menu-item">
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
            <div class="library">
                <div class="cartegories">
                    <h3 class="big-blue-text">CATEGORIES</h3>
                   <div class="cart-holder">
                    <div class="cart-elements">
                        <div class="cartegory-box">
                            <p class="cartegory-heading">ART</p>
                            <ul class="cartegory-list">
                                <li><a href="">Economics</a></li>  
                                <li><a href="">Accounting</a></li>
                                <li><a href="">Political science</a></li>  
                                <li><a href="">History and international science</a></li>
                            </ul>

                            <a class="seemore">seemore...</a>
                        </div>

                        <div class="cartegory-box">
                            <p class="cartegory-heading">SCIENCE</p>
                            <ul class="cartegory-list">
                                <li><a href="">Chemisty</a></li>  
                                <li><a href="">Biology</a></li>
                                <li><a href="">Mathematical science</a></li>  
                                <li><a href="">Computer science</a></li>
                            </ul>

                            <a class="seemore">seemore...</a>
                        </div>

                        <div class="cartegory-box">
                            <p class="cartegory-heading">SOCIAL SCIENCE</p>
                            <ul class="cartegory-list">
                                <li><a href="">Geography</a></li>  
                                <li><a href="">Geology</a></li>
                            </ul>

                            <a class="seemore">seemore...</a>
                        </div>
                    </div>
                   </div>
                    <div class="mobile-search-bar">
                    <input type="search" placeholder="Search">
                    <button>Search</button>
                   </div>
                   
                <div class="long-btn-holder">
                   <a href="categoriespage.php?t=<?php echo$t; ?> "><button class="big-btn">More categories</button></a>
                </div>
                <div class="library-holder">
                    <p class="underlined-text">Newly updated</p>
                    <div class="library-grid">
                        
                        
           <?php include'../connect.php';
                    
     if(isset($_POST['searchs'])) {$search=$_POST['search'];
echo $search;
	$selr="SELECT * FROM books where groups like '%$search%' or name like '%$search%'";
$result= $conn12->query($rselr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
    
         
   echo'    <a href="../../../'.$row["refid"].'#toolbar=0" 
    width="100%" >        
                
                <div class="library-card">
                            <div class="library-card-image">
                                <img src="images/pdf.jpg" alt="">
                            </div>
                            <p class="book-title">'.$row["name"].'</p>
                        </div></a>
                
                ';
                
                }}else{echo"No books with that name, check back later.";}
                echo'<br>';
     }
     
   $rselr="SELECT * FROM books ORDER BY name ASC";
$result= $conn12->query($rselr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
    
         
   echo'       <a href="../../../'.$row["refid"].'#toolbar=0" 
    width="100%" >        
                
                <div class="library-card">
                            <div class="library-card-image">
                                <img src="images/pdf.jpg" alt="">
                            </div>
                            <p class="book-title">'.$row["name"].'</p>
                        </div></a>
                ';
                
                }}else{echo"No books in the library yet, check back later.";}
                
                ?>
                
   

                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="page-side">
            <div class="search-2">
                <ion-icon name="search"></ion-icon> 
                
<form action="" method="post">
<input type="text" placeholder="Search for a book" name="search" id="">
                <button class="big-orange-2" name="searchs">search</button></form>
            </div>

            <div class="blue-area-2">
                <p class="heading-text">Study tools</p>

                <div class="bottom-side-list">
                    <ul class="smaller">
                        <a href="notebook.php?t=<?php echo$t; ?> ">
                            <li class="menu-item">
                                <div class="icon-img-small-icon"><img src="images/nootbook.png" alt=""></div>
                                <p class="menu-list-title-sub-side-1">Note Book</p>
                            </li>
                        </a>

                        <a href="noteweb.php?t=<?php echo$t; ?> ">
                            <li class="menu-item">
                                <div class="icon-img-small-icon"><img src="images/upload.png" alt=""></div>
                                <p class="menu-list-title-sub-side-1">Note Web</p>
                            </li>
                        </a>
                        <a href="gpcalc.php?t=<?php echo$t; ?> ">
                            <li class="menu-item">
                                <div class="icon-img-small-icon"><img src="images/calculator.png" alt=""></div>
                                <p class="menu-list-title-sub-side-1">CGPA Calculator</p>
                            </li>
                        </a>
                        <a href="library.php?t=<?php echo$t; ?> ">
                            <li class="active-tool-icon menu-item">
                                <div class="icon-img-small-icon"><img src="images/book.png" alt=""></div>
                                <p class="menu-list-title-sub-side-1">Library</p>
                            </li>
                        </a>
                        <a href="cbt.php?t=<?php echo$t; ?> ">
                            <li class="menu-item">
                                <div class="icon-img-small-icon"><img src="images/monitor.png" alt=""></div>
                                <p class="menu-list-title-sub-side-1">CBT Test</p>
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

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
    
    <script src="js/script.js"></script>
</body>

</html>