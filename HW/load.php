<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>貸款試算結果</title>
    <link rel="stylesheet" href="css/nav.css" media="all">
    <link rel="stylesheet" href="css/HandF.css">
    <link rel="stylesheet" href="css/load.css">
</head>
<body>
<div id="wrap">
    <header id="header" class="clearheader">
    <?php
    include "nav.html";
    ?>
    </header>
</div>

<main id="contents" style="padding-top:0;">

    <h2>貸款試算結果</h2>
    <?php
        $uname = $_POST['uname'] ?? '';
        $Ldate = $_POST['Ldate'] ?? '';
        $loan = (float)($_POST['loan'] ?? 0) * 10000; 
        $rate = (float)($_POST['rate'] ?? 0);
        $year = (int)($_POST['year'] ?? 0);

    if (empty($uname) || $loan <= 0 || $rate <= 0 || $year <= 0 || empty($Ldate)) {
        echo "<div class='error'>輸入資料不完整, 無法試算! 請回上一頁重新輸入。</div>";
    }else{
        $username = $uname;
        $loanDate = $Ldate;
        $loanYear = $year; 
        $principal = $loan; 
        $annualRate = $rate; 
    
        $str = $loanDate . " +" . $loanYear . " years"; 
        $endDate = date('Y-m-d', strtotime($str)); 
        $rateDecimal = $annualRate / 100;
        $muliRate = pow((1 + $rateDecimal), $loanYear);
        $payment = $principal * $muliRate;
        $formattedPayment = number_format($payment, 0, '.', ',');

        echo "<div class='welcome'>" . $username . " 會員您好，您的貸款試算結果如下：</div>";
        echo "<ul>";
        echo "<li>貸款期間：" . $loanDate . "~" . $endDate . "</li>";
        echo "<li>貸款金額：" . number_format($principal, 0, '.', ',') . " 元</li>";
        echo "<li>年利率：" . $annualRate . "%</li>";
        echo "<li>" . $loanYear . "年後應還款 (本金加利息)：<span style='color: blue; font-weight: bold;'>" . $formattedPayment . "</span> 元</li>";
        echo "</ul>";
    }
    ?>
    <button onclick="history.back()" class="back-button">回上一頁</button>
</main>

<footer id="footer" style="text-align:center; clear:both;">
<?php
include "infoFoot.html"; 
?>
</footer>
</body>
</html>