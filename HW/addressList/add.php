<html>

<head>
<link rel="stylesheet" href="../css/nav.css">
<link rel="stylesheet" href="../css/HandF.css">
<link rel="stylesheet" href="../css/addresList.css">
</head>
<body>
    
<?php 
if(isset($_POST['submit'])) {
    include('../../SQL/DB_open.php');
    $sno = $_POST['sno']; $name = $_POST['name']; $addr = $_POST['address'];
    $bday = $_POST['birthday']; $user = $_POST['username']; $pwd = $_POST['password'];
    
    $sql = "INSERT INTO students (sno, name, address, birthday, username, password) 
            VALUES ('$sno', '$name', '$addr', '$bday', '$user', '$pwd')";
    if(mysqli_query($link, $sql)) {
        header("Location: contacts.php");
    }
    include('../../SQL/DB_close.php');
}
?>
<div id="wrap">
<header id="header" class="clearheader">
<?php   include "nav.html"; ?>
</header>
</div>
<main id="contents">
<h2  >新增通訊錄</h2>
<form method="post">
    學號：<input type="text" name="sno"><br>
    姓名：<input type="text" name="name"><br>
    住址：<input type="text" name="address"><br>
    生日：<input type="date" name="birthday"><br>
    帳號：<input type="text" name="username"><br>
    密碼：<input type="password" name="password"><br>
    <input type="submit" name="submit" value="新增聯絡資料">
</form>
<a href="contacts.php">回首頁</a>
</main>
<footer>
<?php   include "../infoFoot.html"; ?>
</footer>
</body>

</html>
