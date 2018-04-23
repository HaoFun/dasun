@if(Auth::check())
    <li class="nav-list {{ active_class(active_route_check('admin.setting')) }}"><a role="ajax" href="{{ route('admin.setting.edit') }}"><i class="fa fa-pencil-square-o fa-fw"></i>設定</a></li>
    <li class="nav-list {{ active_class(active_route_check('admin.user')) }}"><a role="ajax" href="{{ route('admin.user.index') }}"><i class="fa fa-users fa-fw"></i>管理者</a></li>
    <li class="nav-list {{ active_class(active_route_check('admin.news')) }}"><a role="ajax" href="{{ route('admin.news.index') }}"><i class="fa fa-newspaper-o fa-fw"></i>最新消息</a></li>
    <li class="nav-list {{ active_class(active_route_check('admin.banner')) }}"><a role="ajax" href="{{ route('admin.banner.index') }}"><i class="fa fa-picture-o fa-fw"></i>橫幅圖</a></li>
    <li class="nav-list {{ active_class(active_route_check('admin.module')) }}"><a role="ajax" href="{{ route('admin.module.index') }}"><i class="fa fa-database fa-fw"></i>模板管理</a></li>
    <li class="nav-list {{ active_class(active_route_check('admin.question')) }}"><a role="ajax" href="{{ route('admin.question.index') }}"><i class="fa fa-question-circle  fa-fw"></i>檢驗問答</a></li>
    <li class="nav-list {{ active_class(active_route_check('admin.service')) }}"><a role="ajax" href="{{ route('admin.service.index') }}"><i class="fa fa-product-hunt fa-fw"></i>服務項目</a></li>
    <li class="nav-list"><a target="_blank" href="{{ url('/') }}"><i class="fa fa-home fa-fw"></i>首頁</a></li>
@endif