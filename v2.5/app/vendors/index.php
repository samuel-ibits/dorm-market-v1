<?php include '../../connect.php';



session_start();


  

echo'<script src="https://apis.google.com/js/platform.js" async defer></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-4345VDM59J"></script>';
echo"<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
 gtag('config', 'G-4345VDM59J');
</script>";
echo'
  <link rel="stylesheet" href="/v2/dm/css/toast.css">
     <link rel="stylesheet" href="/v2/dm/js/toast.js">
  ';   


function generatetoken($userid){
	    include'../../connect.php';
		$time= date("Y-m-d h:i:sa");
	
		//create the  random token with md5
	$token=substr(md5(time()), 0, 20);
	
	// store in db for  future validation
	$sqllp = "INSERT INTO tokenizer (id, userid, timestampp)VALUES ('$token', '$userid', '$time')";
	
	If ($conn19->query($sqllp) == TRUE) {
	
	 setcookie("dormtoken", $token, time() + (86400 * 30));
	return $token;
	}
	}
	

function listener($f){
include("../../connect.php");
$_SESSION['dormuserid']="$f";

    
   	$date= date("Y-m-d h:i:sa");
 $iiin = "INSERT INTO login (id, userid, date, page) VALUES ( '', '$f', '$date', 'marketlogin username')";
if ($conn17->query($iiin)==true) {
  
}else{echo $conn17->error;}
}




// if(isset($_POST["updatebtn"])){
//           include('api/texterapi.php');  
//           include('api/emailapi.php');  

//   $toid=$_SESSION['dormuserid'];


// $selry="SELECT * FROM profile WHERE Id='".$toid."'";
// $result= $conn6->query($selry);
//   If ($result->num_rows>0){
// While ($row=$result->fetch_assoc()){
 
// $phone= $row["phone"];
// $uname= $row["uname"];
// $email= $row["email"];

//  echo" <script> alert('Thank you! An sms and email has been sent to you containing the download link');
// </script>"; 

// $message="Hi".$uname.", Click this link to download the upgraded dorm app https://www.dorm.com.ng/landing/update.html";
// $topic="Dorm";
// texterapi($topic, $phone, $message);
// emailapi($uname, $email, $message, $topic);

// echo'
//  <script> window.location.href ="https://dorm.com.ng/v2.5/app/studytools.php"; </script>
// ';
   
//   }}
//   }






if(isset($_POST['login'])) { 
    $u=$_POST['phone'];
$p=$_POST['pass'];

    	$selr="SELECT * FROM users WHERE phone like '%{$u}%'";
$result= $conn->query($selr);
If ($result->num_rows>0){  
While ($row=$result->fetch_assoc()){
	
	
	$t= $row["phone"];

	
}}else{
    $selr="SELECT * FROM users WHERE uname like '%{$u}%'";
$result= $conn->query($selr);
If ($result->num_rows>0){  
While ($row=$result->fetch_assoc()){
	
	
	$t= $row["phone"];

	
}}
    
}
$toid='a'.$t.$p;


$sel= "SELECT * FROM users WHERE id='".$toid."'";
$result= $conn->query($sel);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){

  

$userid=$row["userid"];
$phone= $row["phone"];
$uname= $row["uname"];
$password= $row["password"];
$tokid='a'.$phone.$password;
$tokid2='a'.$uname.$password;	
If($toid==$tokid or $toid==$tokid2){
    $f=$userid;

listener($f); 


$tokensess= generatetoken($f);

echo "<script type='text/javascript'>alert('Logged in successfully');</script>";


	$_SESSION['dormuserid']="$f";
	
//  header('Location: https://dorm.com.ng/v2.5/app/marketdashboard.php?t='.$tokensess);
echo'
 <script> window.location.href ="https://dorm.com.ng/v2.5/app/marketdashboard.php?t='.$tokensess.'"; </script>
';

}else{
$ale2 = "Login failed. Check phone-number or password";
echo "<script type='text/javascript'>alert('$ale2'); </script>".$ale2;


}
 

 
}}else {
echo"<style>
div {
  margin-bottom: 15px;
  padding: 4px 12px;
}

.danger {
  background-color: #ffdddd;
  border-left: 6px solid #f44336;
}
</style>";
echo' <div class="danger">  <p><strong>Sorry, an error occured while trying to login.<br> Problems may include: <br>Bad network connection:<br> check your network connection and try again.<br>Invalid password or phone Number:<br> check your password or phone number and try again<br>Please note password is case sensitive<br>
</p>
</div>';
 
 
}
 

}




if(isset($_POST['signup'])) { 


 $email=$_POST['email'];

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$fulname=$fname." ". $lname;
$phon=$_POST['phone'];
$ch=strlen($phon);
$chh=is_numeric($phon);
if($ch<11 OR $ch>11 OR $chh!=1 ){$err=" Invalid phone-number";
}else{$phone=$phon;$err="";} 
$uname=$_POST['uname'];
$pas=$_POST['pass'];
$repass=$_POST['repass'];
if ($pas==$repass AND $err==""){$pass=$_POST['pass'];	$err2="";
$pockid='pocket'.rand();
$userid='user'.rand();
$tokenid= 'a'.$phone.$pass;
 $date= date("Y-m-d h:i:sa");

$ins="INSERT INTO users (id, fname, lname, uname, password, phone, userid, email) VALUES ('$tokenid', '$fname', '$lname', '$uname', '$pass', '$phone', '$userid', '$email')";
 
}else{
	$err2="Passwords does not match";
}if ($conn->query($ins)===TRUE) {
    $sqdd="INSERT INTO profile (Id, ppic, name, username, phone, sta, date, mcred, course, school, email, descyour, year, pocketid, howsch, descou, dessch, dob, bescou, besstudtm, rescrush, irep, enjdoing, favfood, ihate, icherish) VALUES ('$userid', 'media/', '$fname', '$uname', '$phone', '1', '$date', '5', '', '', '$email', '' , '', '', '', '', '', '', '', '', '', '', '', '', '', '')";
if ($conn6->query($sqdd)===TRUE) {}else{}

$sqdl="CREATE TABLE ".$userid." (id VARCHAR(30) NOT NULL PRIMARY KEY, shown TEXT NOT NULL, prefer TEXT NOT NULL, average TEXT NOT NULL)";
if ($conn9->query($sqdl)===TRUE) {}else{}

    echo "New Account Created";
$ale1 = "Account created success";

	$file="filefront";
		
$medianame1=basename( $_FILES["$file"]["name"]);
$mediatemp1=$_FILES["$file"]['tmp_name'];
$loc="../../../";
  $uploaddir="media/profiles/vendor/";
 $uploaddest1=$uploaddir.$medianame1;
 if($uploaddest1=="media/profiles/"){$uploaddest1=$pic;}
 move_uploaded_file($mediatemp1,$loc.$uploaddest1);
 if($uploaddest1=="media/profiles/vendor/" or $uploaddest1=="" ){$uploaddest1="media/";}
 
 
		$file="fileback";
		
$medianame2=basename( $_FILES["$file"]["name"]);
$mediatemp2=$_FILES["$file"]['tmp_name'];
$loc="../../../";
  $uploaddir="media/profiles/vendor/";
 $uploaddest2=$uploaddir.$medianame2;
 if($uploaddest2=="media/profiles/"){$uploaddest2=$pic;}
 move_uploaded_file($mediatemp2,$loc.$uploaddest2);
 if($uploaddest2=="media/profiles/vendor/" or $uploaddest2=="" ){$uploaddest2="media/";}
 



	$stmt =$conn20->prepare("INSERT INTO agent VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)") ;
$stmt->bind_param("ssssssssss", $userid, $fulname, $email, $phone, $ppic, $cardtype, $uploaddest1, $uploaddest2, $address, $status);
$status='pending';
$address=$_POST['address'];
$cardtype=$_POST['cardtype'];
$filefront=$_POST['filefront'];
$fileback=$_POST['fileback'];
$ppic='media/';
if ( $stmt->execute()=== TRUE) {

    
$ale1 = "Your vendor request has been sumbmited, Please login and proceed to payment ";
echo " <script type='text/javascript'>alert('$ale1'); </script>";

}else{echo "An error occured please try again <br>";
echo($stmt->error);
}    




echo " <script type='text/javascript'>alert('$ale1'); </script>".$ale1;
 $prof="block";$regdis="none";
 
 $rselr="SELECT * FROM users WHERE id='".$tokenid."'";
$result= $conn->query($rselr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
    $f=$userid;
     setcookie("dormtoken", $f, time() + (86400 * 30));
}}

} else {
    if($err==""){
        if($err2==""){
$ale2 = "Error:  Account not created phone-number has already been used before If this is your number contact us on facebook @ m.me/dorm.com.ng";
echo "<script type='text/javascript'>alert('$ale2'); </script>".$ale2;
$prof="none"; $regdis="block";
    echo 'Error:   Account not created phone-number has already been used before If this is your number <a href="info@dorm.com.ng">send us a message now</a> <br>';
    
}else{$ale2 = "Error: Passwords does not match.Check passwords and try again";
        echo "<script type='text/javascript'>alert('$ale2'); </script>".$ale2;
$prof="none"; $regdis="block";
    }
    
}
    
else{$ale2 = "Error: You have entered an invalid phone number.Check your phone number and try again";
echo "<script type='text/javascript'>alert('$ale2'); </script>".$ale2;
$prof="none"; $regdis="block";
    }



}
}else{$err="";$err2="";$prof="none";$regdis="block";$userid="";$fulname="";$uname="";$phone="";$pockid="";}




?>

<a href="index.html"><center><button>Go back</button></center></a>
