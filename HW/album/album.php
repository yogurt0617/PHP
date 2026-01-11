<?php
require_once("../../SQL/DB_open.php");
$pageRow_records = 8;
$num_pages = 1;
if (isset($_GET['page'])) {
    $num_pages = $_GET['page'];
}
$startRow_records = ($num_pages - 1) * $pageRow_records;
$query_Album = "SELECT album_id, album_date, location, title, picurl FROM album ORDER BY album_date DESC";
$query_Album_limit = $query_Album." LIMIT {$startRow_records}, {$pageRow_records}";
$result = mysqli_query($link, $query_Album_limit);
$query_count = "SELECT COUNT(*) FROM album";
$result_count = mysqli_query($link, $query_count);
$total_records_row = mysqli_fetch_row($result_count);
$total_records = $total_records_row[0];
$total_pages = ceil($total_records / $pageRow_records);
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>相簿首頁</title>
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/album.css">
    <link rel="stylesheet" href="../css/HandF.css">
</head>
<body>
<div id="wrap">
<header id="header" class="clearheader">
<?php include "nav.html"; ?>
</header>
</div>
<main id="contents">
    <script type="text/javascript">
        function checkDelete() { return confirm('確定要刪除嗎？'); }
    </script>
    <div class="subjectDiv">相簿管理</div>
    <div class="actionDiv">照片總數：<?php echo $total_records; ?>，<a href="albumAdd.php" class="btn" style="width:auto; padding:5px 15px;">新增照片</a></div>
    
    <div class="album-container">
        <?php if ($total_records <= 0): ?>
            <h4>暫無圖片</h4>
        <?php else: ?>
            <?php while ($row_RecAlbum = mysqli_fetch_array($result, MYSQLI_ASSOC)): ?>
                <div class="albumDiv">
                    <div class="picDiv">
                        <a href="../uploads/<?php echo $row_RecAlbum["picurl"]; ?>">
                            <img src="../uploads/<?php echo $row_RecAlbum["picurl"]; ?>" alt="照片">
                        </a>
                    </div>
                    <div class="albuminfo">
                        <p><strong><?php echo $row_RecAlbum["title"]; ?></strong><br>
                        <?php echo $row_RecAlbum["album_date"]; ?><br>
                        <?php echo $row_RecAlbum["location"]; ?></p>
                    </div>
                    <a href="albumEdit.php?id=<?php echo $row_RecAlbum["album_id"]; ?>" class="btn">編輯</a>
                    <a href="albumDelete.php?id=<?php echo $row_RecAlbum["album_id"]; ?>" class="btn btn-delete" onclick="return checkDelete()">刪除</a>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <div class="navDiv">
        <?php if ($num_pages > 1): ?>
            <a href="?page=1">&lt;&lt;</a> <a href="?page=<?php echo $num_pages-1; ?>">&lt;</a>
        <?php endif; ?>
        <?php for ($i=1; $i<=$total_pages; $i++): ?>
            <?php if ($i == $num_pages): ?><b><?php echo $i; ?></b> <?php else: ?><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a> <?php endif; ?>
        <?php endfor; ?>
        <?php if ($num_pages < $total_pages): ?>
            <a href="?page=<?php echo $num_pages+1; ?>">&gt;</a> <a href="?page=<?php echo $total_pages; ?>">&gt;&gt;</a>
        <?php endif; ?>
    </div>
</main>
<footer>
<?php include "../infoFoot.html"; ?>
</footer>
</body>
</html>
<?php mysqli_close($link); ?>