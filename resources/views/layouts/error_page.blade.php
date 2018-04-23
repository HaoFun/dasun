<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ url('images/ico.ico') }}" rel="SHORTCUT ICON">
    <title>@yield('status_code')</title>
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway';
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-family: "微軟正黑體";
            font-size: 84px;
        }

        .links > a {
            font-family: "微軟正黑體";
            color: #636b6f;
            padding: 0 10px;
            font-size: 30px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        .title a img {
            max-height: none!important;
            width: 120px;
            height: 120px;
            overflow: hidden;
            border-radius: 50%;
            background: #FFF;
            box-shadow: rgba(255,255,255,1) 0 0 0 5px,rgba(0,0,0,1) 0 0 5px 4px;
            -webkit-transition: -webkit-transform 600ms;
            -moz-transition: -moz-transform 600ms;
            transition: transform 600ms;
        }
        .title a img:hover {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    </style>
</head>

<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            <a href="/" style="color: #222222;">
               @yield('status_message')
            </a>
        </div>
        <div class="links">
            <a href="#" onclick="history.back()">回上一頁</a>
            <a target="_self" rel="noreferrer noopener" href="{{ url('/') }}">返回首頁</a>
        </div>
    </div>
</div>
</body>

</html>
<script src="{{ mix('js/app.js') }}"></script>
<script>
    $(document).ready(function ()
    {
        console.log('Hello, Have a good day :)');
    });
</script>