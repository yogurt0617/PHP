<?php
require_once("../../SQL/DB_open.php");
$deleteSuccess = false;

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql_file = "SELECT picurl FROM album WHERE album_id = $id";
    $result = mysqli_query($link, $sql_file);
    $row = mysqli_fetch_assoc($result);
    
    if ($row && $row['picurl'] != "") {
        unlink("../uploads/" . $row['picurl']);
    }
    
    $sql_query = "DELETE FROM album WHERE album_id = $id";
    mysqli_query($link, $sql_query);
    $deleteSuccess = true;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>刪除成功</title>
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
        <div class="success-msg">該筆相簿資料已成功刪除！</div>
        <p><a href="album.php" style="text-decoration:none; background:#94cecb; padding:10px; color:#fff;">回相簿列表</a></p>
    </main>
<footer id="footer" style="text-align:center; clear:both;">
<?php
include "../infoFoot.html"; 
?>
</footer>

</body>
</html>
<?php require_once("../../SQL/DB_close.php"); ?>