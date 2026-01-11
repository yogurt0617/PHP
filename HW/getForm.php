<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>註冊帳戶</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/HandF.css">
    <link rel="stylesheet" href="css/getFD.css">
    <?php 
    $error = ""; 
    $name = ""; 
    $username = "";
    $showform = true; 

    session_start();
    if (isset($_POST["Reg"])) {
        $name = $_POST["Name"];
        $username = $_POST["UserName"];
        $pass1 = $_POST["Pass1"];
        $pass2 = $_POST["Pass2"];

        if(empty($name)) { $error = "姓名欄位空白"; }
        else if (empty($username)) { $error = "帳號欄位空白"; }
        else if (empty($pass1)) { $error = "密碼欄位空白"; }
        else if ($pass1 != $pass2) { $error = "密碼輸入不相同"; }
        
        if ($error == "") {
            $_SESSION["Name"] = $name;
            $_SESSION["UserName"] = $username;
            $_SESSION["Pass1"] = $pass1;
            header("Location: getData.php");
            exit;
        }
    }
    ?>
</head>
<body>
   <div id="wrap">
    <header id="header" class="clearheader">
        <?php include "nav.html"; ?>
    </header>
   </div>
    <div class="card">
        <div class="card-header">
            <h2>個人註冊</h2>
        </div>
        <div class="card-body">
            <?php if ($error != "") { echo "<div style='color:red; margin-bottom:15px; font-weight:bold;'>⚠ $error</div>"; } ?>
            <form action="getForm.php" method="post">
                <table>
                    <tr>
                        <th>姓名</th>
                        <td><input type="text" name="Name" value="<?php echo $name ?>"></td>
                    </tr>
                    <tr>
                        <th>帳號</th>
                        <td><input type="text" name="UserName" value="<?php echo $username ?>"></td>
                    </tr>
                    <tr>
                        <th>設定密碼</th>
                        <td><input type="password" name="Pass1"></td>
                    </tr>
                    <tr>
                        <th>確認密碼</th>
                        <td><input type="password" name="Pass2"></td>
                    </tr>
                </table>
                <div class="btn-container">
                    <input type="submit" name="Reg" value="註冊使用者"/>
                    <input type="reset" value="清除重填"/>
                </div>
            </form>
        </div>
    </div>


<footer>
    <?php include "infoFoot.html"; ?>
</footer>
</body>
</html>