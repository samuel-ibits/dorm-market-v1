<?php include'../connect.php';


 $id=$_REQUEST['u'];

$selr="SELECT * FROM product where productid='".$id."'";
$result= $conn14->query($selr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
 $name=$row["name"]; $price=$row["price"]; $about=$row["about"];
$pic1=$row["pic1"];if($pic1=="../../../media/accomodia/img/"){$pic1="../../../media/placeholder.png";}
$pic2=$row["pic2"]; if($pic2=="../../../media/accomodia/img/"){$pic2="../../../media/placeholder.png";}
$pic3=$row["pic3"]; if($pic3=="../../../media/accomodia/img/"){$pic3="../../../media/placeholder.png";}
$pic4=$row["pic4"]; if($pic4=="../../../media/accomodia/img/"){$pic4="../../../media/placeholder.png";}
$pic5=$row["pic5"]; if($pic5=="../../../media/accomodia/img/"){$pic5="../../../media/placeholder.png";}
$pic6=$row["pic6"];if($pic6=="../../../media/accomodia/img/"){$pic6="../../../media/placeholder.png";}
$vid1=$row["vid1"]; $vid2=$row["vid2"]; $vid3=$row["vid3"]; $vid4=$row["vid4"];
$vid5=$row["vid5"]; $vid6=$row["vid6"]; $messageid=$row["messageid"];
$status=$row["status"];
$views=$row["views"]; 
$newviews=$views+1;
$sql = "UPDATE product SET views='".$newviews."' WHERE id='".$id."'";

if ($conn14->query($sql) === TRUE) {
  
} else {
  
}


$contact=$row["contact"]; 
$link=$row["link"];
                    
 echo'                  <div class="slider">
                    <div class="back-to-accomodia" onclick="backk()">
                        <ion-icon name="arrow-back"></ion-icon>
                    </div>
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                        class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img
                                    src="'.$pic1.'" />
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="'.$pic2.'" />
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="'.$pic3.'" />
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="'.$pic4.'" />
                            </div>

                            <div class="swiper-slide">
                                <img
                                    src="'.$pic5.'" />
                            </div>

                        </div>
                        <div class="swiper-button-next" onclick="plusSlides(1)"></div>
                        <div class="swiper-button-prev" onclick="plusSlides(-1)"></div>
                    </div>
                    <div thumbsSlider="" class="thumbnail swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide dot" onclick="currentSlide(1)">
                                <img
                                    src="'.$pic1.'" />
                            </div>
                            <div class="swiper-slide dot" onclick="currentSlide(2)">
                                <img
                                    src="'.$pic2.'" />
                            </div>
                            <div class="swiper-slide dot" onclick="currentSlide(3)">
                                <img
                                    src="'.$pic3.'" />
                            </div>
                            <div class="swiper-slide dot" onclick="currentSlide(4)">
                                <img
                                    src="'.$pic4.'" />
                            </div>
                            <div class="swiper-slide dot" onclick="currentSlide(5)">
                                <img
                                    src="'.$pic5.'" />
                            </div>

                            <div class="swiper-slide dot" onclick="currentSlide(6)">
                                <img
                                    src="'.$pic6.'" />
                            </div>

                        </div>
                    </div>
                </div>
                
                
                <div class="mobile-house-info-holder">
                    <div class="house-info">
                        <div class="house-info-sub">
                            <h2 class="grey">'.$name.'</h2>
                            <h2 class="orange">N'.$price.'</h2>
                        </div>
                        <div class="house-info-sub">
                            <ul>
                                <li>
                                    <h2 class="grey-2">'.$security.'</h2>
                                    <p class="blue-small">Security level</p>
                                </li>

                                <li>
                                    <h2 class="grey-2">'.$time.'</h2>
                                    <p class="blue-small">Time from</p>
                                </li>

                                <li>
                                    <h2 class="grey-2">'.$distance.'</h2>
                                    <p class="blue-small">Distance from School</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="lighter">
                        <div class="agent-info">
                            <span class="location-icon">
                                <ion-icon name="location"></ion-icon>
                            </span>
                            <div class="about-house-info">
                                <p>'.$about.'</p>
                            </div>
                        </div>

                        <div class="agent-info-button-holder">
                        <input type="text" value="'.$contact.'" id="myInput" style="display:none;">
                            <button class="blue-bg" onclick="copy()">
                                <ion-icon name="copy"></ion-icon>'.$contact.'
                            </button>
                            <button class="orange-bg"><a href="'.$link.'"  >Chat with Agent</a></button>
                        </div>
                    </div>

                    <div class="bottom-div">
                        <div class="rating">Agent rating:
                            <ul class="stars">
                                <li class="good">
                                    <ion-icon name="star"></ion-icon>
                                </li>
                                <li class="good">
                                    <ion-icon name="star"></ion-icon>
                                </li>
                                <li class="good">
                                    <ion-icon name="star"></ion-icon>
                                </li>
                                <li class="good">
                                    <ion-icon name="star"></ion-icon>
                                </li>
                                <li class="not-good">
                                    <ion-icon name="star"></ion-icon>
                                </li>
                            </ul>
                        </div>

<span id="'.$row["userid"].'" class="hus_but" onclick="ccontact(this)">
                        <button class="big-blue-bottom" id="meetagent">
                            <ion-icon name="people"></ion-icon> Meet with Agent
                        </button>
                       <span> 
                    
                        <form method="post" action="">
               <input type="text" value="'.$price.'" name="amount" style="display:none;">
                  <input type="text" value="'.$id.'" name="pctid" style="display:none;">
                         <button  name="pay" class="big-blue-bottom" >
                             PAY NOW
                        </button></form>
                    </div>
                  
   
             ';
}}





 

    
  echo'  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
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
 <script src="../js/swiper.js"></script>
     

    <script src="js/script.js"></script>

    ';

  ?>


  
  