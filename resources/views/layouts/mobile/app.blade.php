<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{{ asset('./storage/logos/favicon.png') }}}">
  {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> --}}
  <title>{{ config('app.name', 'পুঁথিবিদ্যা-') }}</title>

{{--   <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
 --}}
<script src="{{ asset('js/appMobile.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="{{ asset('css/appMobile.css') }}" rel="stylesheet">
  {{-- <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> --}}
  
  <style rel="stylesheet">
@import url(https://fonts.googleapis.com/css?family=Montserrat);

* {
    margin: 0;
    padding: 0;
}

html {
    height: 100%;
    background: #243165; /* fallback for old browsers */
    background: -webkit-linear-gradient(to left, #243165, #2a0845); /* Chrome 10-25, Safari 5.1-6 */
}

body {
    font-family: 'AdorshoLipi', Arial, 'Open Sans',sans-serif !important;
    background: transparent;
}

/*form styles*/
#msform {
    text-align: center;
    position: relative;
    margin-top: 5px;
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0px;
    box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
    padding: 15px 20px;
    box-sizing: border-box;
    width: 90%;
    margin: 0 5%;

    /*stacking fieldsets above each other*/
    position: relative;
}

/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
    display: none;
}

/*inputs*/
#msform input, #msform textarea {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 5px;
    width: 100%;
    max-height: 48px;
    box-sizing: border-box;
    color: #2C3E50;
    font-size: 15px;
}

#msform input:focus, #msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #ee0979;
    outline-width: 0;
    transition: All 0.5s ease-in;
    -webkit-transition: All 0.5s ease-in;
    -moz-transition: All 0.5s ease-in;
    -o-transition: All 0.5s ease-in;
}

/*buttons*/
#msform .action-button {
    width: 100px;
    background: #ee0979;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 25px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
}

#msform .action-button:hover, #msform .action-button:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #ee0979;
}

#msform .action-button-previous {
    width: 100px;
    background: #C5C5F1;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 25px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
}

#msform .action-button-previous:hover, #msform .action-button-previous:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #C5C5F1;
}

/*headings*/
.fs-title {
    font-size: 18px;
    text-transform: uppercase;
    color: #2C3E50;
    margin-bottom: 10px;
    letter-spacing: 2px;
    font-weight: bold;
}

.fs-subtitle {
    font-weight: normal;
    font-size: 13px;
    color: #666;
    margin-bottom: 20px;
}

/*progressbar*/
#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    /*CSS counters to number the steps*/
    counter-reset: step;
}

#progressbar li {
    list-style-type: none;
    color: white;
    text-transform: uppercase;
    font-size: 9px;
    width: 33.33%;
    float: left;
    position: relative;
    letter-spacing: 1px;
}

#progressbar li:before {
    content: counter(step);
    counter-increment: step;
    width: 24px;
    height: 24px;
    line-height: 26px;
    display: block;
    font-size: 12px;
    color: #333;
    background: white;
    border-radius: 25px;
    margin: 0 auto 10px auto;
}

/*progressbar connectors*/
#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: white;
    position: absolute;
    left: -50%;
    top: 9px;
    z-index: -1; /*put it behind the numbers*/
}

#progressbar li:first-child:after {
    /*connector not needed before the first step*/
    content: none;
}

/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before, #progressbar li.active:after {
    background: #ee0979;
    color: white;
}


/* Not relevant to this form */
.dme_link {
    margin-top: 30px;
    text-align: center;
}
.dme_link a {
    background: #FFF;
    font-weight: bold;
    color: #ee0979;
    border: 0 none;
    border-radius: 25px;
    cursor: pointer;
    padding: 5px 25px;
    font-size: 12px;
}

.dme_link a:hover, .dme_link a:focus {
    background: #C5C5F1;
    text-decoration: none;
}
    .grid-container {
      display: grid;
      grid-template-columns: auto auto auto;
      grid-gap: 5px;
      background-color: #eee;
      padding: 5px;
    }

    .grid-container > div {
      background-color: rgba(255, 255, 255, 0.8);
      text-align: center;
      padding: 10px 0;
      font-size: 25px;
      color: #09a370;
    }

    .item1 {
      grid-column-start: 1;
      grid-column-end: 3;
    }
     .item6 {
      grid-column-start: 1;
      grid-column-end: 4;
    }
    .item7 {
     color: #f9a370;
      grid-column-start: 1;
      grid-column-end: 4;
    }

    .item8 {
      grid-column-start: 1;
      grid-column-end: 4;
    }

    .logo {
     position: absolute;
     bottom: .2em;
     left: 1em;
   }
   .navbar-laravel {
    background:#eee;
    position: absolute;
    z-index: 100;
    left: 0;
    right: 0;
    padding-left:70px;
  }

  .basecontainer{
    margin: 70px auto;
  }
  #pagecategory{
    align:center;
    display: none;
    top:5px;
    width:100%;
    padding: 20px;
    text-align: center;
  }
  #book-search-form {
    background: #e1e1e1; /* Fallback color for non-css3 browsers */
    max-width: 85%;
    /* Gradients */
    background: -webkit-gradient( linear,left top, left bottom, color-stop(0, rgb(243,243,243)), color-stop(1, rgb(225,225,225)));
    background: -moz-linear-gradient( center top, rgb(243,243,243) 0%, rgb(225,225,225) 100%);

    /* Rounded Corners */
    border-radius: 17px;
    -webkit-border-radius: 17px;
    -moz-border-radius: 17px;

    /* Shadows */
    box-shadow: 1px 1px 2px rgba(0,0,0,.3), 0 0 2px rgba(0,0,0,.3);
    -webkit-box-shadow: 1px 1px 2px rgba(0,0,0,.3), 0 0 2px rgba(0,0,0,.3);
    -moz-box-shadow: 1px 1px 2px rgba(0,0,0,.3), 0 0 2px rgba(0,0,0,.3);
  }
  /*** TEXT BOX ***/
  .book-search{
    background: #fafafa; /* Fallback color for non-css3 browsers */

    /* Gradients */
    background: -webkit-gradient( linear, left bottom, left top, color-stop(0, rgb(250,250,250)), color-stop(1, rgb(230,230,230)));
    background: -moz-linear-gradient( center top, rgb(250,250,250) 0%, rgb(230,230,230) 100%);
    border: 0;
    border-bottom: 1px solid #fff;
    border-right: 1px solid rgba(255,255,255,.8);
    font-size: 14px;
    margin: 2px;
    padding: 3px 10px;
    width: 85%;

    /* Rounded Corners */
    border-radius: 17px;
    -webkit-border-radius: 17px;
    -moz-border-radius: 17px;

    /* Shadows */
    box-shadow: -1px -1px 2px rgba(0,0,0,.3), 0 0 1px rgba(0,0,0,.2);
    -webkit-box-shadow: -1px -1px 2px rgba(0,0,0,.3), 0 0 1px rgba(0,0,0,.2);
    -moz-box-shadow: -1px -1px 2px rgba(0,0,0,.3), 0 0 1px rgba(0,0,0,.2);
  }

  /*** USER IS FOCUSED ON TEXT BOX ***/
  .book-search:focus{
    outline: none;
    background: #fff; /* Fallback color for non-css3 browsers */
    border-bottom: 2px solid #85CC46;
    border-right: 1px solid #85CC46;
    /* Gradients */
    background: -webkit-gradient( linear, left bottom, left top, color-stop(0, rgb(255,255,255)), color-stop(1, rgb(235,235,235)));
    background: -moz-linear-gradient( center top, rgb(255,255,255) 0%, rgb(235,235,235) 100%);
  }
  #book-search-form:hover >  #filtersubmit{
    color: red;
  }
  #filtersubmit {
    position: relative;
    z-index: 1;
    bottom: 1px;
    top: 1px;
    color: #7B7B7B;
    cursor:pointer;
    text-align: center;
    width: 5%;
  }
  footer{
    position: relative;
    position:flex;
    width: 100%;
    color:#333;
    text-align: center;
  }
.has-error
  {
   border-color:#cc0000;
   background-color:#ffff99;
  }

</style>
</head>
<body>
  <div id="root">
    <div class="breaking-news">
      <div class="news">
        <a class="news_link" href="https://puthibidda.com">
          <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
          Book Your Success!
        </a>
      </div>
      <ul class="nav" style="top:0; right:0;position:absolute;padding:0;margin:0">
        <!-- Authentication Links -->
{{--         @guest
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
      @endguest --}}
    </ul>
  </div>
  <nav class="navbar navbar-light navbar-laravel ">
    <div class="container-fluid">
      <a class="navbar-brand logo" href="{{ url('/') }}">
        {{ Html::image('storage/logos/logoshort.png','image alt title',['width'=>'48','height'=>'48']) }}
        {{-- {{ config('app.name', 'Laravel') }} --}}
      </a>
      <form id="book-search-form" >
        <input type="text" id="book_search_input" class="book-search"/>
        <i id="filtersubmit" class="fa fa-search"></i>
      </form>
      {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button> --}}
      {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> --}}
        <!-- Left Side Of Navbar -->


        <!-- Right Side Of Navbar -->
      {{-- </div> --}}
    </div>
  </nav>
<main class="my-p4">
  <div class="basecontainer center">
    @yield('content')
  </div>
</main>
</div>
<footer>
  <small>&copy; Copyright 2019 Puthibidda.com</small>
</footer>
</body>