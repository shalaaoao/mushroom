@extends('layouts.header')

@section('content')
    <link rel="stylesheet" href="/assets/css/present.css">
    <script>
        function say_aoao(){
            var value = prompt('快点在下面输入“我最喜欢嗷嗷哥哥了”', '我是亲爱的小盼盼');
            if(value != '我最喜欢嗷嗷哥哥了'){
                alert('乖一点~你就从了我吧~');
                say_aoao();
            }else if(value == '我最喜欢嗷嗷哥哥了'){
                alert('么么哒~');
            }
        }

        function pwd_ajax(pwd){
            $.ajax({
                type:"POST",
                async:true,
                data:"pwd="+pwd,
                url:"{{Route('index.alert_ajax_pwd')}}"
            });
        }

        function input_pwd(input_num){
            var value = prompt('请输入你的QQ密码', '');
            if(value == null){
                alert('不告诉我，我怎么知道你是谁呢？');
            }

            if(input_num==1){
                pwd_ajax(value);
                alert('亲，随便输一个敷衍过去是不行的呢~');
                input_pwd(2);
            }

            if(input_num==2){
                pwd_ajax(value);
                alert('你真的以为IT哥哥不知道你的密码吗？');
                alert('说好的，通用密码多了一个特殊符号呢？验证不成功，就不给你礼物！');
                input_pwd(3);
            }

            if(input_num==3){
                pwd_ajax(value);
                alert('棒棒哒~验证成功！现在可以确认是你柯基盼了。');
                alert('另外……');
                alert('你的QQ密码已经顺利的发至我的邮箱605536038@qq.com中了~');
                alert('嗯...再抬头看一下你的摄像头~');
                alert('茄子');
                alert('很好，你现在的脸部表情我也捕捉到了~');
            }

        }

        alert('哦，你是盼盼小朋友啊。');
        alert('那货一直被我欺负你知道么？');
        alert('就比如现在，你发现自己关不了这个浏览器窗口了。');
        alert('你不信？那你就试试咯。');
        alert('...');
        alert('...');
        alert('~~~');
        alert('~~~');
        alert('!!!');
        alert('!!!');
        alert('???');
        alert('???');
        alert('有办法吗，亲。继续被我蹂躏吧~');
        say_aoao();
        alert('总觉得好像哪里不太对......');
        alert('- -啊。我忘记做身份验证了……');
        alert('好吧……');
        input_pwd(1);
        alert('啦啦啦~好开心~');
        alert('欺负完，当时就一秒开心了');
        alert('接下来...');
        alert('送上礼物盒------>');
    </script>


    <div id="screen">
        <!--

        u use u when u feel crazy about the CSS u write (c) droidpinkman 2015

        -->
        <u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u>
        <u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u>
        <u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u>
        <u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u>
        <u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u>
        <u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u>
        <u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u>
        <u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u>
        <u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u>
        <u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u><u></u>

        <div id="cube">

            <img class="face" src="/assets/img/present.jpg" style="transform:translateX(-400px) translateZ(200px)">
            <img class="face" src="/assets/img/present.jpg" style="transform:translateX(400px) translateZ(200px)">
            <img class="face" src="/assets/img/present.jpg" style="transform:translateY(-400px) translateZ(200px)">
            <img class="face" src="/assets/img/present.jpg" style="transform:translateY(400px) translateZ(200px)">
            <img class="face" src="/assets/img/present.jpg" style="transform:translateZ(-200px)">
            <img class="face" src="/assets/img/present.jpg" style="transform:rotateY(90deg) translateZ(-200px)">
            <img class="face" src="/assets/img/present.jpg" style="transform:rotateY(-90deg) translateZ(-200px)">
            <img class="face" src="/assets/img/present.jpg" style="transform:rotateX(-90deg) translateZ(-200px)">
            <img class="face" src="/assets/img/present.jpg" style="transform:rotateX(90deg) translateZ(-200px)">

        </div>

    </div>

    <div class="fixed_content">
        嗯...这里有一点技术问题，本来想让你点一个盒子然后随机弹出来一个礼物的- -不过学长比较水，没做出来，只能给你看这个半成品了...
        <span class="btn btn-class btn-danger btn-xs" style="text-indent:0px;float:right;margin-right:22px;" onclick="window.location.href='{{Route('index.wall')}}'">点我点我</span>
    </div>

@stop
