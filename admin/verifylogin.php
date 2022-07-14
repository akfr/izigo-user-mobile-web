<?php
// $un = $_POST['username'];
$pwd = $_POST['mot_de_passe'];

include 'includes/connection.php';

$sql = "SELECT * FROM administrateur WHERE mot_de_passe='$pwd'";
$result =mysqli_query($con,$sql);

$num = mysqli_num_rows($result);

if($num==1)
{
  session_start();
  $_SESSION['pwd'] = $pwd;
  header('location:index.php');
}
else
{
  session_start();
  $_SESSION['msg'] = '<h2>Mot de passe invalide!</h2>';
  header('location:login.php');
}
?>
