<?php
class Wxservice extends Eloquent{

    public $_token     = Token;
    private $appid     = appID;
    private $appsecret = appsecret;

    //获取access_token
    private function getNewAccessToken(){
        $token_url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential';
        $token_url.= '&appid='.$this->appid;
        $token_url.= '&secret='.$this->appsecret;
        $json  =https_post($token_url);
        $result=json_decode($json,true);
        $access_token=$result['access_token'];
        Cache::put('wx_access_token',$access_token,60);
        return $access_token;
    }

    public function getAccessToken(){
        if(Cache::has('wx_access_token') && !Cache::get('wx_access_token')){
            $access_token = Cache::get('wx_access_token');
        }else{
            $access_token=$this->getNewAccessToken();
        }
        Log::info($access_token);
        return $access_token;
    }

    //自定义菜单
    public function create_menu_api($jsonmenu){
        $menu_url  = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$this->getAccessToken();
        $result = https_post($menu_url, $jsonmenu);
        return $result;
    }

    //获取用户列表
    public function get_userlist(){
        $url="https://api.weixin.qq.com/cgi-bin/user/get?access_token=".$this->getAccessToken();
        $url.="&next_openid=";
        $result=https_post($url);
        return $result;
    }

    //获取用户基本信息
    public function get_userinfo($openid){
        $url="https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$this->getAccessToken();
        $url.="&openid=".$openid;
        $url.="&lang=zh_CN";
        $result=https_post($url);
        return $result;
    }

    //用户授权access_token
    public function get_snsapi_token($code){
        $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$this->appid;
        $url.="&secret=".$this->appsecret;
        $url.="&code=".$code;
        $url.="&grant_type=authorization_code";
        $result=https_post($url);
        return $result;
    }
    //获取Openid
    public function getOpenid($code){
        Log::info('code交换获取openid');
        $access_token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?";
        $access_token_url.= "appid=".$this->appid;
        $access_token_url.= "&secret=".$this->appsecret;
        $access_token_url.= "&code=".$code;
        $access_token_url.= "&grant_type=authorization_code";
        $access_token_json = https_post($access_token_url);
        $access_token_array = json_decode($access_token_json, true);
        $openid = $access_token_array['openid'];
        return $openid;
    }


}