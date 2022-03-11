<?php
$conn = mysqli_connect("localhost", "root", "alswo123");
mysqli_select_db($conn, "opentutorials");
$sql = "INSERT INTO topic (title,discription,author,created) VALUES('".$_POST['title']."', '".$_POST['discription']."', '".$_POST['author']."', now())";
$result = mysqli_query($conn, $sql);
header('Location: http://localhost/index.php');
?>