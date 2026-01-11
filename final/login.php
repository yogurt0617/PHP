<?php
session_start();
require_once("../SQL/DB_open.php");

$username = "";
$password = "";
$error_msg = "";

if (isset($_POST["Username"]) && isset($_POST["Password"])) {
    $username = $_POST["Username"];
    $password = $_POST["Password"];

    if ($username != "" && $password != "") {
        $sql = "SELECT * FROM students WHERE password='$password' AND username='$username'";
        $result = mysqli_query($link, $sql);
        
        if ($result) {
            $total_records = mysqli_num_rows($result);
            if ($total_records > 0) {
                $_SESSION["login_session"] = TRUE;
                $_SESSION["username"] = $username;
                header("Location: index.php");
                exit;
            } else {
                $error_msg = "使用者名稱或密碼錯誤";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>使用者登入</title>
    <link rel="stylesheet" href="../HW/css/nav.css">
    <link rel="stylesheet" href="../HW/css/HandF.css">
    <link rel="stylesheet" href="Fcss/login.css">
</head>
<body>
<div id="wrap">
    <header id="header" class="clearheader">
        <?php include "nav.html"; ?>
    </header>
</div>

<main id="contents">
    <div class="subjectDiv">登入系統</div>
    
    <?php if ($error_msg != ""): ?>
        <div style="color: red; text-align: center; margin-bottom: 10px;">
            <?php echo $error_msg; ?>
        </div>
    <?php endif; ?>

    <form action="login.php" method="post">
        <table align="center" style="margin-top: 20px;">
            <tr>
                <td>帳號：</td>
                <td><input type="text" name="Username" size="15"></td>
            </tr>
            <tr>
                <td>密碼：</td>
                <td><input type="password" name="Password" size="15"></td>
            </tr>
            <tr>
                <td colspan="2" align="center" style="padding-top: 20px;">
                    <input type="submit" value="登入網站" class="btn">
                </td>
            </tr>
        </table>
    </form>
</main>

<footer>
    <?php include "../HW/infoFoot.html"; ?>
</footer>
</body>
</html>
<?php require_once("../SQL/DB_close.php"); ?>