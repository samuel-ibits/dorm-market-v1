<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="theme-color" content="#1597E2">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="shortcut icon" href="images/dorm_icon.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/accomodiaregistrationpage.css">


</head>

<body>
    <div class="accomodia-reg-page-holder">


        <div class="accomodia-reg-container">
            <div>

                <h3>Upload valid ID card</h3>
<form method="post" action=""  enctype="multipart/form-data">
                <div class="type-of-card">
                    <select name="cardtype" id="">
                        <option value="NIN">NIN</option>
                        <option value="Drivers licence">Drivers licence</option>
                        <option value="Voter card">Voter card</option>
                    </select>
                </div>

               

                <div class="location-input">
                    <input type="text"  name="address" placeholder="Address">
                </div>
                <div class="id-card-holder">
                    <div>
                        <div class="file-upload-inner">
                            <input type="file" name="filefront" id="">
                        </div>

                        <span class="add">
                            <ion-icon name="add-circle"></ion-icon>
                            <p>Front of card</p>
                        </span>
                    </div>
                    <div>
                        <div class="file-upload-inner">
                            <input type="file" name="fileback" id="">
                        </div>

                        <span class="add">
                            <ion-icon name="add-circle"></ion-icon>
                            <p>Back of card</p>
                        </span>
                    </div>
                </div>

            <div class="submit-btn">
                <button name="submit">Submit</button>
                
                </form>
            </div>
            </div>
        </div>

    </div>
</body>

</html>


 <?php include'../../api/token.php';
$t=$_GET['t'];
$userid=validatetoken($t);
if($userid=='null'){
 header('Location: https://dorm.com.ng/v2.5/app');
}
?>

<?php include '../connect.php';


$selry="SELECT * FROM profile WHERE Id='".$userid."'";
$result= $conn6->query($selry);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
 
  
$userid= $row["Id"];
$phone= $row["phone"];
$uname= $row["uname"];
$name= $row["name"];
$email= $row["email"];

}}
		$file="filefront";
		
$medianame1=basename( $_FILES["$file"]["name"]);
$mediatemp1=$_FILES["$file"]['tmp_name'];
$loc="../../";
  $uploaddir="media/profiles/agent/";
 $uploaddest1=$uploaddir.$medianame1;
 if($uploaddest1=="media/profiles/"){$uploaddest1=$pic;}
 move_uploaded_file($mediatemp1,$loc.$uploaddest1);
 if($uploaddest1=="media/profiles/agent/" or $uploaddest1=="" ){$uploaddest1="media/";}
 
 
		$file="fileback";
		
$medianame2=basename( $_FILES["$file"]["name"]);
$mediatemp2=$_FILES["$file"]['tmp_name'];
$loc="../../";
  $uploaddir="media/profiles/agent/";
 $uploaddest2=$uploaddir.$medianame2;
 if($uploaddest2=="media/profiles/"){$uploaddest2=$pic;}
 move_uploaded_file($mediatemp2,$loc.$uploaddest2);
 if($uploaddest2=="media/profiles/agent/" or $uploaddest2=="" ){$uploaddest2="media/";}
 



	$stmt =$conn14->prepare("INSERT INTO agent VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)") ;
$stmt->bind_param("ssssssssss", $userid, $name, $email, $phone, $ppic, $cardype, $uploaddest1, $uploaddest2, $address, $status);
$status='pending';
$address=$_POST['address'];
$cardtype=$_POST['cardtype'];
$filefront=$_POST['filefront'];
$fileback=$_POST['fileback'];

if ( $stmt->execute()=== TRUE) {

    
$ale1 = "Agent request has been sumbmited we will send you a mail after verification";
echo " <script type='text/javascript'>alert('$ale1'); </script>";

}else{echo "An error occured please try again <br>";
echo($stmt->error);
    
}

?>