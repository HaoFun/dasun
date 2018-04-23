@if(isset($modules))
    @foreach($modules as $module)
        <li><a href="{{ url($module->url) }}" class="{{ active_class($module->url === substr(parse_url($_SERVER['REQUEST_URI'])['path'],1),'menu_border') }}">{{ $module->name }}</a></li>
    @endforeach
@endif
<li><a href="mailto:{{ isset($setting) ? $setting->config_email:'' }}">聯絡我們</a></li>