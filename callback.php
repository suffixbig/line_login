<?php
require_once('_inc/ConfigManager.php'); //Line 設定檔 管理器
require_once('_inc/LineAuthorization.php'); //產生登入網址
require_once('_inc/LineProfiles.php'); //取得用戶端 Profile
require_once('_inc/LineController.php'); //LINE控制
require_once('./config.php'); //設定值

if (!session_id()) {
    session_start();
}

$code = $_GET['code'];
$state = $_GET['state'];
$session_state = $_SESSION['_line_state'];

unset($_SESSION['_line_state']);
if ($session_state !== $state) {
    echo '存取錯誤';
    exit;
}

$Line = new LineController();

$access_token = $Line->getAccessToken($code);//取得使用者資料
//$_SESSION['access_token']=$access_token;
setcookie("access_token",$access_token, time()+3600*24*20);//把他記憶20天
$user = $Line->getLineProfile_access_token($access_token);//取得使用者資料
/*
print_r($access_token);
echo '$code= ' . $code . '<br /><br />';
echo '$state= ' . $state . '<br /><br />';
*/
echo "使用者個人資料";
print_r($user);
