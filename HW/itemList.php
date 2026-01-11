<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDGs</title>
    <link rel="stylesheet" href="css/nav.css" media="all">
    <link rel="stylesheet" href="css/itemList.css" media="all">
    <link rel="stylesheet" href="css/HandF.css">
    <?php
    function printItem($image,$title,$detail){
        echo "<div class='item'>";
        echo "<img src='img/".$image."' alt=' '>";
        echo "<h4>".$title."</h4>";
        echo "<p>".$detail."</p>";
        echo "</div>";
    }
?>
</head>
<body>
        <div id="wrap">
        <header id="header" class="clearheader">
        <?php   include "nav.html"; ?>
        </header>



        <main>
            <h2>速食店(?</h2>
            <h3><a href="itemListData.php">資料庫建立的點這</a></h3>
            <?php
            $image = array("sdg1-.jpg","sdg2-.jpg","sdg3-.jpg","sdg4-.jpg","sdg5-.jpg","sdg6-.jpg","sdg7-.jpg","sdg8-.jpg","sdg9-.jpg");
            $titles = array("達美樂","肯德基","漢堡王","麥當勞","摩斯漢堡","星巴克","SubWay","すき家","必勝客");
            $details = array("達美樂打了沒4125252","薯條不好吃，蛋塔店","漢堡還不錯可以喝百事可樂","薯條萬歲!!吃貨無罪!!","聽說紅茶好喝但我不常去","太貴而且我不喝咖啡湊數用的","東西都有點貴而且沒我愛吃的","員工爆肝的店，但是好像比吉野家好吃很多","就愛一起hot Pizza Hut(我沒很愛pizza)"); 
            for ( $i = 0; $i < count($titles); $i++ ){
                $m = $image[$i];
                $t = $titles[$i];
                $d = $details[$i];
                printItem($m, $t, $d);
            }
            ?>
        </main>

    <footer>
        <?php   include "infoFoot.html"; ?>
    </footer>
</div>

</body>
</html>