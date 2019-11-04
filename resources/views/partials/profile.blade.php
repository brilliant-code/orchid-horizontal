<div class="dropdown p-0">
    <a href="#" class="align-items-center v-center p-2" data-toggle="dropdown">
        <span class="mr-3 text-white" style="font-size: 0.95em;">
            <span class="text-ellipsis text-capitalize">{{ Auth::user()->getNameTitle() }}</span>
        </span>
        <img src="{{ Auth::user()->getAvatar() }}" class="b b-dark bg-light" style="width: 25px;">
    </a>
    <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow bg-white">

        {!! Dashboard::menu()->render('Profile','platform::partials.dropdownMenu') !!}

        @if(Dashboard::menu()->container->where('location','Profile')->isNotEmpty())
            <div class="dropdown-divider"></div>
        @endif

        @if(Auth::user()->hasAccess('platform.systems.index'))
            <a href="{{ route('platform.systems.index') }}" class="dropdown-item">
                <i class="icon-settings m-r-xs" aria-hidden="true"></i>
                <span>{{ __('Systems') }}</span>
            </a>
        @endif

        @if(\Orchid\Access\UserSwitch::isSwitch())
            <a href="#"
               class="dropdown-item"
               data-controller="layouts--form"
               data-action="layouts--form#submitByForm"
               data-layouts--form-id="return-original-user"
            >
                <i class="icon-logout m-r-xs" aria-hidden="true"></i>
                <span>{{ __('Back to my account') }}</span>
            </a>
            <form id="return-original-user"
                  class="hidden"
                  data-controller="layouts--form"
                  data-action="layouts--form#submit"
                  action="{{ route('platform.switch.logout') }}"
                  method="POST">
                @csrf
            </form>
        @else
            <a href="{{ route('platform.logout') }}"
               class="dropdown-item"
               data-controller="layouts--form"
               data-action="layouts--form#submitByForm"
               data-layouts--form-id="logout-form"
               dusk="logout-button">
                <i class="icon-logout m-r-xs" aria-hidden="true"></i>
                <span>{{ __('Sign out') }}</span>
            </a>
            <form id="logout-form"
                  class="hidden"
                  action="{{ route('platform.logout') }}"
                  method="POST"
                  data-controller="layouts--form"
                  data-action="layouts--form#submit"
            >
                @csrf
            </form>
        @endif

    </div>
</div>
