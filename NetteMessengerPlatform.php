<?php

namespace fritak;


/**
 * @package fritak\NetteMessengerPlatform
 */
Class NetteMessengerPlatform extends \fritak\MessengerPlatform
{
    private $accessTokens;
    
    public function __construct($params, \Nette\Http\Request $request)
    {
        $this->accessTokens = $params['accessTokens'];
        $token              = $this->accessTokens[!empty($params['defaultToken'])? $params['defaultToken'] : key($this->accessTokens)];
        $requestParam       = !empty($request->rawBody)? $request->rawBody : $request->query;
        
        parent::__construct(['accessToken' => $token,'webhookToken' => $params['webhookToken'], 'facebookApiUrl' => $params['facebookApiUrl']], $requestParam);
    }
    
    public function setToken($key)
    {
        $this->loadConfig(['accessToken' => $this->accessTokens[$key],'webhookToken' => $this->config->webhookToken, 'facebookApiUrl' => $this->config->facebookApiUrl]);
    }
}