@extends('layouts.app')
@section('content')
<div id="mov" style="background-image:url({{ isset($setting) ? $setting->config_image:'' }});">
    <div class="IMGES_01"><img src="{{ asset('images/SOG-10.png') }}" alt="達盛興驗車保養新竹監理所指定汽車檢驗廠商" /></div>
</div>
<div id="news_text">
    <h2 class="h2_GJ">監理單位最新消息</h2>
    @if(isset($news))
        @foreach($news as $item)
            <div class="nwes_box" ><a href="{{ route('tw.news_content',$item->id) }}">
                <img src="{{ asset('images/NEWS_PLUS.png') }}" alt="" width="32" height="31" />
                <h3>{{ str_limit($item->title,30,'...') }}</h3>
                <p>{{ str_limit($item->content,200,'...') }}</p>
                <h4>{{ $item->publish_at }}</h4></a>
            </div>
        @endforeach
    @endif
</div>
<div id="main_left">
    <h2 class="h2_GJ">服務項目</h2>
    @if(isset($services))
        @foreach($services as $service)
        <div class="service_box">
            <img src="{{ $service->image ?:'' }}" width="86" height="86" alt="{{ $service->title }}" />
            <h3>{{ $service->title }}</h3>
            <p>{{ $service->content }}</p>
        </div>
        @endforeach
    @endif
</div>
<div id="banner">
    <h2 class="h2_GJ_2">鈑金烤漆車輛維修價格資訊</h2>
    @if(isset($setting))
        @foreach(unserialize($setting->config_ad_image) as $value)
            <img src="{{ $value }}" alt="" width="200" height="200" />
        @endforeach
    @endif
</div>

<div id="main_right">
    <div class="ABOUT_TOP">
        <h1 class="h2_GJ">關於達盛興汽車</h1>
        <p>{{ isset($setting)? $setting->config_info:'' }}</p>
    </div>

    <div class="ABOUT_LEFT">
    <p>公司服務項目：</p>
        <ul>
            <li>車輛定期檢驗及監理業務常識。</li>
            <li>汽車保養、維修、鈑金、烤漆及電機之優惠辦法與費用諮詢。</li>
            <li>汽車保險簡介、理賠服務及諮詢。</li>
            <li>中古車行情諮詢及買賣。</li>
            <li>設立日期：1989年6月24日</li>
        </ul>
        <p>
            廠址：{{ isset($setting)? $setting->config_address:'' }}<br />
            電話：{{ isset($setting)? $setting->config_phone:'' }}<br />
            傳真：{{ isset($setting)? $setting->config_fax:'' }}<br />
            email：{{ isset($setting)? $setting->config_email:'' }}  <br />
        </p>
    </div>
    <div class="MAP">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1810.9476418887818!2d121.00585120058112!3d24.799038998593105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3468366bc4834429%3A0x431a626340d7d181!2z6YGU55ub6IiI5rG96LuK!5e0!3m2!1szh-TW!2stw!4v1523126371309" width="100%" height="256" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>
@endsection