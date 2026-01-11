<?php
require_once("../../SQL/DB_open.php");
$id = $_GET["id"];
$sql_query = "SELECT * FROM album WHERE album_id = $id";
$result = mysqli_query($link, $sql_query);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>修改照片</title>
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/album.css" media="all">
    <link rel="stylesheet" href="../css/HandF.css" media="all">
</head>

<body>
<div id="wrap">
<header id="header" class="clearheader">
<?php   include "nav.html"; ?>
</header>
</div>

    <main id="contents">
        <p>修改相簿資料</p>
        <form action="albumEditAct.php" method="post">
            <table align="center" border="1" cellpadding="5">
                <tr><th>標題</th><td><input type="text" name="title" value="<?php echo $row['title']; ?>"></td></tr>
                <tr><th>地點</th><td><input type="text" name="location" value="<?php echo $row['location']; ?>"></td></tr>
                <tr><td colspan="2" align="center">
                    <input type="hidden" name="album_id" value="<?php echo $row['album_id']; ?>">
                    <input type="submit" value="確認修改">
                </td></tr>
            </table>
        </form>
    </main>
<footer id="footer" style="text-align:center; clear:both;">
<?php
include "../infoFoot.html"; 
?>
</footer>

</body>
</html>
<?php require_once("../../SQL/DB_close.php"); ?>