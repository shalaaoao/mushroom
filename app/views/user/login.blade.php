@extends('layouts.header')

@section('content')
    <link rel="stylesheet" href="/assets/css/login.css">

    <div class="main login_bg">
        <div class="login_content">
            <form role="form" id="login_form" method="post">
                <div class="form-group">
                    <label>Phone</label>
                    <input type="tel" class="form-control" id="phone" placeholder="Enter Phone">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Password">
                </div>

                <div class="btn btn-default login_sub" style="width:100%">Submit</div>
            </form>
        </div>
    </div>

    <script>
        $(function () {
            //固定网页高度
            var h = innerHeight;
            $('.main').css('height', h + 'px');
            $('body').css('overflow', 'hidden');


            $('.login_sub').click(function () {
                var phone = $('#phone').val();
                var pwd = $('#pwd').val();

                if (phone == '') {
                    alert('亲，手机号不能为空哦~');
                    return false;
                }

                if (pwd == '') {
                    alert('亲，密码不能为空哦~');
                    return false;
                }

                $.ajax({
                    type: "POST",
                    async: false,
                    data: "pwd=" + pwd + "&phone=" + phone,
                    url: "{{action('user.do_login')}}",
                    success: function (data) {
                        console.log(data);
                        if (data['status'] == 1) {
                            alert('登陆成功');
                            //window.location.href = "{{$back_url}}";
                        } else {
                            alert('密码错误，请重新输入~');
                        }
                    },
                    error: function () {
                        alert('网络出现错误请重试！');
                    }
                })

            });
        })
    </script>
@stop
