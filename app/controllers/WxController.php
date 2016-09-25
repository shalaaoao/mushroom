<?php

class WxController extends \BaseController
{

    private function new_wxservice()
    {
        $wxservice = new Wxservice;
        return $wxservice;
    }

    //配置接口
    public function index()
    {
        if (!isset($_GET['echostr'])) {
            $this->responseMsg();
        } else {
            $this->valid();
        }
    }

    //添加自定义菜单
    public function create_menu(){

        $data = '{
                "button":[
                {
                    "type":"view",
                    "name":"主页",
                    "url":"http://www.shalaaoao.com"
                },
       			{
                "name":"介绍",
                    "sub_button":[
                    {
                        "type":"view",
                        "name":"江桥第一系列",
                        "url":"http://www.baidu.com"
                    },
                    {
                        "type":"view",
                        "name":"小蘑菇简介",
                        "url":"http://www.baidu.com"
                    },
                    {
                        "type":"view",
                        "name":"新用户福利",
                        "url":"http://www.baidu.com"
                    }]
                },
                {
                "name":"个人中心",
                    "sub_button":[

                    {
                        "type":"view",
                        "name":"我的资产",
                        "url":"http://www.baidu.com"
                    },
                    {
                        "type":"view",
                        "name":"关于小蘑菇",
                        "url":"http://www.baidu.com"
                    }
                    ]
                }]
            }';

        $wxservice = $this->new_wxservice();
        echo $wxservice->create_menu_api($data);

    }


    //获取code
    public function get_openid(){
        $code  = $_GET['code'];
        $state = $_GET['state'];
        $wxservice = $this->new_wxservice();
        $openid= $wxservice->getOpenid($code);
        Session::put('openid',$openid);
        $url = urldecode(base62_decode($state));
        if(strpos($url,'?')){
            return Redirect::to($url.'&openid='.$openid);
        }else{
            return Redirect::to($url.'?openid='.$openid);
        }
    }

    //获取用户列表
    public function get_userlist(){
        $wxservice = $this->new_wxservice();
        print_r($wxservice->get_userlist());
    }

    //获取用户信息
    public function get_userinfo(){
        $wxservice = $this->new_wxservice();
        print_r($wxservice->get_userinfo('oudf6wu629kaFKERyDW3-Goro3M8'));
    }

    //获取snsapi_token
    public function get_snsapi_token(){
        $code=Input::get('code');
        $wxservice=$this->new_wxservice();
        print_r($wxservice->get_snsapi_token($code));
    }

}