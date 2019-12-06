<?php
require_once('_inc/ConfigManager.php'); //Line 設定檔 管理器
require_once('_inc/LineAuthorization.php'); //產生登入網址
require_once('_inc/LineProfiles.php'); //取得用戶端 Profile
require_once('_inc/LineController.php'); //LINE控制
require_once('./config.php'); //設定值

if (!session_id()) {
    session_start();
}

$Line = new LineController();

if(isset($_COOKIE['access_token'])){
$access_token=$_COOKIE['access_token'];
$user = $Line->getLineProfile_access_token($access_token);//取得使用者資料
}else{
echo "沒有記憶access_token";
}

/*
print_r($access_token);
echo '$code= ' . $code . '<br /><br />';
echo '$state= ' . $state . '<br /><br />';*/
echo "使用者個人資料";
print_r($user);
