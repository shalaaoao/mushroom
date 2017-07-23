<!DOCTYPE html>
<html lang="en">

<?php
    use \Illuminate\Support\Facades\Session;
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Little Mushroom Store</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/common/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="/js/common/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/common/bootstrap.min.js"></script>

    <script src="/js/common/common.js"></script>

    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "//hm.baidu.com/hm.js?64526484fa16392275aaf6549ef713dd";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>


</head>

<body>
@if(Session::has('alert'))
    alert("{{Session::get('alert')}}");
@endif

@yield('content')

</body>

</html>
