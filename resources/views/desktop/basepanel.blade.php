<div class="baseaccordian">
  <ul class="baseul">
    <li class="baseli" id="_book_newarrival" style="background: url('/storage/logos/fp_newarrivals.jpg');height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover; ">
      <div class="baseimage_title">
        <a href="#">{{ __('সাম্প্রতিক সংখ্যা') }}</a>
      </div>
      <app id="appNewArrival" :appdata="appjs" class="new-book-row" name="a"> </app>

      <!-- <todays-special></todays-special> -->
    </li>
    <li class="baseli" id="_book_allcategories" style="background: url('/storage/logos/fp_categories.jpg');height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">
      <div class="baseimage_title">
        <a  href="#">{{ __('সব ধরনের বই') }}</a>
        <div id="selectedBookList">
          <div style="display:inline-block" class="categoryScroller scroller-prev" >{{ Html::image('storage/images/prevCategory.png','image alt title',['width'=>'51','height'=>'51']) }}</div>
          <a style="display:inline-block" class="nav-pills" href="#">{{ __('ছোট গল্প' ) }}</a>
          <div style="display:inline-block" class="categoryScroller scroller-next" >{{ Html::image('storage/images/nextCategory.png','image alt title',['width'=>'51','height'=>'51']) }}</div>
        </div>

      </div>
      <app :books="books" class="book-row" name="b" style="bottom:50px; display:absolute;"></app>
      <div id="bookcategorytab" class="card text-white bg-dark mb-3 col-xl-12">
        <div id="tabs" class="row">
          <div class="nav nav-pills" id="nav-tab" role="tablist" style="writing-mode:tb-rl" >
            <a class="nav-item nav-link active" id="nav-tab1" style="writing-mode:rl-tb"  data-toggle="tab" href="#nav-t1" role="tab" aria-controls="nav-t1" aria-selected="true">পাঠ্য বই</a>
            <a class="nav-item nav-link" id="nav-tab2" data-toggle="tab" href="#nav-t2" style="writing-mode:rl-tb" role="tab" aria-controls="nav-t2" aria-selected="false">শিশু-কিশোরঃ রহস্য, গোয়েন্দা</a>
            <a class="nav-item nav-link" id="nav-tab3" data-toggle="tab" href="#nav-t3" style="writing-mode:rl-tb" role="tab" aria-controls="nav-t3" aria-selected="false">সমকালীন-উপন্যাস</a>
            <a class="nav-item nav-link" id="nav-tab4" data-toggle="tab" href="#nav-t4" style="writing-mode:rl-tb" role="tab" aria-controls="nav-t4" aria-selected="false">সাহিত্য</a>
            <a class="nav-item nav-link" id="nav-tab5" data-toggle="tab" href="#nav-t5" style="writing-mode:rl-tb" role="tab" aria-controls="nav-t5" aria-selected="false">রোমাঞ্চকর</a>
            <a class="nav-item nav-link" id="nav-tab6" data-toggle="tab" href="#nav-t6" style="writing-mode:rl-tb" role="tab" aria-controls="nav-t6" aria-selected="false">চিরায়ত-উপন্যাস</a>
            <a class="nav-item nav-link" id="nav-tab7" data-toggle="tab" href="#nav-t7" style="writing-mode:rl-tb" role="tab" aria-controls="nav-t7" aria-selected="false">সমকালীন গল্প</a>
            <a class="nav-item nav-link" id="nav-tab8" data-toggle="tab" href="#nav-t8" style="writing-mode:rl-tb" role="tab" aria-controls="nav-t8" aria-selected="false">উপন্যাস সমগ্র</a>
            <a class="nav-item nav-link" id="nav-tab9" data-toggle="tab" href="#nav-t9" style="writing-mode:rl-tb" role="tab" aria-controls="nav-t9" aria-selected="false">কবিতা সমগ্র/সংকলন</a>
            <a class="nav-item nav-link" id="nav-tab10" data-toggle="tab" href="#nav-t10" style="writing-mode:rl-tb" role="tab" aria-controls="nav-t10" aria-selected="false">নানাদেশ ও ভ্রমণ</a>
            <a class="nav-item nav-link" id="nav-tab11" data-toggle="tab" href="#nav-t11" style="writing-mode:rl-tb" role="tab" aria-controls="nav-t11" aria-selected="false">শিশু কিশোর উপন্যাস</a>
          </div>
        </div>
      </div>
      <div id="specialbookcategory">
        <div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-success">বেষ্ট সেলার বই</button>
          <div class="dropdown-menu" right split text="বিদেশী বই">
            <a class="dropdown-item" href="#">ইরানি বই</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">পশ্চিমবঙ্গের বই</a>
            <a class="dropdown-item" href="#">ব্রিটিশ</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"> আমেরিকান</a>
          </div>
          <div class="dropdown">
            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              বইমেলা ২০১৯
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <a class="dropdown-item" href="#">বইমেলা ২০১৮</a>
              <a class="dropdown-item" href="#">বইমেলা ২০১৭</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">বইমেলা ২০১৬</a>
            </div>
          </div>
          <div class="dropdown">
            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              ধর্মীয় বই
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
              <a class="dropdown-item" href="#">ইসলামী পুস্তক</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">হিন্দু ধর্মগ্রন্থ</a>
              <a class="dropdown-item" href="#">বাইবেল</a>
            </div>
          </div>
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              সেরা গল্পের বই
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
              <a class="dropdown-item" href="#">সেরা রূপকথার গল্প</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">সেরা প্রোগ্রামিংয়ের বই</a>
              <a class="dropdown-item" href="#">বাছাইকৃত ১০০ বই</a>
            </div>
          </div>
        </div>
      </div>

      <app :books="books" class="book-row" name="b" style="bottom:50px; display:absolute;"></app>
    </li>
    <li class="baseli" id="_book_bookfinder" style="background: url('/storage/logos/fp_offers.jpg');height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">
      <div class="baseimage_title">
        <a   href="#">{{ __('পছন্দের বইয়ের খোঁজ') }}</a>
      </div>

      <div id="bookFinder">
        <book-finder>
        </book-finder>
      </div>
      <app :categories="categories" class="categories-grid" name="c"></app>
    </li>
    <li class="baseli" id="_book_paymentsystem" style="background: url('/storage/logos/fp_publishers.jpg');height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">
      <div class="baseimage_title">
        <a   href="#">{{ __('বিল পরিশোধ') }}</a>
      </div>
      <div id="easyPayment">

      </div>
    </li>
    <li class="baseli" id="_book_publisherchoice" style="background: url('/storage/logos/fp_contactus.jpg');height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">
      <div class="baseimage_title">
        <a href="#">{{ __('প্রকাশনা অধ্যায়') }}</a>
      </div>
    </li>
  </ul>
</div>
