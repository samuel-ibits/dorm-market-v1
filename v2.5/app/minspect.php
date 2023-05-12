<?php include'../connect.php';
 

  $userid=$_REQUEST['u'];


  $pctid=$_REQUEST['a'];
 
 
$rselr="SELECT * FROM profile WHERE Id='".$userid."'";
$result= $conn6->query($rselr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){

   $name=$row["name"];
    $id=$row["Id"];
  $pic=$row["ppic"];
  $userschool=$row["school"];
  
  $usercourse=$row["course"];
  
  $username=$row["username"];
  
  $address=$row["location"];
  
  
  
  $ppic=$row["ppic"];
  if($ppic=="media/"){$ppic="media/ppic/pro.png";
  }else{ $ppic=$row["ppic"];}
}}

$selr="SELECT * FROM products where productid='".$pctid."'";
$result= $conn20->query($selr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
    $pdname=$row["name"];
    $pdpic=$row["pic1"];
    $sellerid=$row["userid"];
    
 $price=$row["price"]; 
 $about=$row["about"];
$status=$row["status"];
$views=$row["views"]; 
$newviews=$views+1;

$sql = "UPDATE products SET views='".$newviews."' WHERE productid='".$pctid."'";

if ($conn20->query($sql) === TRUE) {} else {}

echo' 
 <div class="inspect-market-image" id="newins" >
 <button type="button" class="btn btn-primary back" style="position:absolute;z-index:99" onclick="backk()">
                            Back</button>
             
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="'.$row["pic1"].'" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="'.$row["pic2"].'" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="'.$row["pic3"].'" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="'.$row["pic4"].'" alt="">
                                </div>


                            </div>
                        </div>
                    </div>
 
                    <div class="about-product" >


                        <div class="tools-shopping-grid">
                            <ul>
                                
                            
                             <button type="button" class="btn btn-primary flex-btn">
                                        <span class="sr-only"><i class="bi bi-heart-fill"></i></span>
                                        <span class="badge badge-light">'.$row["views"].'</span>
                                    </button>

                                    <button type="button" class="btn btn-primary flex-btn">
                                        <span class="sr-only"><i class="bi bi-share-fill"></i></span>
                                    </button>

                                    <button type="button"  onclick="copy()" class="btn btn-primary flex-btn">
                                        <span class="sr-only"><ion-icon name="call"></ion-icon></span>
                                    </button>
                              </ul>
                              
                              
                              
                              
                              
                            <input type="text" value="'.$contact.'" id="myInput" style="display:none;">
                        </div>

                        <p class="product-name">
                            '.$row["name"].'
                        </p>
                         <div class="item-pric">N <span>'.$price.'</span></div>
                        <p class="about-product-text">
                            '.$row["about"].'
                        </p>
                       
                        <dl class="row">
                            <dt class="col-sm-3">Quantity</dt>
                            <dd class="col-sm-9">'.$row["sold"].'/'.$row["unit"].'</dd>
                          </dl>
 <dl class="row">
                            <dt class="col-sm-3">Location</dt>
                            <dd class="col-sm-9">'.$row["location"].'</dd>
                          </dl>
                        <div class="flexed-btn">
                           
                       
<form method="post" action="minspect.php?t=<?php echo$t; ?> ">
                      <input type="text" value="'.$pctid.'" name="pctid" style="display:none;">
                     <input type="text" value="'.$pdname.'" name="pdname" style="display:none;">
                     <input type="text" value="'.$pdpic.'" name="pdpic" style="display:none;">
                     <input type="text" value="'.$sellerid.'" name="sellerid" style="display:none;">
                     <input type="text" value="'.$userid.'" name="userid" style="display:none;">
                     <input type="text" value="'.$name.'" name="name" style="display:none;">
                     <input type="text" value="'.$ppic.'" name="ppic" style="display:none;">

                     



               <input type="text" value="'.$price.'" name="amount" style="display:none;">
               
                <button type="submit" class="btn btn-primary orange-bg paynow" name="pay" ><i class="bi bi-bag-fill"></i> PAY NOW</button>

                    </form>
                    </div>
                    </div> </div>
                    
                    ';
                  

}}
    
if(isset($_POST['pay'])) {

$pctid=$_POST['pctid'];
$pdname=$_POST['pdname'];
$pdpic=$_POST['pdpic'];
$sellerid=$_POST['sellerid'];
$userid=$_POST['userid'];
$address=$_POST['address'];
$ppic=$_POST['ppic'];
$name=$_POST['name'];


$amount=$_POST['amount'];
$date=date("Y/m/d");
$year=date("Y");

$tranid="tram".rand(100000,999999);

   
$ale1 = "Procesing... ";
echo " <script type='text/javascript'>alert('$ale1'); </script>"; 

 $in = "INSERT INTO orders VALUES ('$tranid', '$pctid', '$pdname', '$pdpic', '$sellerid', '$userid', '$ppic', '$name', '$address', '$amount', 'processing', '$date', '$year', 'null')";

if ($conn20->query($in) === TRUE) {
  echo'
  <script> window.location.href ="https://dorm.com.ng/api/paystack.php?amount='.$amount.'&email='.$email.'&tranid='.$tranid.'"; </script>
 ';
    header("Location:https://dorm.com.ng/api/paystack.php?amount=".$amount."&email=".$email."&tranid=".$tranid."");

}else{echo "An error occured please try again <br>";
echo($conn20->error);
    

}
  } 
?>
