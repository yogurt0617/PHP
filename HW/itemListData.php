<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>SDGs</title>
    <link rel="stylesheet" href="css/nav.css" media="all">
    <link rel="stylesheet" href="css/itemList.css" media="all">
    <link rel="stylesheet" href="css/HandF.css">
</head>
<body>

        <div id="wrap">
            <header id="header" class="clearheader">
            <?php   include "nav.html"; ?>
            </header>


<main>
    <h2>永續發展目標 SDGs(從資料庫讀取)</h2>
    <h3><a href="itemList.php">自己建立的點這</a></h3>
    <?php
        function printItem($img, $title, $detail){
        echo '<div class="item">';
        echo '<img src="img/'.$img.'" alt="">' ;
        echo '<h3 style="font-size:20px;">' . $title . '</h3>';
        echo '<p style="font-size:15px;">' . $detail . '</p>';
        echo '</div>';
    }
    require_once("../SQL/DB_open.php");
    $sql = "SELECT * FROM sdgs";
    $result = mysqli_query($link,$sql);

    while ($rows=mysqli_fetch_array($result,MYSQLI_NUM)){
        $m = $rows[1];
        $t = $rows[2];
        $d = $rows[3];
        printItem($m,$t,$d);
    }

    mysqli_free_result($result);
    require_once("../SQL/DB_close.php");

    ?>
</main>
</div>
    <footer>
        <?php   include "infoFoot.html"; ?>
    </footer>
</body>
</html>
