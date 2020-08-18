<html>
<?php
session_start();
if($_SESSION['id'])
{

unset($_SESSION['id']);
header("Location:frames.php");
}
?>

</html>