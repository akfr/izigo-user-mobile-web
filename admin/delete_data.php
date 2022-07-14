<?php
$id = $_GET['delID'];

include('includes/connection.php');

$sql = "DELETE FROM message WHERE id_message=$id";
if(mysqli_query($con,$sql))
{
	header('location:message.php');
}
else
{
	die('Could not delete record:' .mysql_error());
}
?>
