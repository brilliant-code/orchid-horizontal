@isset($title)
    <li class="nav-item m-t">
        <div class="hidden-folded padder m-t-xs m-b-xs text-muted text-xs m-l">{{ __($title) }}</div>
    </li>
@endisset
    <li class="nav-item @isset($active) {{active($active)}} @endisset">
        <a class="nav-link"
            @if (!empty($childs))
                href="#menu-{{$slug}}" data-toggle="collapse"
            @else
                href="{{$route ?? '#'}}"
            @endif
        >

            <i class="fa {{$icon}}">
                @isset($badge)
                    <b class="badge {{$badge['class']}}">{{$badge['data']()}}</b>
                @endisset
            </i>
            {{ __($label) }}
        </a>
        @if($childs)
            <div class="collapse sub-menu {{active($active,'show')}}" id="menu-{{$slug}}" data-parent="#headerMenuCollapse">
                {!! Dashboard::menu()->render($slug,'platform::partials.dropdownMenu') !!}
            </div>
        @endif
    </li>
@if($divider)
    <li class="divider b-t b-dark"></li>
@endif
{{-- @endif --}}
