<?php
require_once('..\models/UserModel.php');
// If you are not logged, redirects to login page.
$session = new USER();
 $auth_user = new USER();
 if(isset($_SESSION['user_session'])){
 $user_id=$_SESSION['user_session'];
 }else{
     $user_id=null;
 }
  
 $stmt = $auth_user->runQuery("SELECT * FROM utilisateurs WHERE userId=:user_id");
 $stmt->execute(array(":user_id"=>$user_id));  
 $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html>
<?php include('header.php') ?>

<!--discover our story-->
<?php
include('aboutUs.php')
?>
<!--end of discover our story-->
<!--taseteful recepies-->
<?php
include('spices.php')
?>
<!--end of tasteful recepies-->
<!--culinary delight-->
<?php
include('beans.php')
?>
<!--end of culinary delight-->
<?php include('footer.php') ?>

</html>