<!DOCTYPE html>
<html lang="{{  app()->getLocale() }}" data-controller="layouts--html-load">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','ORCHID') - @yield('description','Admin')</title>
    <meta name="csrf_token" content="{{  csrf_token() }}" id="csrf_token" data-turbolinks-permanent>
    <meta name="auth" content="{{  Auth::check() }}"  id="auth" data-turbolinks-permanent>
    @if(file_exists(public_path('/css/orchid/orchid.css')))
        <link rel="stylesheet" type="text/css" href="{{  mix('/css/orchid/orchid.css') }}">
    @else
        <link rel="stylesheet" type="text/css" href="{{  orchid_mix('/css/orchid.css','orchid') }}">
    @endif

    @stack('head')

    <meta name="turbolinks-root" content="{{  Dashboard::prefix() }}">
    <meta name="dashboard-prefix" content="{{  Dashboard::prefix() }}">

    <script src="{{ orchid_mix('/js/manifest.js','orchid') }}" type="text/javascript"></script>
    <script src="{{ orchid_mix('/js/vendor.js','orchid') }}" type="text/javascript"></script>
    <script src="{{ orchid_mix('/js/orchid.js','orchid') }}" type="text/javascript"></script>

    @foreach(Dashboard::getResource('stylesheets') as $stylesheet)
        <link rel="stylesheet" href="{{  $stylesheet }}">
    @endforeach

    @stack('stylesheets')

    @foreach(Dashboard::getResource('scripts') as $scripts)
        <script src="{{  $scripts }}" defer type="text/javascript"></script>
    @endforeach
</head>

<body>

<div class="app row m-n" id="app" data-controller="@yield('controller')" @yield('controller-data')>
    <div class="container">
        <div class="row">
            <aside class="col-lg-12 bg-dark d-flex justify-content-between align-items-baseline p-0">
                @includeIf(config('platform.template.header','platform::header'))
                @includeWhen(Auth::check(), 'platform::partials.profile')
            </aside>
            <nav class="col-lg-12 navbar navbar-icon-top navbar-expand-lg navbar-light bg-gray">
                @yield('body-left')
            </nav>

            <div class="col-md col-xl col-xxl-9 bg-white b-r box-shadow-lg no-padder min-vh-100">
                @yield('body-right')
            </div>
        </div>
    </div>

    @include('platform::partials.toast')
</div>

@stack('scripts')

</body>
</html>
