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
    <title>Cartegories</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="css/mynote.css">
    <link rel="stylesheet" href="css/studytools.css">
    <link rel="stylesheet" href="css/library.css">
    <link rel="stylesheet" href="css/menucss.css">
    <link rel="stylesheet" href="css/categories.css">

    <style>

    </style>
</head>

<body>
    <div class="study-tools-tool-holder">
        <div class="study-tool-tool">
            <ul class="tool-icon-holder">
                <li class="tool-icon"><a href="notebook.php?t=<?php echo$t; ?>"><img src="images/nootbook.png" alt=""></a></li>
                <li class="tool-icon"><a href="newnoteweb.php?t=<?php echo$t; ?>"><img src="images/upload.png" alt=""></a></li>
                <li class="tool-icon"><a href=""><img src="images/calculator.png" alt=""></a></li>
                <li class="active-tool-icon tool-icon"><a href="newlibrary.php?t=<?php echo$t; ?>"><img src="images/book.png" alt=""></a>
                </li>
                <li class="tool-icon"><a href="cbt-test.php?t=<?php echo$t; ?>"><img src="images/monitor.png" alt=""></a></li>
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
            <div class="logo-img"><img src="images/dorm_logo_white.png" alt="">
            </div>
            <ul class="menu-list">
                <a href="newstudytools.php?t=<?php echo$t; ?>">
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
                <a href="texter-2.php?t=<?php echo$t; ?>">
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
            <div class="my-notes-page">
                <div class="page-title">
                    <a href="library.php?t=<?php echo$t; ?>">
                        <button class="circle-back">
                            <ion-icon name="chevron-back"></ion-icon>
                        </button>
                    </a>

                    ALL CATEGORIES</div>
                <div class="category-sub" id="art">
                    <div class="page-title">
                        <button class="circle-back">
                            <ion-icon name="chevron-back"></ion-icon>
                        </button> ART</div>
                    <div class="note-card-holder">
                        <div class="note-card">
                            <div class="note-card-info">
                                <p class="name-of-note margin-left-1rem">CSC (101 intro to csc)</p>
                            </div>
                        </div>
                        <div class="note-card ">
                            <div class="note-card-info">
                                <p class="name-of-note margin-left-1rem">CSC (101 intro to csc)</p>
                            </div>
                        </div>
                        <div class="note-card">
                            <div class="note-card-info">
                                <p class="name-of-note margin-left-1rem">CSC (101 intro to csc)</p>
                            </div>
                        </div>
                        <div class="note-card">
                            <div class="note-card-info">
                                <p class="name-of-note margin-left-1rem">CSC (101 intro to csc)</p>
                            </div>
                        </div>
                        <div class="note-card">
                            <div class="note-card-info">
                                <p class="name-of-note margin-left-1rem">CSC (101 intro to csc)</p>
                            </div>
                        </div>
                        <div class="note-card">
                            <div class="note-card-info">
                                <p class="name-of-note margin-left-1rem">CSC (101 intro to csc)</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="categories-grid">
                    <div class="center-grid-item">
                        <div class="cartegory-box-div">
                            <p class="cartegory-heading">ART</p>
                            <ul class="cartegory-list">
                                <li><a href="">Economics</a></li>
                                <li><a href="">Accounting</a></li>
                                <li><a href="">Political science</a></li>
                                <li><a href="">History and international science</a></li>
                            </ul>
                            <a href="#!" id="artMore" class="seemore">see more...</a>
                        </div>
                    </div>

                    <div class="center-grid-item">
                        <div class="cartegory-box-div">
                            <p class="cartegory-heading">SCIENCE</p>
                            <ul class="cartegory-list">
                                <li><a href="">Chemisty</a></li>
                                <li><a href="">Biology</a></li>
                                <li><a href="">Mathematical science</a></li>
                                <li><a href="">Computer science</a></li>
                            </ul>
                            <a href="#!" class="seemore">see more...</a>
                        </div>
                    </div>

                    <div class="center-grid-item">
                        <div class="cartegory-box-div">
                            <p class="cartegory-heading">SOCIAL SCIENCE</p>
                            <ul class="cartegory-list">
                                <li><a href="">Geography</a></li>
                                <li><a href="">Geology</a></li>
                            </ul>
                            <a href="#!" class="seemore">see more...</a>
                        </div>
                    </div>

                    <div class="center-grid-item">
                        <div class="cartegory-box-div">
                            <p class="cartegory-heading">SOCIAL SCIENCE</p>
                            <ul class="cartegory-list">
                                <li><a href="">Geography</a></li>
                                <li><a href="">Geology</a></li>
                            </ul>
                            <a href="#!" class="seemore">see more...</a>
                        </div>
                    </div>

                    <div class="center-grid-item">
                        <div class="cartegory-box-div">
                            <p class="cartegory-heading">SCIENCE</p>
                            <ul class="cartegory-list">
                                <li><a href="">Chemisty</a></li>
                                <li><a href="">Biology</a></li>
                                <li><a href="">Mathematical science</a></li>
                                <li><a href="">Computer science</a></li>
                            </ul>
                            <a href="#!" class="seemore">see more...</a>
                        </div>
                    </div>

                    <div class="center-grid-item">
                        <div class="cartegory-box-div">
                            <p class="cartegory-heading">SCIENCE</p>
                            <ul class="cartegory-list">
                                <li><a href="">Chemisty</a></li>
                                <li><a href="">Biology</a></li>
                                <li><a href="">Mathematical science</a></li>
                                <li><a href="">Computer science</a></li>
                            </ul>
                            <a href="#!" class="seemore">see more...</a>
                        </div>
                    </div>

                    <div class="center-grid-item">
                        <div class="cartegory-box-div">
                            <p class="cartegory-heading">SCIENCE</p>
                            <ul class="cartegory-list">
                                <li><a href="">Chemisty</a></li>
                                <li><a href="">Biology</a></li>
                                <li><a href="">Mathematical science</a></li>
                                <li><a href="">Computer science</a></li>
                            </ul>
                            <a href="#!" class="seemore">see more...</a>
                        </div>
                    </div>

                    <div class="center-grid-item">
                        <div class="cartegory-box-div">
                            <p class="cartegory-heading">SCIENCE</p>
                            <ul class="cartegory-list">
                                <li><a href="">Chemisty</a></li>
                                <li><a href="">Biology</a></li>
                                <li><a href="">Mathematical science</a></li>
                                <li><a href="">Computer science</a></li>
                            </ul>
                            <a href="#!" class="seemore">see more...</a>
                        </div>
                    </div>

                    <div class="center-grid-item">
                        <div class="cartegory-box-div">
                            <p class="cartegory-heading">SCIENCE</p>
                            <ul class="cartegory-list">
                                <li><a href="">Chemisty</a></li>
                                <li><a href="">Biology</a></li>
                                <li><a href="">Mathematical science</a></li>
                                <li><a href="">Computer science</a></li>
                            </ul>
                            <a href="#!" class="seemore">see more...</a>
                        </div>
                    </div>
                    <div class="center-grid-item">
                        <div class="cartegory-box-div">
                            <p class="cartegory-heading">SCIENCE</p>
                            <ul class="cartegory-list">
                                <li><a href="">Chemisty</a></li>
                                <li><a href="">Biology</a></li>
                                <li><a href="">Mathematical science</a></li>
                                <li><a href="">Computer science</a></li>
                            </ul>
                            <a href="#!" class="seemore">see more...</a>
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
                <div class="text-icon border-bottom">
                    <div class="icon"><img src="images/dorm_icon.png" alt=""></div>
                    <p class="double-section-text">Create a new note</p>
                </div>
                <div class="text-icon">
                    <div class="icon"><img src="images/dorm_icon.png" alt=""></div>
                    <p class="double-section-text">Create a new note</p>
                </div>
            </div>

            <div class="blue-area">
                <p class="heading-text">Study tools</p>
                <div class="bottom-side-list-2">
                    <ul class="smaller">
                        <a href="">
                            <li class="menu-item">
                                <div class="icon-img-small-icon"><img src="images/nootbook.png" alt=""></div>
                                <p class="menu-list-title-sub-side">Note Book</p>
                            </li>
                        </a>

                        <a href="noteweb.php?t=<?php echo$t; ?>">
                            <li class="menu-item">
                                <div class="icon-img-small-icon"><img src="images/upload.png" alt=""></div>
                                <p class="menu-list-title-sub-side">Note Web</p>
                            </li>
                        </a>
                        <a href="gpcalc.php?t=<?php echo$t; ?>">
                            <li class="menu-item">
                                <div class="icon-img-small-icon"><img src="images/calculator.png" alt=""></div>
                                <p class="menu-list-title-sub-side">CGPA Calculator</p>
                            </li>
                        </a>
                        <a href="library.php?t=<?php echo$t; ?>">
                            <li class="menu-item">
                                <div class="icon-img-small-icon"><img src="images/book.png" alt=""></div>
                                <p class="menu-list-title-sub-side">Library</p>
                            </li>
                        </a>
                        <a href="cbt.php?t=<?php echo$t; ?>">
                            <li class="menu-item">
                                <div class="icon-img-small-icon"><img src="images/monitor.png" alt=""></div>
                                <p class="menu-list-title-sub-side">CBT Test</p>
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



        $("#artMore").click(function () {
            $("#art").fadeIn('fast');
            $(".categories-grid").fadeOut('fast');
        });

        $(".circle-back").click(function () {
            $(".category-sub").fadeOut('fast');
            $(".categories-grid").fadeIn('fast');

        });
    </script>
</body>

</html>