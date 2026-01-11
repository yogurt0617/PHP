<?php
    $link = @mysqli_connect("localhost","root","")
    or die("無法開啟MySQL<br/>");

    mysqli_select_db($link,"mydb");

?>