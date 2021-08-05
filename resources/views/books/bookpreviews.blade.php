<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

<div class="container">
    <div class="row">
        @foreach ($entries as $entry)
        <div class="col-md-3 col-sm-6">
                <div class="product-grid">
        @foreach ($form_fields as $key=>$field)
                    @if($key === 'book_cover')
                    <div class="product-image">
                        <a href="#">
                            <img class="pic-1" src="{{asset('/storage/bookcovers/'.$entry->$key)}}">
                            <img class="pic-2" src="{{asset('/storage/bookcovers/blankcover.png')}}">
                        </a>
                        <ul class="social">
                            <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                            <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                            <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                        <span class="product-new-label">Sale</span>
                        <span class="product-discount-label">20%</span>
                    </div>
                    @elseif($key ==='book_rating')
                    <ul class="rating">
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star disable"></li>
                    </ul>
                    @elseif($key === 'book_price')
                        <div class="price">{{ $entry->key }}
                        </div>
                    @elseif($key === 'book_title')
                    <div class="product-content">
                        <h3 class="title"><a href="#">{{$entry->$key}}</a></h3>
                    {{-- <a class="add-to-cart" href="">+ Add To Cart</a> --}}
                    </div>
                    @endif                
            @endforeach
            </div>
            </div>
        @endforeach
    </div>
</div>
<hr>