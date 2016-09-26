@extends('layouts.header')

@section('content')

    <div style="margin:350px auto;width:400px;height:400px;">

        <div>嗯。。只是一个很简单的页面。。。。。。。。。</div>
        <div style="margin-top:20px;margin-bottom:20px;">好吧，这是学长做的一个视频：)</div>
        <a href="http://v.youku.com/v_show/id_XMTczODA2ODUwNA==.html" class="btn btn-class btn-danger" target="_blank">这个是优酷链接哦，在线播放~</a>
        <a href="https://5cdae3.lt.yunpan.cn/lk/cknKwy7pBEt2w" class="btn btn-class btn-info" style="margin-top:20px;" target="_blank">这个是云盘的下载链接，嗯，高清无码，原版的。提取码：da77</a>

        <div class="btn btn-class btn-success" style="margin-top:20px;">不得不承认，这个视频真的是做的粗糙了...但是，请原谅我，学长进度是真的有点赶不及了...</div>

        <div><a href="{{Route('index.love_circle')}}" class="btn btn-class btn-warning" style="margin-top:60px;">下一步</a></div>
    </div>
@stop
