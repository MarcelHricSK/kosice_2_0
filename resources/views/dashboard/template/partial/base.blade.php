<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8"/>
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="robots" content="noindex, nofollow">
  <link rel="canonical" href="{{ config('app.url') . 'base.blade.php/' }}"/>
  <link rel="prefetch" href="{{ asset('media/logo.svg') }}"/>
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}"/>
  <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
  @yield('head', '')
</head>
<body class="@yield('class_body', 'body')">
<div class="overlay hidden"></div>
@yield('content')
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts_body', '')
</body>
</html>
