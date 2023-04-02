@extends('client.template.partial.base')

@section('class_body')body has-header{{ '' }}@yield('class_body')@overwrite

@section('content')
  @include('client.template.partial.header')
  @yield('content')
@overwrite
