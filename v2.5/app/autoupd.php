 <?php include'../connect.php';
function(){
$array=[];

$rselr="SELECT * FROM profile";
$result= $conn6->query($rselr);
  If ($result->num_rows>0){
While ($row=$result->fetch_array()){
    $array[]=$row["Id"];
    
  }}
    
   foreach ($array as $value) {
       $str=rand();
$result = md5($str);
       $pocket="pocket".$result;
       
  $upd="UPDATE profile SET pocketid ='".$pocket."' where Id='".$value."'";
    mysqli_query($conn6,$upd);
        if ($conn6->query($upd) === TRUE) {$ale2 = "PROFILE UPDATED";
echo "<script type='text/javascript'>alert('$ale2'); </script>";
}else{echo $conn6->error;}
}     
    
}
         ?>