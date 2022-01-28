@extends('layouts.base')

@section('body')
    <x-header/>
    @yield('content')
    <x-footer/>
    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
