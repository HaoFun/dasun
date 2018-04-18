@if(Auth::check())
    <li class="{{ active_class(active_route_check('admin.setting')) }}"><a role="ajax" href="{{ route('admin.setting.edit') }}">Setting</a></li>
    <li class="{{ active_class(active_route_check('admin.user')) }}"><a role="ajax" href="{{ route('admin.user.index') }}">User</a></li>
    <li class="{{ active_class(active_route_check('admin.news')) }}"><a role="ajax" href="{{ route('admin.news.index') }}">News</a></li>
    <li class="{{ active_class(active_route_check('admin.banner')) }}"><a role="ajax" href="{{ route('admin.banner.index') }}">Banner</a></li>
    <li class="{{ active_class(active_route_check('admin.module')) }}"><a role="ajax" href="{{ route('admin.module.index') }}">Module</a></li>
    <li class="{{ active_class(active_route_check('admin.question')) }}"><a role="ajax" href="{{ route('admin.question.index') }}">Question</a></li>
@endif