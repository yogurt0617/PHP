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
<?php include('../../SQL/DB_open.php'); ?>

<main id="contents" >
<h2  >搜尋通訊錄</h2>
<form method="get">
    關鍵字：<input type="text" name="kw">
    <input type="submit" value="搜尋">
</form>
<?php
if(isset($_GET['kw']) && !empty($_GET['kw'])) {
    $kw = $_GET['kw'];
    $sql = "SELECT * FROM students WHERE name LIKE '%$kw%' OR address LIKE '%$kw%'";
    $result = mysqli_query($link, $sql);
    echo "找到 " . mysqli_num_rows($result) . " 筆結果。";

}
?>
<a href="contacts.php">回首頁</a>
</main>
<footer>
<?php   include "../infoFoot.html"; ?>
</footer>
</body>

</html>
<?php include('../../SQL/DB_close.php'); ?>