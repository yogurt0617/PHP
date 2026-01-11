<?php 
include('../../SQL/DB_open.php'); 
$records_per_page = 3;
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $current_page = (int)$_GET['page'];
} else {
    $current_page = 1;
}
$offset = ($current_page - 1) * $records_per_page;


$count_sql = "SELECT COUNT(*) FROM students";
$count_result = mysqli_query($link, $count_sql);
$count_row = mysqli_fetch_array($count_result);
$total_records = $count_row[0];
$total_pages = ceil($total_records / $records_per_page);


$sql = "SELECT * FROM students LIMIT $offset, $records_per_page";
$result = mysqli_query($link, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>通訊錄管理</title>
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/HandF.css">
    <link rel="stylesheet" href="../css/addresList.css">
</head>

<body>

<div id="wrap">
    <header id="header" class="clearheader">
        <?php include "nav.html"; ?>
    </header>
</div>

<main id="contents">
    <h2>通訊錄管理</h2>
    <div class="info-bar">
        <?php echo "紀錄總數：$total_records 筆 (第 $current_page / $total_pages 頁)"; ?>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>編號</th><th>姓名</th><th>住址</th><th>生日</th><th>帳號</th><th>密碼</th><th>功能</th>
            </tr>
        </thead>
        <tbody class="action-links">
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['sno']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['birthday']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['sno']; ?>">編輯</a> | 
                    <a href="edit.php?action=delete&id=<?php echo $row['sno']; ?>" onclick="return confirm('確定刪除?')">刪除</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <div class="pagination" style="text-align: center; margin: 20px 0;">
        <?php if($current_page > 1): ?>
            <a href="contacts.php?page=<?php echo $current_page - 1; ?>" class="btn-link" style="background-color: #6c757d;">上一頁</a>
        <?php endif; ?>

        <?php for($i = 1; $i <= $total_pages; $i++): ?>
            <a href="contacts.php?page=<?php echo $i; ?>" class="btn-link" <?php if($i == $current_page) echo 'style="background-color: #333;"'; ?>>
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>

        <?php if($current_page < $total_pages): ?>
            <a href="contacts.php?page=<?php echo $current_page + 1; ?>" class="btn-link" style="background-color: #6c757d;">下一頁</a>
        <?php endif; ?>
    </div>

    <div class="footer-nav">
        <a href="add.php" class="btn-link">新增聯絡資料</a> 
        <a href="search.php" class="btn-link">搜尋通訊錄</a>
    </div>
</main>

<footer>
    <?php include "../infoFoot.html"; ?>
</footer>
</body>
</html>
<?php include('../../SQL/DB_close.php'); ?>