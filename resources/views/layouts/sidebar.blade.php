@if(Auth::check())
    <li class="{{ active_class(active_route_check('admin.news')) }}"><a role="ajax" href="{{ route('admin.news.index') }}">News</a></li>
    <li class="{{ active_class(active_route_check('admin.setting')) }}"><a role="ajax" href="{{ route('admin.setting.edit',1) }}">Setting</a></li>
    <li class="{{ active_class(active_route_check('admin.banner')) }}"><a role="ajax" href="{{ route('admin.banner.index') }}">Banner</a></li>
@endif