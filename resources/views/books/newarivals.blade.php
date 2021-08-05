@extends('layouts.app')
@section('content')
    <section class="testimonials" id="gobottom">
        <div class="container">
                <h5 class="section-title h1">New Arivals</h5>
{{--               <div class="d-flex justify-content-center float-left">
                <div class="searchbar">
                  <input class="search_input" type="text" name="" placeholder="Search...">
                  <a href="#" class="search_icon"></a>
                </div>
              </div> --}}
        <div class="row">
           @foreach ($entries as $entry)

            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                                <div class="card product-grid8 product-grid">
                                    <div class="card-body text-center product-image8 product-image">
                        @foreach ($form_fields as $key=>$field)
                                @if($key === 'book_cover')
                                    @if($entry->$key === '')
                                        <p><img class="img-fluid" src="{{asset('/storage/bookcovers/blankcover.png')}}" alt="card image"></p>
                                    @else
                                        <p><img class="img-fluid" src="{{asset('/storage/bookcovers/'.$entry->$key)}}" alt="card image"></p>
                                    @endif

                                @elseif($key === 'book_title')
                                    <h4 class="card-title"> {{ $entry->$key }}</h4>
                                @elseif($key === 'book_publisher')
                                        <p class="card-text"> {{ $publisher_list[$entry->$key] }}</p>
                                @elseif($key === 'book_offer_rate')
                                    <span class="product-discount-label">{{ $entry->$key }}%</span>
                                @endif
                            @endforeach
                            <span class="product-new-label">New</span>
                        </div>
                      </div>
                    </div>
                            <div class="backside">
                                <div class="card product-grid5">
                                    <div class="card-body text-center mt-4 product-image5 ">
                                        @foreach ($form_fields as $key=>$field)
                                            @if($key === 'book_title')
                                            <h4 class="card-title"> {{ $entry->$key }}</h4>
                                            <p class="card-text"> {{ $entry->book_description }}</p>
                                           @elseif($key != 'book_cover' && $key != 'book_description')
                                                       <p class="card-text"> {{ $entry->$key }}</p>
                                            @endif
                                        @endforeach
                                         <ul class="social">
                                            <li><a data-toggle="modal" data-target="#bookdetail" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                                            <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                            <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
          @endforeach
        </div>
        </div>
    </section>
@stop
