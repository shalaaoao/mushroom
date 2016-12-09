@extends('layouts.header')

@section('content')
    <link rel="stylesheet" href="/assets/css/jj.css">

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

                <div class="btn btn-default login_sub">Submit</div>
            </form>
        </div>
    </div>

    <script>
        $(function(){
            $('.login_sub').click(function(){
                var phone=$('#phone').val();
                var pwd=$('#pwd').val();

                if(phone==''){
                    alert('亲，手机号不能为空哦~');
                    return false;
                }

                if(pwd==''){
                    alert('亲，密码不能为空哦~');
                    return false;
                }

                $.ajax({
                    type:"POST",
                    async:false,
                    data:"pwd="+pwd+"&phone="+phone,
                    url:"{{Route('jj.do_login')}}",
                    dataType: "json",
                    success:function(data) {
                        if(data==1){
                            window.location.href="{{Route('jj.index')}}";
                        }else{
                            alert('密码错误，请重新输入~');
                        }
                    },
                    error:function(){
                        alert_page('网络出现错误请重试！');
                    }
                })

            });


//                $('#login_form').submit();
        })
    </script>
@stop
