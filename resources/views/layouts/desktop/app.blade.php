<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{{ asset('./storage/logos/favicon.png') }}}">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

  <title>{{ config('app.name', 'পুঁথিবিদ্যা-') }}</title>
  {{-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> --}}
  <script src="{{ asset('js/appDesktop.js') }}" defer></script>
  <link href="{{ asset('css/appDesktop.css') }}" rel="stylesheet">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
</head>
<body>
  <div id="root">
    @if ($agent -> isMobile())
      <ul class="nav mobileloginlink fixed-bottom">
        @guest
          <li class="nav-item">
            <a class="nav-link"  href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          <li class="nav-item">
            @if (Route::has('register'))
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
          </li>
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
      @endguest
    </ul>
  @else
    <ul class="breaking-news">
      <homecontacthelp-nav v-on:helppage="loadUXmeta"></homecontacthelp-nav>
      <ul class="news">
        <a class="news_link" href="/">
          <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
          Book Your Success!
        </a>
      </ul>
      <ul class="nav loginlink">
        @guest
          <li class="nav-item">
            <a class="nav-link"  href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          <li class="nav-item">
            @if (Route::has('register'))
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
          </li>
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
      @endguest
    </ul>
  </ul>
@endif
{{-- <breaking-news></breaking-news> --}}
{{-- <main class="my-p4"> --}}
{{-- <div>
<ul class="navbar-nav mr-auto">
@guest
<li class="nav-item">
<router-link to="/cards" class="nav-link"><i class="fa fa-fw fa-book" aria-hidden="true"></i> {{ __('পুঁথিবাজার') }}</router-link>
</li>
<li class="mega-dropdown">
<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-university"></i>{{ __('পুঁথিলয়') }} <span class="caret"></span></a>
<ul class="dropdown-menu mega-dropdown-menu">
<li class="column">
<ul>
<li class="dropdown-header">Book Collection</li>
<li class="divider"></li>
<li><a href="{{ url('books/favorite') }}"> {{ __('সব ধরনের বই')}} <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
</ul>
</li>
<li class="column">
<ul>
<li class="dropdown-header">{{ __('Sale Available') }}</li>
<li class="divider"></li>
<li><a href="#"> {{ __('সমকালীন-উপন্যাস') }} <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
<li><a href="#"> {{ __('সাহিত্য') }} <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
<li><a href="#"> {{ __('সমকালীন গল্প') }} <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
<li><a href="#"> {{ __('পাঠ্য বই') }} <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
</ul>
</li>

<li class="column">
<ul>
<li class="dropdown-header">Feature Books</li>
<li class="divider"></li>
<li><a href="#"> {{ __('শিশু-কিশোরঃ রহস্য, গোয়েন্দা') }} <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
<li><a href="#"> {{ __('রোমাঞ্চকর') }} <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
<li><a href="#"> {{ __('কবিতা সমগ্র/সংকলন') }} <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
<li><a href="#"> {{ __('নানাদেশ ও ভ্রমণ') }} <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
<li class="divider"></li>
</ul>
</li>
<li class="column">
<ul>
<li class="dropdown-header">Online Books</li>
<li><a href="#">Computer Science </a></li>
<li><a href="#">Electrical Engineering</a></li>
<li><a href="#">Mathematics</a></li>
<li><a href="#">Architecture</a></li>
</ul>
</li>
</ul>
</li>
<li class="nav-item">
<a class="nav-link"  href="{{ url('books/offers') }}"><i class="fas fa-book-reader"></i>  {{ __('পাঠক কর্নার') }}</a>
</li>
<li class="nav-item">
<a class="nav-link"  href="{{ url('books/publishers') }}"> <i class="fa fa-user" aria-hidden="true"></i> {{ __('পুঁথিকার') }}</a>
</li>
<li class="nav-item">
<a class="nav-link"  href="{{ url('contactus') }}">{{ __('প্রকাশনা অধ্যায়') }}</a>
</li>
@if (Route::has('register')==false)

@endif
@else
<li class="nav-item">
<a class="nav-link"  href="{{ url('books') }}">{{ __('Books') }}</a>
</li>
<li class="nav-item">
<a class="nav-link"  href="{{ url('authors') }}">{{ __('Authors') }}</a>
</li>
<li class="nav-item">
<a class="nav-link"  href="{{ url('publishers') }}">{{ __('Publishers') }}</a>
</li>
<li class="nav-item">
<a class="nav-link"  href="{{ url('reviewers') }}">{{ __('Reviewers') }}</a>
</li>
<li class="nav-item">
<a class="nav-link"  href="{{ url('buyers') }}">{{ __('Buyers') }}</a>
</li>
<li class="nav-item">
<a class="nav-link"  href="{{ url('orders') }}">{{ __('Orders') }}</a>
</li>
<li class="nav-item">
<a class="nav-link"  href="{{ url('categories') }}">{{ __('Categories') }}</a>
</li>
<li class="nav-item">
<a class="nav-link"  href="{{ url('users') }}">{{ __('Users') }}</a>
</li>
@endguest
</ul>
</div> --}}
{{-- <div class="container-fluid center"> --}}
{{-- <breaking-news></breaking-news> --}}
<div class="cd-cart cd-cart--empty js-cd-cart">
  <a href="#0" class="cd-cart__trigger text-replace">
    <ul class="cd-cart__count"> <!-- cart items count -->
      <li>0</li>
      <li>0</li>
    </ul> <!-- .cd-cart__count -->
  </a>

  <div class="cd-cart__content">
    <div class="cd-cart__layout">
      <header class="cd-cart__header">
        <h2>Cart</h2>
        <span class="cd-cart__undo">Item removed. <a href="#0">Undo</a></span>
      </header>

      <div class="cd-cart__body">
        <ul>
          <!-- products added to the cart will be inserted here using JavaScript -->
        </ul>
      </div>

      <footer class="cd-cart__footer">
        <a href="#0" class="cd-cart__checkout">
          <em>Checkout - ৳ <span>0</span> Only
            <svg class="icon icon--sm" viewBox="0 0 24 24" width="24px" height="24px" ><g fill="none" stroke="currentColor"><line stroke-width="2" stroke-linecap="round" stroke-linejoin="round" x1="3" y1="12" x2="21" y2="12"/><polyline stroke-width="2" stroke-linecap="round" stroke-linejoin="round" points="15,6 21,12 15,18 "/></g>
            </svg>
          </em>
        </a>
      </footer>
    </div>
  </div>
</div>
@yield('content')

{{-- </div> --}}
{{-- </main> --}}
{{-- <footer>
<small>&copy; Copyright 2019 Puthibidda.com</small>
</footer> --}}
</div>
</body>
