<?php
 session_start();

function xss_sanitize($str)  //  TODO:  Is this good enough?  (Hint:  lol no.)
{
    return str_replace("script", "", $str);
}
?>
<DOCTYPE html>
<head>
<title>Test site:  comments</title>
</head>
<body>
    <p>Sorry, we don't have a page called <? echo $_GET["page"]; ?></p>
</body>
</html>
