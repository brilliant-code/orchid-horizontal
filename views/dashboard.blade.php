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
        <ul class="navbar-nav mr-auto">
            {!! Dashboard::menu()->render('Main') !!}
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
            @include('platform::partials.alert')
            @yield('content')
        </div>
    </div>
@endsection