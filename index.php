<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
$result = mysqli_query($conn, "SELECT * FROM topic");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/style.css">
</head>
<body id="target">
    <div class="container-fluid">
    <header class="jumbotron text-center">
        <img src="https://s3.ap-northeast-2.amazonaws.com/opentutorials-user-file/course/94.png" alt="생활코딩" class="img-circle" id="logo">
        <h1><a href="/index.php">JavaScript</a></h1>
    </header>
    <div class="row">
    <nav class="col-md-3">
        <ol class="nav nav-pills nav-stacked">
        <?php
        while($row = mysqli_fetch_assoc($result)){
            echo '<li><a href="/index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
        }
        ?>
        </ol>
    </nav>
    <div class="col-md-9">
        <article>
            <?php
    if(empty($_GET['id']) == false) {
        $sql = 'SELECT * FROM topic WHERE id = '.$_GET['id'];
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
        echo strip_tags($row['discription'], '<a><h1><h2><h3><h4><h5><ul><ol><li>');
    }
    ?>
    </article>
    <div id="control">
        <div class="btn-group" role="group" aria-label="...">
            <input type="button" value="white" onclick="document.getElementById('target').className='white'" class="btn btn-default"/>
            <input type="button" value="black" onclick="document.getElementById('target').className='black'" class="btn btn-default"/>
        </div>
        <a href="/write.php" class="btn btn-success">쓰기</a>
    </div>
    </div>
    </div>
    </div>
    <!-- jQuery necessary for Bootstrap's JavaScript plugins -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins below, or include individual files as needed -->
    <script src="/bootstrap-3.3.4-dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>