@extends('dashboard.template.partial.base')

@section('class_body')body has-header has-sidemenu{{ '' }}@yield('class_body')@overwrite

@section('content')
  @include('dashboard.template.partial.header')
  @include('dashboard.template.partial.sidemenu')
  @include('dashboard.template.partial.drawer')
  @yield('content')
@overwrite
