<?php include'../connect.php';


 $id=$_REQUEST['u'];
 $date=$_REQUEST['date'];
 $time=$_REQUEST['time'];
 $location=$_REQUEST['location'];
 $appid=$_REQUEST['appid'];
  $status=$_REQUEST['status'];
    // $aname=$_REQUEST['aname'];
    //   $aimg=$_REQUEST['aimg'];
      
      
$rselr="SELECT * FROM profile WHERE Id='".$id."'";
$result= $conn6->query($rselr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
    $aname=$row["name"];
  $pic=$row["ppic"];
  $userschool=$row["school"];
  
  $usercourse=$row["course"];
  
  $username=$row["username"];
  
  
  
  $ppic=$row["ppic"];
  if($ppic=="media/"){$ppic="media/ppic/pro.png";
  }else{ $ppic=$row["ppic"];}
  
  
}}
$aimg= $ppic;

if ($status == "accepted"){
    
    	$stmt =$conn14->prepare("Update inspect SET status=?, date=?, time=?, location=?, agentname=?, agentimage=?  WHERE meetingid=?") ;
$stmt->bind_param("sssssss", $status, $date, $time, $location, $aname, $aimg, $appid);

if ( $stmt->execute()=== TRUE) {

}else{echo "An error occured please try again <br>";
echo($stmt->error);
}
}

if ($status == "decline"){
    
    	$stmt =$conn14->prepare("Update inspect SET status=?  WHERE meetingid=?") ;
$stmt->bind_param("ss", $status, $appid);

if ( $stmt->execute()=== TRUE) {

}else{echo "An error occured please try again <br>";
echo($stmt->error);
}
}
    ?>