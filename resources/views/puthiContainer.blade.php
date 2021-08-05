@extends('layouts.app')

@section('content')
@if ($agent -> isMobile())
{{-- @include('mobile.tilemenu') --}}
<mobile-container :uxmenu="uxmenu" :containers="uxmeta.containers" :panels="uxmeta.panels" :cards="uxmeta.cards" v-on:huntbooks="loadUXmeta" v-on:homepage="loadUXmeta" v-on:showdetail="loadUXmeta" v-on:updatelang="loadUXmenu" v-on:addtocart="addToCart" v-on:loaddetailfunction="loadDTLfnct" :category="categorypage" ></mobile-container>
@else
{{--  <welcome-menu homeRoute="{{ url('#') }}" libregisterform="{{ route('libregisterform') }}" ></welcome-menu>  --}}
{{-- <select-multiple> </select-multiple> --}}
{{-- @include('megaMenu') --}}
{{-- @include('slideWithCaption') --}}
{{-- @include('desktop.basepanel') --}}
{{-- <welcome-menu></welcome-menu> --}}
{{-- <app id="appNewArrival" :appdata="appjs" class="new-book-row" name="a"> </app> --}}
<super-container :uxmenu="uxmenu" :containers="uxmeta.containers" :panels="uxmeta.panels" :cards="uxmeta.cards" v-on:huntbooks="loadUXmeta" v-on:homepage="loadUXmeta" v-on:showdetail="loadUXmeta" v-on:updatelang="loadUXmenu" v-on:addtocart="addToCart" v-on:loaddetailfunction="loadDTLfnct"></super-container>

@endif
@stop
