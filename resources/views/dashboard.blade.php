@extends('platform::app')

@section('body-left')
    <button class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            {!! Dashboard::menu()->render('Main') !!}
        </ul>
        <ul class="navbar-nav ml-auto">
            {!! Dashboard::menu()->render('Right') !!}
        </ul>
    </div>
@endsection

@section('body-right')
    <div class="bg-dark text-light @hasSection('navbar') @else d-none d-md-block @endif">
        <ul class="nav justify-content-between command-bar align-items-baseline">
            @yield('navbar')

            @if (Breadcrumbs::exists())
                {{ Breadcrumbs::view('platform::partials.breadcrumbs') }}
            @endif
        </ul>
    </div>


    <div class="d-flex">
        <div class="app-content-body" id="app-content-body">
            <div class="wrapper pb-0">
                @hasSection('title')
                    <h1 class="m-n font-thin h3 text-black">@yield('title')</h1>
                @endif
                @hasSection('description')
                    <small class="text-muted text-ellipsis">@yield('description')</small>
                @endif
            </div>
            <div class="mt-2">
                @include('platform::partials.alert')
            </div>
            @yield('content')
        </div>
    </div>
@endsection
