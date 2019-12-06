<?php
//require_once('./config.php');
require_once('_inc/ConfigManager.php');//Line 設定檔 管理器
require_once('_inc/LineAuthorization.php');//產生登入網址
require_once('_inc/LineProfiles.php');//取得用戶端 Profile
require_once('_inc/LineController.php');//LINE控制
require_once('./config.php');//設定值

if (!session_id()) {
    session_start();
}
$state=sha1(time());
$_SESSION['_line_state'] = $state;

$Line = new LineController();

//echo "產生LINE登入連結";
//echo "<br>\n";
$url= $Line->lineLogin($state);//產生LINE登入連結
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=10.0, user-scalable=yes">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="margin: 10px 0;">
    <div class="panel panel-default">
        <div class="panel-heading">
        LINE登錄v2.1測試 台灣碼農版本
        </div>
        <div class="panel-body">
            <p>請登錄。</p>
            <a href="<?php echo $url; ?>">
                <img src="img/btn_login_base.png">
            </a>
        </div>
    </div>
</div>
</body>
</html>