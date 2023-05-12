
 <?php include'../../api/token.php';
$t=$_GET['t'];
if($t==''){ $t=$_COOKIE['dormtoken'];}
$userid=validatetoken($t);

if($userid=='null'){
 header('Location: https://dorm.com.ng/v2.5/app');
}
?>


 <?php  include'../connect.php';        
 
  if(isset($_POST['update'])) { 
$year=date("Y");
$rselr="SELECT * FROM profile WHERE Id='".$userid."'";
$result= $conn6->query($rselr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
    $name=$row["name"];
  $pic=$row["ppic"];
  
  $email= $row["email"];
  
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
  $uploaddir="media/profiles/agent/";
 $uploaddest1=$uploaddir.$medianame1;
//  compressImage($mediatemp1, $loc.$uploaddest1, 75);
 move_uploaded_file($mediatemp1,$loc.$uploaddest1);
 if($uploaddest1=="media/profiles/agent/" or $uploaddest1=="" ){$uploaddest1="media/";}
 
 
		$file2="cardback";
		
$medianame2=basename( $_FILES["$file2"]["name"]);
$mediatemp2=$_FILES["$file2"]['tmp_name'];
$loc="../../";
  $uploaddir="media/profiles/agent/";
 $uploaddest2=$uploaddir.$medianame2;
//  compressImage($mediatemp2, $loc.$uploaddest2, 75);
 move_uploaded_file($mediatemp2,$loc.$uploaddest2);
 if($uploaddest2=="media/profiles/agent/" or $uploaddest2=="" ){$uploaddest2="media/";}
 



	$stmt =$conn14->prepare("INSERT INTO agent VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)") ;
$stmt->bind_param("ssssssssss", $userid, $name, $email, $phone, $ppic, $cardtype, $uploaddest1, $uploaddest2, $address, $status);
$status='pending';
$address=$_POST['address'];
$cardtype=$_POST['cardtype'];

if ( $stmt->execute()=== TRUE) {

    
$ale1 = "Your vendor request has been sumbmited and awaiting approval ";
echo " <script type='text/javascript'>alert('$ale1'); </script>";

}else{echo "An error occured please try again <br>";
echo($stmt->error);
}    


}


   $selr="SELECT * FROM agent where id='".$userid."'";
$result= $conn14->query($selr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
    $staaa=$row["status"];
    
}}else{
      echo'<script> alert("Upload a valid id card and address now to become an AGENT");</script>';
      echo'
      <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
html{display: none;}
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
body {font-family: Arial, Helvetica, sans-serif; }

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


</head>
<body>

<h3 id="myBtn">Upload a valid id card and address now to become an AGENT</h3>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
     <p>Update this infomation</p>
                     <form action="accomodiadashboard.php" method="post" enctype="multipart/form-data" class="product-uploader">

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
    <title>Accomodia dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/mynote.css">
    <link rel="stylesheet" href="css/menucss.css">
    <link rel="stylesheet" href="css/library.css">
    <link rel="stylesheet" href="css/studytools.css">
    <link rel="stylesheet" href="css/accomodiadashboard.css">
    <link rel="stylesheet" href="css/marketdashboard.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

   
 <script>function accapp(){
             var date= document.getElementById('apdate').value; 
             var time= document.getElementById('aptime').value;  
             var location= document.getElementById('aplocation').value;  
             var appid= document.getElementById('apid').value; 
         var userid= document.getElementById('agentid').value; 
                  var aname= document.getElementById('agentname').value;  

         var aimg= document.getElementById('agentimg').value;  

console.log(aimg);

    var xhttps= new XMLHttpRequest();
xhttps.onreadystatechange= function(){
	if(xhttps.readyState == 4 && xhttps.status == 200){
console.log(xhttps.status);
    	    console.log(xhttps.status);
    	   console.log(aimg);

    	    //  document.getElementById("inspect").innerHTML=xhttps.responseText;

}else{
    	    
}
};

xhttps.open("GET", "appointment.php?u="+userid+"&date="+date+"&time="+time+"&location="+location+"&appid="+appid+"&aname="+aname+"&aimg="+aimg+"&status=accepted", true);
xhttps.send();
      closeapp();     }
           </script>
           
           
 <script>function decapp(){   
     var appid= document.getElementById('apid').value; 
   var userid= document.getElementById('agentid').value;  

    var xhttps= new XMLHttpRequest();
xhttps.onreadystatechange= function(){
	if(xhttps.readyState == 4 && xhttps.status == 200){
	    
console.log(xhttps.status);
    	 
    	    //  document.getElementById("inspect").innerHTML=xhttps.responseText;

}else{
    	   

}
};

xhttps.open("GET", "appointment.php?u="+userid+"&appid="+appid+"&status=decline", true);
xhttps.send();

     closeapp();      }
           </script>
           
           
 <script>function closeapp(){
              document.getElementById('decline').style.display="none"; 
                            document.getElementById('accept').style.display="none"; 

              document.getElementById('black-bg').style.display="none";
                            document.getElementById('request-comfirmation-div-holder').style.display="none";

              
           }
           </script>
           
           
           
           <script>function declinereq(can){
                 document.getElementById('apid').value= can.id; 
        document.getElementById('agentid').value=can.name;  

              document.getElementById('decline').style.display="block";
            document.getElementById('black-bg').style.display="block";
             document.getElementById('request-comfirmation-div-holder').style.display="grid";
               document.getElementById('accept').style.display="none";

           }
           </script>
           
            <script>function acceptreq(can){
             document.getElementById('apid').value= can.id; 
        document.getElementById('agentid').value=can.name;  

                // console.log(can.name);
                
               document.getElementById('accept').style.display="block";
            document.getElementById('black-bg').style.display="block";
             document.getElementById('request-comfirmation-div-holder').style.display="grid";
               document.getElementById('decline').style.display="none";

                            
            }
           </script> 

</head>

<body>
    <button class="add-product-btn">
        <ion-icon name="add"></ion-icon>
    </button>

 
    <div class="request-comfirmation-div-holder" id="request-comfirmation-div-holder" >
        <div class="request-confirmation-div" id="accept">
            <form >
                <input type="text" id="aptime" id="" placeholder="Time">
                <input type="date" id="apdate" id="">
                <input type="text" id="aplocation" id="" placeholder="Location">
                <input type="hidden" id="apid" value="" />
                <input type="hidden" id="agentid" value=""  />
                <input type="hidden" id="agentname" value="<?php echo $name; ?>"  />
                <input type="hidden" id="agentimg" value="<?php echo $ppic; ?> "  />
                

                <div class="confirmation-functions">
                    <button class="blue-bg" id="confirm-1" onclick="accapp()" type="button" return false>Confirm</button>
                    <button class="orange-bg" id="decline-1" onclick="closeapp()" type="button" return false>Back</button>
                </div>
            </form>
        </div>

        <div class="request-confirmation-div" id="decline">
            <form action="">
                <p class="confirmation-message">Are you sure you want to decline this meeting, user will get notified
                    you declined their meeting request.</p>
                <div class="confirmation-functions">
                    <button class="blue-bg" id="confirm-1" onclick="decapp()" type="button" return false>Confirm</button>
                    <button class="orange-bg" id="decline-1" onclick="closeapp()" type="button" return false>Back</button>
                </div>
            </form>
        </div>
    </div>

    <div class="black-bg" id="black-bg">

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
                        <div class="icon-img"><img src="images/bag-img.png" alt="" ></div>
                        <p class="menu-list-title-sub-side">Study Tools</p>
                    </li>
                </a>
                <a href="coursereview.php?t=<?php echo$t; ?>">
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
                <a href="">
                    <li class="menu-item">
                        <div class="icon-img"><img src="images/market.png" alt=""></div>
                        <p class="menu-list-title-sub-side">Market</p>
                    </li>
                </a>
                <a href="setting.php?t=<?php echo$t; ?> ">
                    <li class="active-nav menu-item">
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
   $selr="SELECT * FROM product where userid='".$userid."'";
$result= $conn14->query($selr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
 $numberOfhouses=$result->num_rows; 
        
}}else{$numberOfhouses= '0';}

$selr="SELECT sum(tenantpaid) as total FROM tenants where userid='".$userid."'";
$result= $conn14->query($selr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
 $totalrecieved=  $row["total"]; 
        
}}else{$totalrecieved=0;}
 $selr="SELECT * FROM product where userid='".$userid."' and status='rent' ";
$result= $conn14->query($selr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
 $numberOffreehouses= $result->num_rows; 
        
}}else{$numberOffreehouses=0;}
  
   $selr="SELECT sum(price) as total FROM product where userid='".$userid."'";
$result= $conn14->query($selr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
 $priceOfhouses= $row["total"]; 
   
}}else{$priceOfhouses='0';}
    
    
 $selr="SELECT * FROM complaints where userid='".$userid."'";
$result= $conn14->query($selr);
 If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
 $numberOfcomplaints= $result->num_rows; 
        
}}else{$numberOfcomplaints='0';}



if(isset($_POST['upload'])) {
    
    	
include'uploadapi.php';


	$date=date("h:i:s A"). date("F j, Y");
$id="acl".rand();
	$price=$_POST['price'];
	$location=$_POST['location'];
		$about=$_POST['about'];
		$security=$_POST['security'];
		$distance=$_POST['distance'];
	
			$rating="4";
			$title=$_POST['title'];
				$wphone=$_POST['contact'];
				$status=$_POST['status'];
				$link="https://wa.me/".$wphone."?text=Hi,+I+am+intrested+in+your+Accomodia+house+Title:+".$title." ";
				$null="";
$views="0";
 
 
		$file="file";
		
$medianame1=basename( $_FILES["$file"]["name"][0]);
$mediatemp1=$_FILES["$file"]['tmp_name'][0];
  $uploaddir="../../media/accomodia/img/";
 $uploaddest1=$uploaddir.$medianame1;
 compressImage($mediatemp1, "../../media/accomodia/img/thumbnails/tn_".$medianame1, 60);
  move_uploaded_file($mediatemp1,$uploaddest1);
 $upl11= $uploaddest1;
 
 
 
	
		
$medianame1=basename( $_FILES["$file"]["name"][1]);
$mediatemp1=$_FILES["$file"]['tmp_name'][1];
  $uploaddir="../../media/accomodia/img/";
 $uploaddest1=$uploaddir.$medianame1;
 compressImage($mediatemp1, "../../media/accomodia/img/thumbnails/tn_".$medianame1, 60);
  move_uploaded_file($mediatemp1,$uploaddest1);
 $upl12= $uploaddest1;
	
 
 
	
		
$medianame1=basename( $_FILES["$file"]["name"][2]);
$mediatemp1=$_FILES["$file"]['tmp_name'][2];
  $uploaddir="../../media/accomodia/img/";
 $uploaddest1=$uploaddir.$medianame1;
 compressImage($mediatemp1, "../../media/accomodia/img/thumbnails/tn_".$medianame1, 60);
 move_uploaded_file($mediatemp1,$uploaddest1);
 $upl13= $uploaddest1;
 
	
		
$medianame1=basename( $_FILES["$file"]["name"][3]);
$mediatemp1=$_FILES["$file"]['tmp_name'][3];
  $uploaddir="../../media/accomodia/img/";
 $uploaddest1=$uploaddir.$medianame1;
 compressImage($mediatemp1, "../../media/accomodia/img/thumbnails/tn_".$medianame1, 60);
 move_uploaded_file($mediatemp1,$uploaddest1);
 $upl14= $uploaddest1;
 
 
 
		
		
$medianame1=basename( $_FILES["$file"]["name"][4]);
$mediatemp1=$_FILES["$file"]['tmp_name'][4];
  $uploaddir="../../media/accomodia/img/";
 $uploaddest1=$uploaddir.$medianame1;
 compressImage($mediatemp1, "../../media/accomodia/img/thumbnails/tn_".$medianame1, 60);
  move_uploaded_file($mediatemp1,$uploaddest1);
 $upl15= $uploaddest1;
 
 
	
		
$medianame1=basename( $_FILES["$file"]["name"][5]);
$mediatemp1=$_FILES["$file"]['tmp_name'][5];
  $uploaddir="../../media/accomodia/img/";
 $uploaddest1=$uploaddir.$medianame1;
 compressImage($mediatemp1, "../../media/accomodia/img/thumbnails/tn_".$medianame1, 60);
  move_uploaded_file($mediatemp1,$uploaddest1);
 $upl16= $uploaddest1;
 
 
 
		
		
 
	
if ($title==""){}else{
	    
	
	$oop="select * from product"; 
$conn14->query($oop);
	$sqd="INSERT INTO product VALUES ('$id', '$userid', '$title', '$price', '$location', '$about', '$security', '$distance', '$rating', '$upl11', '$upl12', '$upl13', '$upl14', '$upl15', ' $upl16', '$null', '$null', '$null', '$status', '0', '$wphone', '$link')";
	 if ($conn14->query($sqd)==false) {echo "Error: not uploaded ";
	  }else{echo'Uploaded Successfully';
	      
$ale1 = "Uploaded successfully";
echo "<script type='text/javascript'>alert('uploaded  successfully');</script>";

 Echo '<script type="text/Javascript">window.location.href ="https://dorm.com.ng/v2.5/app/accomodiadashboard.php";</script>';

	  }
	}


}
    
    
// $rselr="SELECT * FROM agent WHERE id='".$userid."' and  status='verified'";
// $result= $conn14->query($rselr);
//   If ($result->num_rows>0){
// While ($row=$result->fetch_assoc()){
    
  
// }}else{
//      header('Location: https://dorm.com.ng/v2.5/app/registrationpage.php');
// }
   
         ?>
         

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
        
            <div class="product-uploader-holder">
                <div class="product-uploader">
                    <span class="remove-product">
                        <button>Back</button>
                    </span>
                    <form action="" method="post"  enctype="multipart/form-data">
                    <div class="product-upload-card">
                        
                        <div class="add-image">
                            <p>
                                <ion-icon name="add"></ion-icon>
                            </p>
                            <input type="file" name="file[]"  id="gallery-photo-add" multiple required>
                        </div>


                        <div class="preview-holder" id='photos-preview'>
                            
                        </div>

                        <div class="prodcut-info-box-1">
                            
                             <input type="text" name="title" placeholder="title eg. one bed room" required>
                            
                            <input type="text" name="location" placeholder="location eg. Felele" required>
                            <input type="text" name="price" placeholder="price eg. 50000" required>
                            <input type="text" name="contact" placeholder="watsapp num eg. +2348151..." required>
                            <input type="text" name="about" placeholder="other information">
                            <div class="security-level-holder">
                                <p class="sub">Security level</p>
                                <select name="security" id="" required>
                                    <option value="High Level Risk">High Level Risk</option>
                                    <option value="Medium Level Risk">Medium Level Risk</option>
                                    <option value="Safe">Safe</option>
                                </select>

                                <div class="fload-area-check"><input type="checkbox" name="flood" id="flood-area-checker">
                                    <label for="flood-area-checker">Flood Area</label></div>
                            </div>
                             <div class="security-level-holder">
                                <p class="sub">Status</p>
                                <select name="status" id="" required>
                                    <option value="Rent">Rent</option>
                                    <option value="Roomate">Roomate</option>
                                    <option value="Sale">Sale</option>
                                </select>

                            </div>

                            <div class="security-level-holder">
                                <p class="sub">Walking distance from school</p>
                                <select name="distance" id="" required>
                                    <option value="Below 5 minutes">(Below 5 minutes) walk</option>  
                                    <option value="5 minutes  - 10 minutes">(5 minutes  - 10 minutes) walk</option>
                                    <option value="10 minutes - 15 minutes">(10 minutes - 15 minutes) walk</option>
                                    <option value="15 minutes - 20 minutes">(15 minutes - 20 minutes) walk</option>
                                    <option value="20 minutes - 25 minutes">(20 minutes - 25 minutes) walk</option>
                                    <option value="25 minutes - 30 minutes">(25 minutes - 30 minutes) walk</option>
                                    <option value="35 minutes - 40 minutes">(35 minutes - 40 minutes) walk</option>
                                    <option value="45 minutes - 50 minutes">(45 minutes - 50 minutes) walk</option>
                                    <option value="55 minutes - 60 minutes">(55 minutes - 60 minutes) walk</option>
                                    <option value="60 minutes - Above">(60 minutes - Above) walk </option>
                                </select>
                            </div>
                        </div>
                        <div class="product-upload-btn-holder">
                            <button name="upload">
                                <ion-icon name="upload"></ion-icon> Upload product
                            </button>
                           
                        </div>
                    </div></form>
                </div>
            </div>
            <div class="page-content">
            <div class="dark-bg"></div>

            <div class="accomodia-dashboard">
                <div class="accomodia-maindashboard">
                    <div class="accomodia-maindashboard-card">
                        <i class='bx bxs-building-house'></i>
                        <div>
                            <h3 class="main-text"><?php echo 'N'.$priceOfhouses; ?></h3>
                            <p class="sub-text">Total Value of assets yearly</p>
                        </div>
                    </div>

                    <div class="accomodia-maindashboard-card">
                        <i class='bx bxs-building-house'></i>
                        <div>
                            <h3 class="main-text"><?php echo $numberOfhouses.' house(s)'; ?></h3>
                            <p class="sub-text">Total number of houses</p>
                        </div>
                    </div>

                   

                    <div class="accomodia-maindashboard-card orange-bg">
                        <i class='bx bx-money-withdraw'></i>
                        <div>
                            <h3 class="main-text"><?php echo 'N'.$totalrecieved; ?></h3>
                            <p class="sub-text">Total amount recieved this year</p>
                        </div>
                    </div>

                    <div class="accomodia-maindashboard-card orange-bg">
                        <i class='bx bxs-hourglass'></i>
                        <div>
                            <h3 class="main-text"><?php echo $numberOfcomplaints; ?></h3>
                            <p class="sub-text">pending complains</p>
                        </div>
                    </div>

                    <div class="accomodia-maindashboard-card">
                        <i class='bx bxs-building-house'></i>
                        <div>
                            <h3 class="main-text"><?php echo  $numberOffreehouses.' house(s)'; ?></h3>
                            <p class="sub-text">Total number of free houses</p>
                        </div>
                    </div>

                </div>
                
                
                
                <!--main-->
                <div class="accomodiadashboard-card-holder">
           <h3>Pending Appointment Request(s)</h3>
                            <div class="request-inspect-div">
                                  <div class="request-card-holder">

       <?php include'../connect.php';        
       
       
    $selr="SELECT * FROM inspect where agentid='".$userid."' and status='processing'";
$result= $conn14->query($selr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
             
                 echo'               
                                    <div class="request-card">
                                        <div class="circle-image">
                                            <img src="../../'.$row["buyerimage"].'" alt="custumer ppic">
                                        </div>
                                        <div class="reqest-info">
                                            <p class="request-user-user-name">'.$row["buyername"].'</p>
                                            <div class="request-function">
                                                <button class="blue-bg"  onclick="acceptreq(this)" id="'.$row["meetingid"].'" name="'.$row["agentid"].'">Accept</button>
                                                <button class="orange-bg" id="'.$row["meetingid"].'"  name="'.$row["agentid"].'" onclick="declinereq(this)">Decline</button>
                                            </div>
                                        </div></div>
                                   ';
                                    
}}
?>
    
                                </div>
                            </div>

<!--Display products         -->
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
       <?php include'../connect.php';        
       
       
    $selr="SELECT * FROM product where userid='".$userid."'";
$result= $conn14->query($selr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
 
$productid=$row["productid"];$userid=$row["userid"]; $name=$row["name"]; $price=$row["price"]; $about=$row["about"];
$pic1=$row["pic1"];if($pic1=="../../../media/accomodia/img/"){$pic1="../../../media/placeholder.png";} 
$pic2=$row["pic2"];if($pic2=="../../../media/accomodia/img/"){$pic2="../../../media/placeholder.png";}
$pic3=$row["pic3"]; if($pic3=="../../../media/accomodia/img/"){$pic3="../../../media/placeholder.png";}
$pic4=$row["pic4"]; if($pic4=="../../../media/accomodia/img/"){$pic4="../../../media/placeholder.png";}
$pic5=$row["pic5"]; if($pic5=="../../../media/accomodia/img/"){$pic5="../../../media/placeholder.png";}
$pic6=$row["pic6"]; if($pic6=="../../../media/accomodia/img/"){$pic6="../../../media/placeholder.png";}
$vid1=$row["vid1"]; $vid2=$row["vid2"]; $vid3=$row["vid3"]; $vid4=$row["vid4"];
$vid5=$row["vid5"]; $vid6=$row["vid6"]; $messageid=$row["messageid"];
$status=$row["status"]; $views=$row["views"]; $contact=$row["contact"]; $link=$row["link"];$location=$row["location"];

               echo' 
                    <div class="accomodiadashboard-card">
                        <div class="accomodiadashboard-card-image">
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"> <img src=" '.$pic1 .'" alt=""></div>
                                    <div class="swiper-slide"> <img src="'.$pic2 .'" alt=""></div>
                                    <div class="swiper-slide"> <img src="'.$pic3 .'" alt=""></div>
                                    <div class="swiper-slide"> <img src="'.$pic4 .'" alt=""></div>
                                    <div class="swiper-slide"> <img src="'.$pic5 .'" alt=""></div>
                                   
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                        <div class="accomodiadashboard-card-data">
                            <h3>ID: <span class="houseid">'.$productid.'</span></h3>
                            <p class="location-of-house">'. $location.'</p>

                            <div class="sub-info-of-house">
                                <div>
                                    <p class="status"><span class="label">Status</span>:<span
                                            class="house-statuse free">'.$status      .'
                                            </span></p>
                                    <p class="status"><span class="label">Tentant</span>:
                                        </div>  </div>
                    </div>
                    
                    </div>';
// $selr="SELECT * FROM tenants where productid='".$productid."'";
// $result= $conn14->query($selr);
//   If ($result->num_rows>0){
// While ($row=$result->fetch_assoc()){
//   $tenantid=$row["userid"]; $productid=$row["productid"];$tenantname=$row["tenantname"];$tenantstart=$row["tenantstart"]; $tenantend=$row["tenantend"];$tenantduration=$row["duration"];$tenantpaid=$row["tenantpaid"];
// echo'<span class="tenant-name">
//                                           '.$tenantname.'</span></p>
//                                     <p class="status"><span class="label">Rent duration</span>:<span
//                                             class="tenant-name"> '. $tenantstart.'-'.$tenantend.'<span class="orange">'. $tenantduration.'(1
//                                                 year)</span></span></p>
//                                     <p class="status"><span class="label">Rent expiration:</span><span
//                                             class="tenant-name"> '. $tenantend .' <span class="orange">(21days
//                                                 left)</span></span></p>
//                                 </div>
//                                 <div>';}}
//                                   echo' <p class="status">RENT:<span class="rent-price"></span>'.$price .'</p>
//                                 </div>
//                             </div>';

//  $selr="SELECT * FROM complaints where productid='".$productid."'";
// $result= $conn14->query($selr);
//   If ($result->num_rows>0){
// While ($row=$result->fetch_assoc()){
//     $agentid=$row["agentid"];$complainid=$row["complainid"];$userid=$row["userid"]; $productid=$row["productid"];$message=$row["message"];$date=$row["date"];
//     echo'
// <div class="complain-div">
//                                 <h4>Complaints:</h4>

//                                 <p class="complain">
//                                   '.$message.'
//                                 </p>
  
//                                 <div class="reply">
//                                   <form action="" method="">  <input type="text" name="message" id="" placeholder="Reply tenant complain...">
//                                     <button name="send">Send</button></form>
//                                 </div>
//                             </div>

// ';                          
// }}else{echo'<br>no complains on this product yet<br>';}

}}else{echo'no product in your dashboard';}
echo'';
?>           

                </div>
            </div>

        </div>
        <div class="page-side">
            <div class="blue-area-2">
                <p class="heading-text">Setting</p>

                <div class="bottom-side-list">
                    <ul class="smaller">
                        <a href="profile.php?t=<?php echo$t; ?> ">
                            <li class="menu-item">
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
                        <a href="accomodiadashboard.php?t=<?php echo$t; ?> ">
                            <li class="menu-item    active-tool-icon">
                                <div class="icon-img-small-icon">
                                    <ion-icon name="speedometer"></ion-icon>
                                </div>
                                <p class="menu-list-title-sub-side-1">Accomodia dashboard</p>
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
                label: 'PROFIT MADE IN NAIRA',
                data: [65, 59, 80, 81, 56, 55, 40],
                backgroundColor: [
                    '#f96b03',
                    '#0688d3',
                    '#f96b03',
                    '#0688d3',
                    '#f96b03',
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
            $(".bot-container-2").fadeOut("fast");
        });

        $(".bi-bell-fill").click(function () {
            $(".notification").fadeToggle('fast');
        });


        $(".product-uploader-holder").fadeOut('fast');
        $(".dark-bg").fadeOut('fast');
     $(".remove-product").click(function () {
            $(".product-uploader-holder").hide('fast');
            $(".dark-bg").fadeOut('fast');
            $(".dark-bg").hide('fast');
        });


        $(".add-product-btn").click(function () {
            $(".product-uploader-holder").toggle('fast');
            $(".dark-bg").fadeIn('fast');
            $(".dark-bg").show('fast');
        });
    </script>

    <script src="js/swiper.js"></script>

    <!-- Initialize Swiper -->
    <!--<script>-->
    <!--    var swiper = new Swiper(".mySwiper", {-->
    <!--        navigation: {-->
    <!--            nextEl: ".swiper-button-next",-->
    <!--            prevEl: ".swiper-button-prev",-->
    <!--        },-->
    <!--    });-->


    <!--    $(".request-comfirmation-div-holder").fadeOut('fast');-->
    <!--    $(".black-bg").fadeOut('fast');-->
    <!--    $(".request-confirmation-div").fadeOut('fast');-->
    <!--    $("#accept").fadeOut('fast');-->
    <!--    $("#decline").fadeOut('fast');-->
    <!--    $("#accept-1").click(function () {-->
    <!--        $(".request-comfirmation-div-holder").fadeIn('fast');-->
    <!--        $(".black-bg").fadeIn('fast');-->
    <!--        $("#accept").fadeIn('fast');-->
    <!--    });-->


    <!--    $("#reject-1").click(function () {-->
    <!--        $(".request-comfirmation-div-holder").fadeIn('fast');-->
    <!--        $(".black-bg").fadeIn('fast');-->
    <!--        $("#decline").fadeIn('fast');-->
    <!--    });-->


    <!--    $("#confirm-1").click(function () {-->
    <!--        $(".request-comfirmation-div-holder").fadeOut('fast');-->
    <!--        $(".black-bg").fadeOut('fast');-->
    <!--    });-->


    <!--    $("#decline-1").click(function () {-->
    <!--        $(".request-comfirmation-div-holder").fadeOut('fast');-->
    <!--        $(".black-bg").fadeOut('fast');-->
    <!--    });-->
    <!--</script>-->
</body>

</html>