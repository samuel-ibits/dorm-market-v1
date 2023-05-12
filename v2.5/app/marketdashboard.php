
 <?php include'../../api/token.php';
$t=$_GET['t'];
if($t==''){ $t=$_COOKIE['dormtoken'];}
$userid=validatetoken($t);

if($userid=='null'){
     echo'
  <script> window.location.href ="https://dorm.com.ng/v2.5/app"; </script>
 ';
 header('Location: https://dorm.com.ng/v2.5/app');
}


?>

 <?php  include'../connect.php';  
 
 if(isset($_POST['submiteta'])) { 
   $pctid=$_POST['pctid'];
      $etadate=$_POST['etadate'];

                                       
   $selr="update orders Set eta=".$etadate."  where orderid='".$pctid."'";

if ($conn20->query($selr) === TRUE) {
  echo'<script> alert( "Record Updated successfully");</script>';
} else {
 echo'<script> alert("Error updating record: " );</script>';
}
      
  }
 
  if(isset($_POST['clearproduct'])) { 
   $pctid=$_POST['pctid'];
                                       
   $selr="delete FROM orders where orderid='".$pctid."'";

if ($conn20->query($selr) === TRUE) {
  echo'<script> alert( "Record deleted successfully");</script>';
} else {
 echo'<script> alert("Error deleting record: " );</script>';
}
      
  }
 
 
  if(isset($_POST['deleteproduct'])) { 
   $pctid=$_POST['pctid'];
                                       
   $selr="delete FROM products where productid='".$pctid."'";

if ($conn20->query($selr) === TRUE) {
  echo'<script> alert( "Record deleted successfully");</script>';
} else {
 echo'<script> alert("Error deleting record: " );</script>';
}
      
  }
 
  if(isset($_POST['update'])) { 
      
$year=date("Y");
$rselr="SELECT * FROM profile WHERE Id='".$userid."'";
$result= $conn6->query($rselr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
    $name=$row["name"];
  $pic=$row["ppic"];
  $email=$row["email"];
  
  $userschool=$row["school"];
  
  $usercourse=$row["course"];
  
  $username=$row["username"];
  $phone=$row["phone"];
  
  
  
  $ppic=$row["ppic"];
  if($ppic=="media/"){$ppic="media/ppic/pro.png";
  }else{ $ppic=$row["ppic"];}
  
}}
  
  
	$file="cardfront";
		
$medianame1=basename( $_FILES["$file"]["name"]);
$mediatemp1=$_FILES["$file"]['tmp_name'];
$loc="../../";
  $uploaddir="media/profiles/vendor/";
 $uploaddest1=$uploaddir.$medianame1;
 if($uploaddest1=="media/profiles/"){$uploaddest1=$pic;}
 move_uploaded_file($mediatemp1,$loc.$uploaddest1);
 if($uploaddest1=="media/profiles/vendor/" or $uploaddest1=="" ){$uploaddest1="media/";}
 
 
		$file="cardback";
		
$medianame2=basename( $_FILES["$file"]["name"]);
$mediatemp2=$_FILES["$file"]['tmp_name'];
$loc="../../";
  $uploaddir="media/profiles/vendor/";
 $uploaddest2=$uploaddir.$medianame2;
 if($uploaddest2=="media/profiles/"){$uploaddest2=$pic;}
 move_uploaded_file($mediatemp2,$loc.$uploaddest2);
 if($uploaddest2=="media/profiles/vendor/" or $uploaddest2=="" ){$uploaddest2="media/";}
 



	$stmt =$conn20->prepare("INSERT INTO agent VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)") ;
$stmt->bind_param("ssssssssss", $userid, $name, $email, $phone, $ppic, $cardtype, $uploaddest1, $uploaddest2, $address, $status);
$status='pending';
$address=$_POST['address'];
$cardtype=$_POST['cardtype'];
$filefront=$_POST['filefront'];
$fileback=$_POST['fileback'];

if ( $stmt->execute()=== TRUE) {

    
$ale1 = "Your vendor request has been sumbmited, Please login and proceed to payment ";
echo " <script type='text/javascript'>alert('$ale1'); </script>";

}else{echo "An error occured please try again <br>";
echo($stmt->error);
}    


}
   $selr="SELECT * FROM agent where id='".$userid."'";
$result= $conn20->query($selr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
    $staaa=$row["status"];
    
if($staaa=='pending'){
    echo'<script>
    alert("Your dashboard is still pending approval");</script>';
     echo'
  <script> window.location.href ="https://dorm.com.ng/v2.5/app/pay.php?t='.$t.'"; </script>
 ';
 header('Location: https://dorm.com.ng/v2.5/app/pay.php?t='.$t);
}
}}else{
      echo'<script> alert("Upload a valid id card and address now to become a VENDOR");</script>';
      echo'
      <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
.input-holder{
    display: flex;
    gap: .9rem;
    width: 60%;
    margin-bottom: 1.5rem;
    align-items: center;
}

.input-holder input{
    border: none;
    outline: none;
    width: 100%;
    border-bottom: 1px solid var(--lighttext);
    padding-bottom: .5rem;
    color: var(--darkcolor);
    font-weight: 1000;
    background: transparent;
}

.input-holder input::placeholder{
    font-size: .6rem;
    color: var(--lighttext);
    font-weight: 1000;
}


.input-holder ion-icon{
  color: var(--lighttext);
}

.input-holder button{
    border: 2px solid var(--dormorange);
    padding: .5rem;
    width: 50%;
    font-weight: 1000;
    border-radius: 5px;
    font-size: .7rem;
    background: var(--white);
    cursor: pointer;
}

.input-holder button:nth-child(1){
    background: var(--dormorange);
    color: var(--white);
}

.input-holder .btn{
    border: 2px solid var(--dormorange);
    padding: .5rem;
    font-weight: 1000;
    border-radius: 5px;
    width: 50%;
    font-size: .7rem;
    background: var(--white);
    cursor: pointer;
    text-align: center;
}

.input-holder .btn:nth-child(1){
    background: var(--dormorange);
    color: var(--white);
}

</style>
<script>
        function sendeta(can) {
            
    var pctid= can.value;
     var pct =document.getElementById("sendetapct").value= pctid;
        }
     </script>
</head>
<body>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
     <p>Update this infomation</p>
                     <form action="marketdashboard.php" method="post" enctype="multipart/form-data" class="product-uploader">

       <div class="input-holder">
                    <ion-icon name="location"></ion-icon> <input type="text" name="address" placeholder="Address" required>
                </div>
                <div class="input-holder">
                    <p class="sub">ID card front</p>
                    <ion-icon name="id-card"></ion-icon> <input type="file" name="cardfront" placeholder="idfront" required>
                </div>

                <div class="input-holder">
                    <p class="sub">ID card back</p>
                    <ion-icon name="id-card"></ion-icon> <input type="file" name="cardback" placeholder="id back">
                </div>

                <div class="input-holder">
                    <p class="sub">Type of ID card</p>
                    <select name="cardtype" placeholder="ID card type" required>
                    
                        <option value="Nin">NIN</option>
                        <option value="drivers licence">Drivers licence</option>
                        <option value="voters card">Voter card</option>
                    </select>
                </div>
   
                            <div class="product-upload-btn-holder">
                            <button name="update">
                                <ion-icon name="upload"></ion-icon> Update
                            </button>
                           </form>
                        </div>
   
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
';
   
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
    <title>Market dashboard</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/mynote.css">
    <link rel="stylesheet" href="css/menucss.css">
    <link rel="stylesheet" href="css/library.css">
    <link rel="stylesheet" href="css/studytools.css">
    <link rel="stylesheet" href="css/wallet.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/marketdashboard.css">
   <link rel="stylesheet" href="css/specialmenucorrection.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <style>
        .bi-cash-stack {
            color: inherit;
        }

        @media only screen and (max-width: 600px) {
                          
div#photos-preview img {
    width: 20%;
}
            .page-content {
                width: 100%;
                height: auto;
                overflow-y: scroll;
                position: absolute;
                padding: 0rem 1rem;
            }
        }
    </style>
     <script>
        $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.preview-holder');
    });
});

</script>   
    
</head>

<body>

    <button class="add-product-btn">
        <ion-icon name="add"></ion-icon>
    </button>

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
                    <li class="active-nav menu-item">
                        <div class="icon-img"><img src="images/setting.png" alt=""></div>
                        <p class="menu-list-title-sub-side">Setting</p>
                    </li>
                </a>
            </ul>
          <?php include'../connect.php';

$year=date("Y");
$rselr="SELECT * FROM profile WHERE Id='".$userid."'";
$result= $conn6->query($rselr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
    $name=$row["name"];
  $pic=$row["ppic"];
  $userschool=$row["school"];
  
  $usercourse=$row["course"];
  
  $username=$row["username"];
  $phone=$row["phone"];
  
  
  
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
        
   $selr="SELECT * FROM products where userid='".$userid."'";
$result= $conn20->query($selr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
 $numberOfproducts= mysqli_num_rows($connStatus); 
        
}}else{$numberOfproducts=0;}


   $selr="SELECT * FROM orders where userid='".$userid."'";
$result= $conn20->query($selr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
 $pending= mysqli_num_rows($connStatus); 
        
}}else{$pending=0;}


 $selr="SELECT sum(price) as total FROM products where userid='".$userid."'";
$result= $conn20->query($selr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
 $priceOfproduct= $row["total"]; 
   
}}else{$priceOfproduct=0;}

$selr="SELECT sum(price) as total FROM orders where userid='".$userid."' and year='".$year."'";
$result= $conn20->query($selr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
 $yearlyorder= $row["total"]; 
   
}}else{$yearlyorder=0;}


if(isset($_POST['upload'])) {
//     if($staaa=='pending'){  
// echo'<script>
//     alert("Your dashboard is still pending approval");</script>';
//      echo'
//   <script> window.location.href ="https://dorm.com.ng/v2.5/app/pay.php?t='.$t.'"; </script>
//  ';}else if($staaa=='' ){
//     echo'
//   <script>document.getElementById("myModal");modal.style.display = "block";</script>
//  '; 
//  }else{
    
	$date=date("h:i:s A"). date("F j, Y");
$id="mkt".rand();
$name=$_POST['name'];
$price=$_POST['price'];
$about=$_POST['about'];
$unit=$_POST['unit'];
	
$location=$_POST['location'];
$category=$_POST['category'];
$rating="4";
$link="https://wa.me/".$wphone."?text=Hi,+I+am+intrested+in+your+market+product+Title:+".$title." ";
$null="";
$views="0";
$file="file";
$medianame1=basename( $_FILES["$file"]["name"][0]);
$mediatemp1=$_FILES["$file"]['tmp_name'][0];
$uploaddir="../../media/market/img/";
 $uploaddest1=$uploaddir.$medianame1;
 move_uploaded_file($mediatemp1,$uploaddest1);
 $upl11= $uploaddest1;
 
 
 
	
		
$medianame1=basename( $_FILES["$file"]["name"][1]);
$mediatemp1=$_FILES["$file"]['tmp_name'][1];
  $uploaddir="../../media/market/img/";
 $uploaddest1=$uploaddir.$medianame1;
 move_uploaded_file($mediatemp1,$uploaddest1);
 $upl12= $uploaddest1;
	
 
 
	
		
$medianame1=basename( $_FILES["$file"]["name"][2]);
$mediatemp1=$_FILES["$file"]['tmp_name'][2];
  $uploaddir="../../media/market/img/";
 $uploaddest1=$uploaddir.$medianame1;
 move_uploaded_file($mediatemp1,$uploaddest1);
 $upl13= $uploaddest1;
 
	
		
$medianame1=basename( $_FILES["$file"]["name"][3]);
$mediatemp1=$_FILES["$file"]['tmp_name'][3];
  $uploaddir="../../media/market/img/";
 $uploaddest1=$uploaddir.$medianame1;
 move_uploaded_file($mediatemp1,$uploaddest1);
 $upl14= $uploaddest1;
 
 
 
		
		
$medianame1=basename( $_FILES["$file"]["name"][4]);
$mediatemp1=$_FILES["$file"]['tmp_name'][4];
  $uploaddir="../../media/market/img/";
 $uploaddest1=$uploaddir.$medianame1;
 move_uploaded_file($mediatemp1,$uploaddest1);
 $upl15= $uploaddest1;
 
 

		
		
 
	
if ($name==""){}else{
	    
	
	$sqd="INSERT INTO products VALUES ('$id', '$userid', '$name', '$price', '$location', '$about', '$category', '$upl11', '$upl12', '$upl13', '$upl14', '$upl15', '0', '$unit', 'for sale', '0', '$phone', '$link', 'Not appointed yet')";
	 if ($conn20->query($sqd)==false) {echo $conn20->error. "Error: not uploaded try again it might be network issues ";
	  }else{
	      
$ale1 = "Uploaded successfully";
echo "<script type='text/javascript'>alert('uploaded  successfully');</script>";

//  Echo '<script type="text/Javascript">window.location.href ="https://dorm.com.ng/v2.5/app/marketdashboard.php?t='.$t.'";</script>';

	  }
// 	}



    
}
}
    
    
?>
         

            <div class="product-uploader-holder">
                <div class="product-uploader">
                    <span class="remove-product">
                        <button class="remove-product">Back</button>
                    </span>
                    
                    <form action="" method="post"  enctype="multipart/form-data">
                    <div class="product-upload-card">
                         
                        <div class="add-image">
                           
                        
                            <input type="file" name="file[]"  id="gallery-photo-add" multiple required>
                        </div>


                        <div class="preview-holder" id='photos-preview'>
                            
                        </div>

                        <div class="prodcut-info-box-1">
                            <input type="text" name="name" placeholder="Name of product" maxlength="25" required>
                            <input type="number" name="price" placeholder="Price of product(N)" required>
                            <input type="number" name="unit" placeholder="Number of available units" required>
                            <textarea name="about" placeholder="About product (optional)" id="" cols="20"
                                rows="2"></textarea>
                                <input type="text" name="location" placeholder="Location" required>
                        </div>
                        <div class="security-level-holder">
                                <p class="sub">Categories</p>
                                <select name="category" id="" required>
                                    <option value="Clothing">Clothing</option>
                                    <option value="Food Stuffs">Food Stuffs</option>
                                    <option value="Technology accesories">Technology accesories</option>
                                    <option value="Services">Services</option>
                                </select>

                            </div>
                        <div class="product-upload-btn-holder">
                            <button name="upload">
                                <ion-icon name="cloud-upload"></ion-icon> Upload product
                            </button>
                            
                        </div>
                    </div></form>
                </div>
            </div>
           
           
            <div class="dark-bg"></div>
 <div class="page-content">
            <div class="mangeproductdiv">
                <div class="fullagentscreen">
                    <div class="mainscreendata">
                        <div class="mainscreen-section-1">
                            <div class="agent-screen-right">
                                <div class="mainscreen-topcard-holder">
                                    <div class="mainscreen-topcard">
                                        <div class="mainscreen-topcard-box orange">
                                            <ion-icon name="wallet-outline"></ion-icon>
                                        </div>
                                        <div class="mainscreen-topcard-text">
                                            <p>NO of product</p>
                                            <p><?php echo $numberOfproducts; ?></p>
                                        </div>
                                    </div>
                                    <div class="mainscreen-topcard">
                                        <div class="mainscreen-topcard-box blue">
                                            <ion-icon name="wallet-outline"></ion-icon>
                                        </div>
                                        <div class="mainscreen-topcard-text">
                                            <p>Total value of products</p>
                                            <p><?php echo $priceOfproduct; ?></p>
                                        </div>
                                    </div>
                                    <div class="mainscreen-topcard">
                                        <div class="mainscreen-topcard-box ash">
                                            <ion-icon name="wallet-outline"></ion-icon>
                                        </div>
                                        <div class="mainscreen-topcard-text">
                                            <p>Pending orders</p>
                                            <p><?php echo $pending; ?></p>
                                        </div>
                                    </div>
                                    <div class="mainscreen-topcard">
                                        <div class="mainscreen-topcard-box blue">
                                            <ion-icon name="wallet-outline"></ion-icon>
                                        </div>
                                        <div class="mainscreen-topcard-text">
                                            <p>Total amount recieved this year</p>
                                            <p><?php echo $yearlyorder; ?></p>
                                        </div>
                                    </div>

                                </div>
                                <div class="chart-holder">
                                    <div>
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
  <div class="alert alert-warning" role="alert" id="myBtn">
                            <dt class="col-sm-3">Alert<ion-icon name="alert"></ion-icon>
                            </dt>
                            <dd class="col-sm-9">Upload a valid ID card and address to complete your account as a vendor
                                on dorm.</dd>
                        </div>
                        
                        
                    

                    <div class="alterscreen">
                        

                        <div class="boost-card-holder">
                           
                        </div>

                       <h3>ORDER HISTORY</h3>
             <?php  include'../connect.php';         
  
  
  
   $selr="SELECT * FROM orders where userid='".$userid."'";
$result= $conn20->query($selr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){             
                                  echo' <div class="inventory-card">
                                    <div class="transaction-card-image">
                                        <img src="dorm.com.ng/'.$row["buyerpic"].'" alt="">
                                    </div>
                                    <div class="transaction-card-data">
                                        <p>'.$row["buyername"].'</p>
                                        <p class="transaction-card-data-product-name">'.$row["productname"].' </p>
                                        
                                    </div>
                                    <div class="transaction-card-data">
                                        <p>Price</p>
                                        <p>
                                            N '.$row["price"].'
                                        </p>
                                    </div>

                                    <div class="transaction-card-data">
                                        <p>Date</p>
                                        <p>'.$row["date"].'</p>
                                    </div>
                                       <div class="transaction-card-data">
                                        <p>Location</p>
                                        <p>'.$row["location"].'</p>
                                    </div>
                                    <div class="transcation-card-status green">
                                        <ion-icon name="checkmark-outline"></ion-icon>
                                    </div>
                                    <div class="transaction-card-product-image">
                                        <img src="'.$row["productpic"].'" alt="">
                                    </div>
                                     <div class="flex-btn-btns">
                                       <form action="" method="post">
                                <input type="hidden"  name="pctid" value="'.$row["orderid"].'"/>
                               
 <button type="submit" name="clearproduct" class="btn btn-success">Order Cleared</button></form>
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#exampleModal" value="'.$row["orderid"].'"  onclick="sendeta(this)">Send ETA</button>
                                    
                                </div>
                              </div><br>';
                                }}else{echo'<p><p>No Orders Yet<p><p>';}
                                ?>
                               
                               
                               
                        <h3>INVENTORY</h3>
                        <div>
                            <div class="inventory-card-holder">
      <?php include'../connect.php';                          
                                        
   $selr="SELECT * FROM products where userid='".$userid."'";
$result= $conn20->query($selr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
ECHO'
                            
                                <div class="inventory-card">
                                    <div class="inventory-card-image">
                                        <img src="'.$row["pic1"].'" alt="">
                                    </div>
                                    <div class="inventory-card-total-number-of-product">
                                        <p>Inspected</p>
                                        <p>'.$row["views"].'</p>
                                    </div>

                                    <div class="inventory-card-number-sold">
                                        <p>Sold</p>
                                        <p>'.$row["sold"].'/'.$row["unit"].'</p>
                                    </div>
                                    <div class="inventory-card-price">
                                        <p>Price/unit</p>
                                        <p>
                                            N '.$row["price"].'
                                        </p>
                                    </div>

                                    <div class="inventory-card-price">
                                        <p>Total profit</p>
                                        <p>
                                            N '.$row["price"]*$row["sold"].'
                                        </p>
                                    </div>
                                
                                <form action="" method="post">
                                <input type="hidden"  name="pctid" value="'.$row["productid"].'"/>
                                <button type="submit" class="btn btn-danger" name="deleteproduct" >Delete</button></form>
                                </div>
     ';

                                
}}else{echo '<p><p>No Inventory Yet<p><p>';}


?>
 
                                
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Estimated Time of Arrival</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Date</label>
                            <input type="date" class="form-control" name="etadate" id="recipient-name">
                        </div>
                    <input type="hidden" id="sendetapct" name="pctid" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit"  name="submiteta" class="btn btn-primary">Send to customer</button></form>
                </div>
            </div>
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
                                    <i class="bi bi-graph-up-arrow"></i>
                                </div>
                                <p class="menu-list-title-sub-side-1">Manage products</p>
                            </li>
                        </a>
                        <a href="marketdashboard.php?t=<?php echo$t; ?>">
                            <li class="menu-item    active-tool-icon">
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
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="js/script.js"></script>
    <script src="js/profile.js"></script>
    <script>
        const labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];


        const data = {
            labels: labels,
            datasets: [{
                label: 'PROFIT MADE IN NAIRA/1000',
                data: [0, 0, 0, 0, 0, 0, 0],
                backgroundColor: [
                    '#0688d3',
                    '#0688d3',
                   '#0688d3',
                    '#0688d3',
                    '#0688d3',
                    '#0688d3'
                ],
                borderColor: [
                    '#f96b03',
                    '#0688d3',
                    '#f96b03',
                    '#0688d3',
                    '#f96b03',
                    '#0688d3'
                ],
                borderWidth: 1
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };
    </script>
    <script>
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
    <script>
        $(".bi-x").click(function () {
            $(".bot-container-2").hide("fast");
        });

        $(".bi-bell-fill").click(function () {
            $(".notification").fadeToggle('fast');
        });

        $( document ).ready(function() { 
            $(".product-uploader-holder").hide("fast");
  $(".dark-bg").hide('fast');
});

$(".remove-product").click(function () {
  $(".product-uploader-holder").hide("fast");
  $(".dark-bg").hide('fast');
});


$(".add-product-btn").click(function () {
  $(".product-uploader-holder").show('fast');
  $(".dark-bg").show('fast');
});
    </script>

</body>

</html>