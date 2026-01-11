<?php
if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
} else {
    $target_file = "";
}

$catName = $_POST['cat'] ?? '';
$age = $_POST['age'] ?? '';
$sex = $_POST['sex'] ?? '';

if (isset($_POST['favorite']) && is_array($_POST['favorite'])) {
    $favorites = implode("、", $_POST['favorite']);
} else {
    $favorites = $_POST['favorite'] ?? "無";
}

$ownerName = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$comment = isset($_POST['comment']) ? nl2br(htmlspecialchars($_POST['comment'])) : '';
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
<meta charset="UTF-8">
<title>確認填寫內容</title>
<link rel="stylesheet" href="css/entryStyle.css" media="all">
<link rel="stylesheet" href="css/nav.css">
<link rel="stylesheet" href="css/HandF.css">
<link href="https://fonts.googleapis.com/css?family=Limelight" rel="stylesheet">
</head>
<body>
<div id="wrap">
    <header id="header" class="clearheader">
        <?php include "nav.html"; ?>
    </header>
</div>

<main id="contents">
    <table class="entryTable">
        <caption id="catData">您填寫的貓咪資料</caption>
        <tr>
            <th>貓咪名</th>
            <td><?php echo htmlspecialchars($catName); ?></td>
        </tr>
        <tr>
            <th>貓咪年齡</th>
            <td><?php echo htmlspecialchars($age); ?></td>
        </tr>
        <tr>
            <th>貓咪性別</th>
            <td><?php echo htmlspecialchars($sex); ?></td>
        </tr>
        <tr>
            <th>最愛的食物</th>
            <td><?php echo htmlspecialchars($favorites); ?></td>
        </tr>
        <tr>
            <th>貓咪照片</th>
            <td>
                <?php if ($target_file): ?>
                    <img src="<?php echo $target_file; ?>" class="preview-img" style="max-width: 100%; height: auto; display: block;">
                <?php else: ?>
                    未上傳照片
                <?php endif; ?>
            </td>
        </tr>
    </table>

    <table class="entryTable">
        <caption id="ownerData">您填寫的飼主資料</caption>
        <tr>
            <th>飼主名</th>
            <td><?php echo htmlspecialchars($ownerName); ?></td>
        </tr>
        <tr>
            <th>E-Mail</th>
            <td><?php echo htmlspecialchars($email); ?></td>
        </tr>
        <tr>
            <th>留言</th>
            <td><?php echo $comment; ?></td>
        </tr>
    </table>

    <button onclick="history.back()" class="backBtn">返回修改資料</button>
</main>

<footer>
    <?php include "infoFoot.html"; ?>
</footer>
</body>
</html>