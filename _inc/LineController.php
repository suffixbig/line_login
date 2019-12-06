<?php
//class LineController extends CI_Controller {
class LineController {

    private $lineConfig;

    public function __construct() {
        $config = new ConfigManager();
        $config->setRedirectUri(REDIRECT_URI)
        ->setScope(SCOPE)
        ->setClientSecret(CLIENT_SECRET)
        ->setClientId(CLIENT_ID);
        $this->lineConfig = $config;
    }

    /**
     * 產生連結
     *
     */
    public function lineLogin($state) {
        $auth = new LineAuthorization($this->lineConfig);
        return $auth->createAuthUrl($state);
    }

    /*
    取得使用者資訊用$code
    public function getLineProfile($code) {
        $lineProfile = new LineProfiles($this->lineConfig);
        $profile = $lineProfile->get($code);
        return $profile;
    }
    */

    /**
     * 取得使用者資訊用access_token
     *
     */
    public function getLineProfile_access_token($access_token) {
        $lineProfile = new LineProfiles($this->lineConfig);
        $profile = $lineProfile->getLineProfile_access_token($access_token);
        return $profile;
    }

    /**
     * 以$code取得access_token
     */
    public function getAccessToken($code) {
        $lineProfile = new LineProfiles($this->lineConfig);
        $profile = $lineProfile->getAccessToken($code);
        return $profile;
    }
}