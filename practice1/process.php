<?php
// 데이터베이스 접속
require_once('conn.php');
// 저자가 user 테이블에 존재하는지 여부를 체크
$author = mysqli_real_escape_string($conn, $_POST['author']);
$sql = "SELECT * FROM `user` WHERE `name` = '{$author}'";
$result = mysqli_query($conn, $sql);
if($result->num_rows > 0){
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['id'];
    var_dump($row['id']);
} else {
    $sql = "INSERT INTO user(`id`, `name`, `password`) VALUES(NULL, '{$author}', '');";
    $result = mysqli_query($conn, $sql);
    $user_id = mysqli_insert_id($conn);
}
//제목, 저자, 본문 등을 topic 테이블에 추가
$title = mysqli_real_escape_string($conn, $_POST['title']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$sql = "INSERT INTO `topic` 
(`id`, `title`, `description`, `author`, `created`) VALUES (NULL, '{$title}', '{$description}', '{$user_id}', now());";
mysqli_query($conn, $sql);
header('Location: index.php');
// 존재하지 않는다면 저자를 user에 추가 후 id를 알아낸다.

?>