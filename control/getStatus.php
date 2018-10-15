<?php include "function.php";
function getStatus($id){
 $sql = "SELECT `status` FROM `user` WHERE `id`='$id'";
 $result=_db($sql);
 $data=mysqli_fetch_row($result);
 echo $data['0'];
}
?>