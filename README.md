# LINE登錄 PHP原生寫法版本

## 使用方法
https://developers.line.biz/zh-hant/  
1.與LINE Developers創建頻道，並獲取頻道ID和頻道秘密。  
2.在LINE Developers的[應用程序設置]-[重定向設置]中指定回調URL。  
3.在config0.php中替換YOUR_CLIENT_ID，YOUR_CLIENT_SECRET，YOUR_REDIRECT_URI，SCOPE。然後將config0.php改名為config.php  
4.將index.php，config.php，callback.php上傳到可以通過https://訪問的位置。  
5.轉到https://你的登入位置 ，使用您的LINE帳戶登錄，並獲得獲取用戶ID的權限。  


## 我們接著可以開始寫程式了！我們會使用的主要三個API為
Ⅰ https://access.line.me/oauth2/v2.1/authorize  (登入連結)   
Ⅱ https://api.line.me/oauth2/v2.1/token (取得Access Token)   
Ⅲ https://api.line.me/v2/profile (取得登入者資料)   
素材:Login Button(https://developers.line.me/en/docs/line-login/login-button/)  

## code很重要！只能用一次！並有十分鐘效期
我們要用它來呼叫另一支API:  https://api.line.me/oauth2/v2.1/token 以便取得 access token，要取得access token，我們才能終極取得用戶的 profile資料！

## access token更重要
這邊回傳的Access token，效期可長達30天！30天內都可以持這個Access token免死金牌，向LINE取得用戶Profile資料。
你也可以另外呼叫GET https://api.line.me/oauth2/v2.1/verify，來驗證Access token免死金牌的有效性。

## 可以取得 (回傳) 哪些資料呢? 
可以取得 userId 來跟你自己的平台做 mapping !  
可以取得displayName，就是用戶在 LINE顯示的名稱  
可以取得pictureUrl，就是用戶在 LINE顯示的大頭照片  
可以取得statusMessage，就是用戶在 LINE顯示的ˋ狀態文字，如果他沒有狀態文字就不會回傳此項！  

## 其餘注意事項
備註：登入的帳號，LINE APP內需有勾選 允許自其他裝置登入，勾選位置在LINE APP內的設定->我的帳號->允許自其他裝置登入。  
只要是你登入過的網站或APP，都可以在 LINE APP內看到紀錄，並可以取消連動，到LINE APP內的設定->我的帳號->連動中的應用程式，即可看到列表紀錄！真的是凡走過必留下痕跡喔～

## 程式
https://1-0.tw/DEMO/line_login/ #登入位置  
https://1-0.tw/DEMO/line_login/callback.php 	#返回資料 用COOKIE記下access_token會存10天  
https://1-0.tw/DEMO/line_login/user.php		#用COOKIE記憶的access_token的去取得資料  
https://1-0.tw/DEMO/line_login/test_user.php	#用寫死的access_token的去取得資料  

## 參考教學
PHP 使用 Line Login 帳號驗證登入 申請實作  
http://superlevin.ifengyuan.tw/php-%E4%BD%BF%E7%94%A8-line-login-%E5%B8%B3%E8%99%9F%E9%A9%97%E8%AD%89%E7%99%BB%E5%85%A5/  
php 登入實作  
https://www.anson.com.tw/2018/anson-post-581.html  

### 作者
台灣碼農  
https://1-0.tw #台灣碼農的個人網站  
