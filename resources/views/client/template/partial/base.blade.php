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
  <script src="https://cdn.jsdelivr.net/npm/@turf/turf@6/turf.min.js"></script>
  <script src="https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js"></script>
  <link
    href="https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css"
    rel="stylesheet"
  />
  <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
  <link href="{{ asset('css/client.css') }}" rel="stylesheet" type="text/css"/>
  <style>
    .marker {
      background-image: url("{{ asset('media/marker-position.png') }}");
      background-size: cover;
      width: 24px;
      height: 24px;
      cursor: pointer;
      opacity: 0.8 !important;
      transition: width 0.5s, height 0.5s, opacity 0.5s;
    }

    .marker:hover, .marker--active {
      width: 40px;
      height: 40px;
      opacity: 1 !important;
      z-index: 97;
    }

    .marker--education {
      background-image: url("{{ asset('media/education.png') }}");
    }

    .marker--transport {
      background-image: url("{{ asset('media/trafic.png') }}");
    }
    .marker--healthcare {
      background-image: url("{{ asset('media/medical.png') }}");
    }
    .marker--market {
      background-image: url("{{ asset('media/groceries.png') }}");
    }
    .marker--restaurant {
      background-image: url("{{ asset('media/food.png') }}");
    }
    .marker--park, .marker--fitness, .marker--playground {
      background-image: url("{{ asset('media/entertainment.png') }}");
    }
    .marker--package_box, .marker--postoffice {
      background-image: url("{{ asset('media/social.png') }}");
    }
  </style>
  @yield('head', '')
</head>
<body class="@yield('class_body', 'body')">
<div class="overlay hidden"></div>
@yield('content')
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts_body', '')
</body>
</html>
