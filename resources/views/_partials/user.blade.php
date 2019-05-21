<div class="dropdown">
    <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
        @auth
            <img class="avatar" src="http://www.gravatar.com/avatar/{{ md5(strtolower(trim(Auth::user()->email))) }}?s=60">
        @elseauth
            <span class="avatar"></span>
        @endauth
        <span class="ml-2 d-none d-lg-block">
            <span class="text-default">{{ $user->username }}</span>
            <small class="text-muted d-block mt-1">
             @auth
                {{ Auth::user()->name }}
             @elseauth()
                @lang('tabler::user.user')
             @endauth
            </small>
        </span>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
        <a class="dropdown-item" href="{!! url(config('tabler.urls.profile')) !!}">
            <i class="dropdown-icon fe fe-user"></i> @lang('tabler::user.profile')
        </a>
        <a class="dropdown-item" href="{!! url(config('tabler.urls.settings')) !!}">
            <i class="dropdown-icon fe fe-settings"></i> @lang('tabler::user.settings')
        </a>
        <a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" id="logout-button">
            <i class="dropdown-icon fe fe-log-out"></i> @lang('tabler::user.logout')
        </a>
        <form id="logout-form" action="{!! url(config('tabler.urls.logout')) !!}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>