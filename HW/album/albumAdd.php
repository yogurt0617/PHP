<?php
require_once("../../SQL/DB_open.php");
$addSuccess = false;

if (isset($_POST["action"]) && ($_POST["action"] == "add")) {
    $album_date = $_POST["album_date"];
    $location = $_POST["location"];
    $title = $_POST["title"];
    $picurl = $_FILES["picurl"]["name"];
    
    
    if (move_uploaded_file($_FILES["picurl"]["tmp_name"], "../uploads/" . $picurl)) {
        $sql_query = "INSERT INTO album (album_date, location, title, picurl) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($link, $sql_query);
        mysqli_stmt_bind_param($stmt, "ssss", $album_date, $location, $title, $picurl);
        mysqli_stmt_execute($stmt);
        $addSuccess = true;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>新增照片</title>
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
        <?php if ($addSuccess): ?>
            <div class="success-msg">照片上傳成功！</div>
            <p><a href="album.php" class="btn">回相簿管理</a></p>
        <?php else: ?>
            <p>新增相簿資料</p>
            <form action="albumAdd.php" method="post" enctype="multipart/form-data">
                <table align="center" border="0" cellpadding="10" style="margin-bottom: 20px;">
                    <tr><th>日期</th><td><input type="datetime-local" name="album_date" value="<?php echo date('Y-m-d\TH:i'); ?>"></td></tr>
                    <tr><th>地點</th><td><input type="text" name="location" required></td></tr>
                    <tr><th>標題</th><td><input type="text" name="title" required></td></tr>
                    <tr><th>照片</th><td><input type="file" name="picurl" accept="image/*" required></td></tr>
                    <tr>
                        <td colspan="2" align="center" style="padding-top: 20px;">
                            <input type="hidden" name="action" value="add">
                            <input type="submit" value="確認上傳" class="btn">
                            <a href="album.php" class="btn">取消並回相簿</a>
                        </td>
                    </tr>
                </table>
            </form>
        <?php endif; ?>
    </main>
<footer id="footer" style="text-align:center; clear:both;">
<?php
include "../infoFoot.html"; 
?>
</footer>
</body>
</html>
<?php require_once("../../SQL/DB_close.php"); ?>