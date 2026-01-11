<!DOCTYPE html>
<html lang="zh-TW">
<head>
<meta charset="UTF-8">
<title>KOMA-NATSU Web</title>
<meta name="keywords" content="貓咪,喵咪,喵星人,貓咪介紹,曬貓">
<meta name="description" content="介紹我家的貓咪們！還有大量可愛的貓照片。">
<link href= "css/entryStyle.css" rel="stylesheet" media="all">
<link rel="stylesheet" href="css/nav.css">
<link rel="stylesheet" href="css/HandF.css">
<link href="https://fonts.googleapis.com/css?family=Limelight" rel="stylesheet">
</head>

<body>
<div id="wrap">
<header id="header" class="clearheader">
<?php   include "nav.html"; ?>
</header>
</div>

<main id="contents">

<form id="entryForm" action="showData.php" method="post" enctype="multipart/form-data">
    <p><strong><span class="require">*</span>為必填項目。</strong></p>
    <table class="entryTable">
        <caption id="catData">貓咪資料</caption>
        <tr>
            <th>貓咪名*</th>
            <td>
                <input type="text" name="cat"  required autofocus>
            </td>
        </tr>
        <tr>
            <th>貓咪年齡*</th>
            <td>
                <select name="age" required>
                    <option value="" selected>請選擇</option>
                    <option value="0">未滿1歲</option>
                    <option value="1">1～5歲</option>
                    <option value="2">6～10歲</option>
                    <option value="3">11～15歲</option>
                    <option value="4">16～20歲</option>
                    <option value="5">20歲以上</option>
                    <option value="6">不明</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>貓咪性別*</th>
            <td>
                <input type="radio"name="sex" id="male" value="男生" checked>
                <label for="male">男生</label>

                <input type="radio"name="sex" id="female"value="女生">
                <label for="female">女生</label> 
</td>
        </tr>
        <tr>
            <th>貓咪最愛的食物</th>
            <td>
                <input type="checkbox" name="favorite[]" id="favo1" value="魚">魚
                <input type="checkbox" name="favorite[]" id="favo2" value="肉">肉
                <input type="checkbox" name="favorite[]" id="favo3" value="乾飼料">乾飼料
                <input type="checkbox" name="favorite[]" id="favo4" value="貓罐頭">貓罐頭
                <input type="checkbox" name="favorite[]" id="favo5" value="肉泥">肉泥
                <input type="checkbox" name="favorite[]" id="favo6" value="其它">其它
            </td>
        </tr>
        <tr>
            <th>貓咪照片*</th>
            <td><input type="file" name="photo" required></td>
        </tr>
    </table>
    <table class="entryTable">
        <caption id="ownerData">飼主資料</caption>
        <tr>
            <th>飼主名*</th>
            <td><input type="name" name="name" required placeholder="黑貓小町" >
            <small>※可用暱稱</small>
            </td>
        </tr>
        <tr>
            <th>E-Mail*</th>
            <td><input type="email" name="email" required placeholder="sample@gmail.com" ></td>
        </tr>
        <tr>
            <th>留言</th>
            <td><textarea name="comment" rows="4" cols="40"></textarea></td>
        </tr>
    </table>
<div class="entryBtns">
<input type="reset" value="清除重填">
<input type="submit" value="送出">
</div>
</form>

</main>

<footer>
<?php   include "infoFoot.html"; ?>
</footer>
</body>
