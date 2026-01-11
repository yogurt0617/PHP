<?php
$defaultFile = "yeayea.jpg";

if ($_SERVER["REQUEST_METHOD"] === "POST") {


    if (!empty($_FILES["photo"]["name"])) {
        $photoFile = $_FILES["photo"]["name"];
        $tmpPath = $_FILES["photo"]["tmp_name"];

    
        move_uploaded_file($tmpPath, "./uploads/" . $photoFile);
    } else {
        $photoFile = $_POST["photoFileHidden"];
    }

    $photoBright   = $_POST['bright'] . "%";
    $photoContrast = $_POST['contrast'] . "%";
    $photoGray     = $_POST['gray'] . "%";
    $photoSepia    = $_POST['sepia'] . "%";
    $photoInvert   = $_POST['invert'] . "%";

} else {
    $photoFile = $defaultFile;
    $photoBright = "100%";
    $photoContrast = "100%";
    $photoGray = "0%";
    $photoSepia = "0%";
    $photoInvert = "0%";
}
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>影像處理</title>

<link rel="stylesheet" href="css/photo.css">
<link rel="stylesheet" href="css/nav.css">
<link rel="stylesheet" href="css/HandF.css">
    <style>
.card img {
    filter:
    brightness(<?php echo $photoBright; ?>)
    contrast(<?php echo $photoContrast; ?>)
    grayscale(<?php echo $photoGray; ?>)
    sepia(<?php echo $photoSepia; ?>)
    invert(<?php echo $photoInvert; ?>);
}
</style>
</head>

<body>

    <div id="wrap">
    <header id="header" class="clearheader">
    <?php   include "nav.html"; ?>
    </header>
    </div>

    <div id="photo">

    <div class="card" >
        <div class="card-header">
            <?php
                echo "*photoFile: " . $photoFile . "<br>";
                echo "*photoBright: " . $photoBright . "<br>";
                echo "*photoContrast: " . $photoContrast . "<br>";
                echo "*photoGray: " . $photoGray . "<br>";
                echo "*photoSepia: " . $photoSepia . "<br>";
                echo "*photoInvert: " . $photoInvert . "<br>";
            ?>
            <img src="uploads/<?php echo $photoFile; ?>" width="100%" style="z-index:1;">
        </div>

        <div class="card-body">
            <form method="post" action="photo.php" enctype="multipart/form-data">

                
                <input type="hidden" name="photoFileHidden" value="<?php echo $photoFile; ?>">

                <table>
                    <tr>
                        <th>圖片</th>
                        <td><input type="file" name="photo"></td>
                    </tr>
                    <tr>
                        <th>亮度(0~200)</th>
                        <td><input type="number" name="bright" value="<?php echo rtrim($photoBright, '%'); ?>">%</td>
                    </tr>
                    <tr>
                        <th>對比(0~200)</th>
                        <td><input type="number" name="contrast" value="<?php echo rtrim($photoContrast, '%'); ?>">%</td>
                    </tr>
                    <tr>
                        <th>灰階(0~100)</th>
                        <td><input type="number" name="gray" value="<?php echo rtrim($photoGray, '%'); ?>">%</td>
                    </tr>
                    <tr>
                        <th>懷舊(0~100)</th>
                        <td><input type="number" name="sepia" value="<?php echo rtrim($photoSepia, '%'); ?>">%</td>
                    </tr>
                    <tr>
                        <th>負片(0~100)</th>
                        <td><input type="number" name="invert" value="<?php echo rtrim($photoInvert, '%'); ?>">%</td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><input type="submit" value="送出"></td>
                    </tr>
                </table>

            </form>
        </div>
    </div>

    </div>
    <footer>
        <?php   include "infoFoot.html"; ?>
    </footer>
</body>
</html>
