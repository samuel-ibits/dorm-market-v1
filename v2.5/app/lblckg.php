<?php include '../connect.php';
$time=date("h:i:s A");
$date=date("l jS \of F Y");



$u=$_REQUEST['u'];
 $userid=$_REQUEST['a'];
$username=$_REQUEST['b'];
 
 
  //check for a rating
 
$rselr="SELECT * FROM ".$u." WHERE id='".$userid."'";
$result= $conn5->query($rselr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
  $lcolor=$row["color"];
  
  
 //otherwise update the rating
 
$upd="UPDATE ".$u." SET color='liked' where id='".$userid."'";
    mysqli_query($conn5,$upd);
        if ($conn5->query($upd) === TRUE) {}else {}
  
 
  
  
  
  
  }}else{
      //if it dosent exist at all creat one
$iin = "INSERT INTO ".$u." VALUES ('$userid','liked','tagname','$date','$time','$username','$userid','nocomment','notitle')";
if ($conn5->query($iin)==true) { }

      
  }
  
	
 
		$l="steelblue";$m="liked";$n="";
$suql = "SELECT * FROM ".$u." WHERE color like '%{$l}%' OR color like '%{$m}%' OR color like '%{$n}%'"; 
 $connStatus = $conn5->query($suql); 
 $numberOfRows= mysqli_num_rows($connStatus); 
 if($numberOfRows==""){$numberOfRows="0";}
  echo $numberOfRow= $numberOfRows; 
  
?>
