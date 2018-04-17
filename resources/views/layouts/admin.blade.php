<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ url('images/ico.ico') }}" rel="SHORTCUT ICON">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','Dasun')</title>
    <meta name="description" content="@yield('description','Dasun')">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
</head>
<body>
<div id="app" class="wrapper">
    <div class="sidebar" data-active-color="orange" data-background-color="black">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a role="ajax" href="{{ url('/') }}" class="simple-text">
                    <img width="200px" src="{{ asset('images/LOGO.png') }}" alt="Logo">
                </a>
            </div>
            <ul class="nav nav-sidebar">
                @include('layouts.sidebar')
            </ul>
        </div>
    </div>
    <div class="main-panel ">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img style="margin-top: -8px;height: 40px" src="{{ asset('images/LOGO-02.png') }}" alt="ERP">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">登入</a></li>
                            <li><a href="{{ route('register') }}">註冊</a></li>
                        @endif
                        @if(Auth::check())
                            <li>
                                <a class="text-center" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i><b>登出</b></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content" style="margin-top: 0px">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content">
                            @include('common.error')
                            @include('common.message')
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">

                </nav>
                <p class="copyright" style="text-align: center;color: rgb(140, 157, 174); font-size: 13px;  line-height: 38px;">
                    &copy; {{ \Carbon\Carbon::now()->year }} <a target="_blank" href="{{ '' }}"></a>
                </p>
            </div>
        </footer>
    </div>
</div>
<script src="{{ mix('js/app.js') }}"></script>
@yield('js')
@include('vendor.ueditor.assets')
@include('vendor.sweet.alert')
<script>
    (function () {
        $( document).ready( function() {
            setUeditor();
            //alert change swal
            window.alert = function() { return swal.apply(this, arguments); };
            $('div.alert').not('.alert-important').delay(1000).fadeOut(1000);

            //delete all toggle
            $(document).on('change','.checktoggle',function () {
                if($(this).is(":checked"))
                {
                    $(".delete_list").each(function() {
                        $(this).prop('checked',true);
                    });
                }
                else
                {
                    $(".delete_list").each(function() {
                        $(this).prop('checked',false);
                    });
                }
            });

            //delete all choose checked
            $(document).on('click','.delete_all', function(e) {
                var delete_ids = [];
                $(".delete_list:checked").each(function() {
                    if(!isNaN($(this).val()))
                    {
                        delete_ids.push($(this).val());
                    }
                });
                if(delete_ids.length <=0)
                {
                    swal({
                        title: "請選擇一個刪除項目.",
                        type: "error",
                        timer: 2000
                    })
                }
                else
                {
                    swal({
                            title: "確認要刪除選取的項目嗎?",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#2566c3",
                            confirmButtonText: "刪除",
                            cancelButtonText: "取消",
                            closeOnConfirm: true
                        },
                        function() {
                            delete_ids = delete_ids.join(",");
                            $.ajax({
                                url: $('.delete_all').data('url'),
                                type: 'POST',
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                data: {
                                    ids:delete_ids,
                                    _method:"DELETE"
                                },
                                success: function (data) {
                                    if (data['status']) {
                                        $('.content-body').html($(data['data']).find('.content-body').html());
                                        swal({
                                            title: data['message'],
                                            type: "success",
                                            timer: 1500
                                        });
                                    } else {
                                        swal({
                                            title: data['message'],
                                            type: "error",
                                            timer: 1500
                                        });
                                    }
                                },
                                error: function (data) {
                                    swal({
                                        title: data.responseText,
                                        type: "error",
                                        timer: 1500
                                    });
                                }
                            });
                        });
                }
            });
        });

        function setUeditor() {
            if($('#content').length > 0)
            {
                UE.delEditor('content');
                UE.getEditor('content',
                    {
                        initialFrameHeight:250,
                        scaleEnabled:false,
                        toolbars: [
                            ['fontsize','fontfamily','bold','forecolor','italic', 'underline', 'strikethrough', 'blockquote', 'justifyleft','justifycenter', 'justifyright',  'link', 'insertimage','insertframe','source']
                        ],
                        autoHeight:200,
                        elementPathEnabled: false,
                        enableContextMenu: false,
                        autoClearEmptyNode:true,
                        wordCount:false,
                        imagePopup:false,
                        autotypeset:{ indent: true,imageBlockLine: 'center' },
                        initialStyle:'p{line-height:30px;}'
                    });
            }
        }

        $(document).on("click","a[role='ajax']",function (event) {
            history.pushState($(this).attr("href"),'', $(this).attr("href"));
            event.preventDefault();
            $.ajax({
                url:$(this).attr("href"),
                type:'get',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                cache:false,
                datatype:'html',
                timeout:2000,
                success: function (data) {
                    var content = $(data).find('.content-body').html();
                    var sitebar = $(data).find('.nav-sidebar').html();
                    $('.content-body').html(content);
                    $('.nav-sidebar').html(sitebar);
                    setUeditor();
                },
                error: function (data) {
                    window.location.reload();
                }
            });
        });

        window.addEventListener("popstate", function()
        {
            $.ajax({
                url:window.location.href,
                type:'get',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                cache:false,
                datatype:'html',
                timeout:2000,
                success: function (data) {
                    var content = $(data).find('.content-body').html();
                    var sitebar = $(data).find('.nav-sidebar').html();
                    $('.content-body').html(content);
                    $('.nav-sidebar').html(sitebar);
                    setUeditor();
                },
                error: function (data) {
                    window.location.reload();
                }
            });
        });
    })();
</script>
</body>
</html>