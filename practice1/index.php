<?php
$conn = mysqli_connect('localhost', 'root', 'alswo123');
mysqli_select_db($conn, 'xalswox');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"
</head>
<body>
    <header>
        <h1>생활코딩 JavaScript</h1>
    </header>
    <nav>
        <ol>
        <?php
        $sql = "SELECT * FROM 'topic'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            echo '<li><a href="/index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
        }
        ?>
        </ol>
    </nav>
    <article>
        <?php
        $id= $_GET['id'];
        $sql = "SELECT * FROM topic WHERE id = ".$id;
        $sql = "SELECT topic.id, topic.title, topic.description, user.name, topic.created FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id =".$id;
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <h2><?=htmlspecialchars($row['title'])?></h2>
        <div><?=htmlspecialchars($row['created'])?>|<?=htmlspecialchars($row['name'])?></div>
        <div><?=htmlspecialchars($row['description'])?></div>
    </article>
</body>
</html>