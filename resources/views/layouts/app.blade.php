<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@if ($agent -> isMobile())
{{-- @include('layouts.mobile.app') --}}
@include('layouts.desktop.app')
@else
@include('layouts.desktop.app')
@endif
</html>
