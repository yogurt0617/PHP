<?php
include('../../SQL/DB_open.php');


if(isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];
    mysqli_query($link, "DELETE FROM students WHERE sno='$id'");
    header("Location: contacts.php");
    exit;
}


if(isset($_POST['update'])) {
    $old_sno = $_POST['old_sno'];
    $sno = $_POST['sno'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $birthday = $_POST['birthday'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "UPDATE students SET 
            sno='$sno', 
            name='$name', 
            address='$address', 
            birthday='$birthday', 
            username='$username', 
            password='$password' 
            WHERE sno='$old_sno'";

    if(mysqli_query($link, $sql)) {
        echo "<script>alert('修改成功！'); window.location.href='contacts.php';</script>";
    } else {
        echo "修改失敗：" . mysqli_error($link);
    }
}


if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($link, "SELECT * FROM students WHERE sno='$id'");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: contacts.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
    
<head>
<link rel="stylesheet" href="../css/nav.css">
<link rel="stylesheet" href="../css/HandF.css">
<link rel="stylesheet" href="../css/addresList.css">
<meta charset="UTF-8">
<title>編輯通訊錄</title>
</head>

<body>
<div id="wrap">
<header id="header" class="clearheader">
<?php   include "nav.html"; ?>
</header>
</div>
<main id="contents">
    <h2  >修改通訊錄</h2>
    <form method="post" action="edit.php">
        <input type="hidden" name="old_sno" value="<?php echo $row['sno']; ?>">

        <table border="1">
            <tr>
                <td>學號：</td>
                <td><input type="text" name="sno" value="<?php echo $row['sno']; ?>"></td>
            </tr>
            <tr>
                <td>姓名：</td>
                <td><input type="text" name="name" value="<?php echo $row['name']; ?>"></td>
            </tr>
            <tr>
                <td>住址：</td>
                <td><input type="text" name="address" value="<?php echo $row['address']; ?>"></td>
            </tr>
            <tr>
                <td>生日：</td>
                <td><input type="date" name="birthday" value="<?php echo $row['birthday']; ?>"></td>
            </tr>
            <tr>
                <td>帳號：</td>
                <td><input type="text" name="username" value="<?php echo $row['username']; ?>"></td>
            </tr>
            <tr>
                <td>密碼：</td>
                <td><input type="text" name="password" value="<?php echo $row['password']; ?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="update" value="更新聯絡資料">
                </td>
            </tr>
        </table>
    </form>
    <br>
    <a href="contacts.php">取消並回首頁</a>
</main>
<footer>
<?php   include "../infoFoot.html"; ?>
</footer>
</body>
</html>

<?php include('../../SQL/DB_close.php'); ?>