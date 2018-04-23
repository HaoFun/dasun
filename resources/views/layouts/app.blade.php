<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        @include('layouts.title')
    </title>
    <link href="{{ url('images/ico.ico') }}" rel="SHORTCUT ICON">
    <meta name="keywords" content="{{ isset($setting) ? $setting->keywords:'' }}" />
    <meta name="description" content="{{ isset($setting) ? $setting->description:'' }}" />
    <meta name="author" content="Joey Workshop">
    <meta name="copyright" CONTENT="本網頁著作達盛興汽車有限公司所有">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="URL" content="www.dasun.com.tw">
    <link href="{{ mix('css/frontend/app.css') }}" rel="stylesheet" type="text/css" />
    @yield('css')
</head>

<body>
<div id="mobile">
    <a class="toggle"><img src="{{ asset('images/MENU-03.png') }}" alt="" width="35" height="24" /></a>
    <ul class="wrap">
        @include('layouts.module_bar')
    </ul>
</div>
<div id="top-bar">

    <div class="bar_logo"><a href="{{ route('tw.home') }}"><img src="{{ asset('images/LOGO.png') }}" alt="車輛定期檢驗 - {{ isset($setting) ? $setting->config_name:'' }}" width="250"  border="0" /></a>
    </div>


    <div class="bar_menu">
        <ul>
            @include('layouts.module_bar')
        </ul>
    </div>

</div>
<div id="top">
    <div class="BK">
        <div class="logo"><a href="{{ route('tw.home') }}"><img src="{{ asset('images/LOGO.png') }}" alt="車輛定期檢驗 - {{ isset($setting) ? $setting->config_name:'' }}" width="338"  border="0" /></a></div>
        <div class="home_btn">
            <p>
                {{ isset($setting)? $setting->config_address:'' }}<br />
                {{ isset($setting)? $setting->config_phone:'' }}
            </p>
        </div>
    </div>
</div>
<div id="menu">
    <ul>
        @include('layouts.module_bar')
    </ul>
</div>
<div id="module-content" class="module-content">
    @yield('content')
</div>


<div id="down">
    <p>{{ isset($setting)? $setting->config_name:'' }} 版權所有 © 2018 Dasun Motor Co, Ltd. All Rights Reserved. <br />廠址：{{ isset($setting)? $setting->config_address:'' }}　電話：{{ isset($setting)? $setting->config_phone:'' }}　傳真：{{ isset($setting)? $setting->config_fax:'' }}　E-mail：{{ isset($setting)? $setting->config_email:'' }}</p>
</div>

</body>
<script type='text/javascript' src="{{ mix('js/frontend/app.js') }}"></script>
@yield('js')
<script type='text/javascript'>
    $(function(){
        var $mobile = $('#mobile') ,
            $toggle = $mobile.find('.toggle') ,
            $menu = $mobile.find('.wrap');

        $toggle.click(function() {
            $menu.slideToggle()
        });

        $(window).load(function(){
            $(window).bind('scroll resize', function(){
                var $this = $(this);
                var $this_Top=$this.scrollTop();

                //當高度小於100時，關閉區塊
                if($this_Top < 100){
                    $('#top-bar').stop().animate({top:"-110px"});
                }
                if($this_Top > 100){
                    $('#top-bar').stop().animate({top:"0px"});
                }
            }).scroll();
        });

        $('#qaContent ul').addClass('accordionPart').find('li div:nth-child(1)').addClass('qa_title').hover(function(){
            $(this).addClass('qa_title_on');
        }, function(){
            $(this).removeClass('qa_title_on');
        }).click(function(){
            var $qa_content = $(this).next('div.qa_content');
            if(!$qa_content.is(':visible')){
                $('#qaContent ul li div.qa_content:visible').slideUp();
            }
            $qa_content.slideToggle();
        }).siblings().addClass('qa_content').hide();
    });

    (function () {
        var $news_type = ['最新消息','最新公告','最新宣導','最新活動'];
        $('.change_news_type').on("change",(function () {
            if($.inArray(this.value,$news_type) !== -1)
            {
                console.log("{{ route('tw.news',['type']) }}" + "=" + this.value);
                window.location.href = "{{ route('tw.news',['type']) }}" + "=" + this.value;
            }
            else
            {
                window.location.href = "{{ route('tw.news') }}"
            }
        }));
    })();
</script>
</html>
