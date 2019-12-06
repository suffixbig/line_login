<?php
//namespace LittleChou\LineLogin;
class LineAuthorization{
    private $configManager;
    public function __construct(ConfigManager $configManager){
        $this->configManager = $configManager;
    }

    /**
     * 產生 Line Authorization Url
     *
     * @see https://developers.line.biz/en/docs/line-login/web/integrate-line-login/
     * @return string
     */
    public function createAuthUrl($state){
        $config = $this->configManager->getConfigs();

        $scope = str_replace(",","%20",$config[ $this->configManager::CLIENT_SCOPE ] );
        $parameter = [
            'response_type' => 'code',
            'client_id' => $config[ $this->configManager::CLIENT_ID ],
            'state' => $state
        ];

        $host = "https://access.line.me/oauth2/v2.1/authorize" ;

        $url = $host . "?" . http_build_query($parameter) . "&scope=". $scope . "&redirect_uri=" . $config[ $this->configManager::CLIENT_REDIRECT_URI ];

        return $url;
    }


}