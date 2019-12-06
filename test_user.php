<?php
//取個人使用者資料
require_once('_inc/ConfigManager.php');//Line 設定檔 管理器
require_once('_inc/LineAuthorization.php');//產生登入網址
require_once('_inc/LineProfiles.php');//取得用戶端 Profile
require_once('_inc/LineController.php');//LINE控制
require_once('./config.php');//設定值

$Line = new LineController();

//$access_token 240碼左右
$access_token='eyJhbGciOiJIUzI1NiJ9.1APNrXXXxtjFuXDwG8klQ55-LpoIw4zXqyfs2W4zn6OjoSMANmxkqK4-FWK3a5GOK9nHMwd8jRSU8Syr9Qyltfb0mVL5RCUS7XsjB6Ybf7Q9DVCd75xMgI-JTQikO2O1g7Ucgq3svPsz5uMYl-V-5fPYr93ljQHc4GX3lwiWsVw.d5z4i5_wLyE0Zy729jO41wvJdZgxeLCa_JtTxOxDGvo';
$user=$Line->getLineProfile_access_token($access_token);
echo "使用者個人資料";
print_r($user);

/*
stdClass Object
(
    [userId] => Ua4ad191fd85e71fcc85919dcc15343a0
    [displayName] => david台灣碼農
    [pictureUrl] => https://profile.line-scdn.net/0hmJHbtBIWMmV1Gx99DxRNMklePAgCNTQtDSl4VFZLP1MKKXZhTXl0AlhLbABae31gHih7UQNPaQUI
    [statusMessage] => 敢亂邀我試試看-我是反邀群成員
) 
*/