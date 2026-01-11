<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>個人化首頁</title>
    <link rel="stylesheet" href="../HW/css/nav.css">
    <link rel="stylesheet" href="../HW/css/HandF.css">
    <link rel="stylesheet" href="Fcss/index.css">
</head>
<body>
<div id="wrap">
    <header id="header">
        <?php include "nav.html"; ?>
    </header>
</div>

<main class="welcome-card">
    <?php
    session_start();
    if(!isset($_SESSION["login_session"]) || $_SESSION["login_session"] !== TRUE) {
        header("Location: login.php");
        exit;
    }

    $user = $_SESSION["username"];
    echo "<h2>您好，" . $user . "</h2>";
    echo "<div class='user-content'>";

    switch ($user) {
        case "admin":
            echo "<h3>系統管理員模式</h3>";
            echo "<ul>";
            echo "<li>系統維護：正常</li>";
            echo "<li>待處理請求：0 筆</li>";
            echo "<li>本月流量統計：已使用 0%</li>";
            echo "</ul>";
            echo "<h1>上面是很酷而已不是實際數據</h1>";
            break;

        case "hueyan":
            echo"<p>雯絞老師好</p>";
            echo "<h2>因為我不知道陳會安是誰所以我給老師用</h2>";
            echo "<h3>老師專屬看板</h3>";
            echo "<p>今日課程：網際系統設計<br>";
            echo "提醒：改道我的應該就快改完了，老師加油</p>";
            echo "<a href='https://yogurt0617.github.io/aboutMeee/' target='_blank'>老師要看我的個網嗎</a>";
            break;

        case "jay":
            echo "<h3>個人工作區</h3>";
            echo "<p>歡迎周杰倫進入系統。<br>";
            echo "<p>唉呦，不錯喔<br>";
            echo "最新的相片已上傳至『演唱會』目錄。</p>";
            echo "<img src='Fimg/jay.jpg' alt='周杰倫'>";
            break;
        
        case "jolin":
            echo "<h3>個人工作區</h3>";
            echo "<p>歡迎蔡依林進入系統。<br>";
            echo "<p>你沒發現我躲在角落<br>";
            echo "最新的相片已上傳至『演唱會』目錄(不是周杰倫那個)。</p>";
            echo "<img src='Fimg/jolin.jpg' alt='蔡依林'>";
            break;

        case "chiang":
            echo "<h3>個人搖滾區</h3>";
            echo "<p>歡迎張惠妹進入系統。<br>";
            echo "<p>聽~~海哭的聲音<br>";
            echo "最新的相片已上傳至『台東跨年演唱會』目錄。</p>";
            echo "<img src='Fimg/chiang.jpg' alt='不是艾威兒是張惠妹'>";
            break;
        
        case "you___0617":
            echo "<h3>個人發瘋區，勿進</h3>";
            echo "<p>歡迎帥哥進入系統。";
            echo "<p>如果老師有登進來看我不就尷尬死";
            echo "<p>抱歉老師我話有點多<br>";
            echo "<a href='https://yogurt0617.github.io/aboutMeee/' target='_blank'>我的個網</a>";
            break;

        default:
            echo "<h3>學生個人中心</h3>";
            echo "<p>身分：一般學生<br>";
            echo "請使用下方按鈕進行通訊錄或相簿管理。</p>";
            break;
    }

    echo "</div>";
    ?>
    <div class="action-area">
        <a href="../HW/album/album.php" class="btn">相簿管理</a>
        <a href="../HW/addressList/contacts.php" class="btn">通訊錄</a>
        <a href="login.php" class="btn" style="background:#6c757d;">安全登出</a>
    </div>
</main>

<footer>
    <?php include "../HW/infoFoot.html"; ?>
</footer>
</body>
</html>