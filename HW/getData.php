<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>帳戶資料確認</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/HandF.css">
    <link rel="stylesheet" href="css/getFD.css">
</head>
<body>
    <div id="wrap">
        <header id="header" class="clearheader">
          <?php include "nav.html"; ?>
        </header>
    </div>
    <div class="card">
        <div class="card-header">
            <h2>輸入資料完整呈現</h2>
        </div>
        <div class="card-body">
            <?php
            session_start();
            if (isset($_SESSION['UserName'])) {
                $name = $_SESSION['Name'];
                $username = $_SESSION['UserName'];
                $password = $_SESSION['Pass1'];
            ?>
                <table>
                    <tr>
                        <th>用戶姓名</th>
                        <td><?php echo htmlspecialchars($name); ?></td>
                    </tr>
                    <tr>
                        <th>登入帳號</th>
                        <td><?php echo htmlspecialchars($username); ?></td>
                    </tr>
                    <tr>
                        <th>登入密碼</th>
                        <td style="color: #003366; font-weight: bold;">
                            <?php echo htmlspecialchars($password); ?>
                        </td>
                    </tr>
                </table>
                <div class="btn-container">
                    <a href="getForm.php" class="backBtn">返回修改</a>
                </div>
            <?php
            } else {
                echo "<p style='text-align:center;'>未收到有效的表單資料，請重新註冊。</p>";
                echo "<div class='btn-container'><a href='getForm.php' class='backBtn'>返回註冊</a></div>";
            }
            ?>
        </div>
    </div>


<footer>
    <?php include "infoFoot.html"; ?>
</footer>
</body>
</html>