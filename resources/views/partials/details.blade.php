<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <a class="col col-xs-6 text-right" href="{{url($hrefLink)}}"> <button type="button" class="btn btn-sm btn-primary btn-create float-left">  {{__('Back')}} </button></a>
                  <a class="col col-xs-6 text-right" href="{{url( $hrefLink.'/'.$entry->id.'/edit')}}"> <button type="button" class="btn btn-sm btn-primary btn-create float-right">  {{__('Edit')}} </button></a>
                    @if($hrefLink === '/authors' )
                      {{ $entry['author_name'] }}
                    @elseif($hrefLink === '/books' )
                      {{ $entry['book_title'] }}
                    @elseif($hrefLink === '/buyers' )
                      {{ $entry['buyer_name'] }}
                    @elseif($hrefLink === '/categories' )
                      {{ $categories[$entry['category_title']] }}
                    @elseif($hrefLink === '/orders' )
                      {{ __('Order') }}
                    @elseif($hrefLink === '/publishers' )
                      {{ $entry['publisher_name'] }}
                    @elseif($hrefLink === '/reviewers' )
                      {{ $entry['reviewer_name'] }}
                    @elseif($hrefLink === '/users' )
                      {{ $entry['name'] }}
                    @endif
                </div>
                <div class="card-body">

                @foreach ($form_fields as $key=>$field)
                    <div class="form-group row">

                    <div class="col-md-4 col-form-label text-md-right font-weight-bold">
                      {{ $field }}
                    </div>
                    <div class="col-md-6 col-form-label text-justify">
                      @if($key === 'book_category' || $key === 'category_id')
                          <td class="hidden-xs"><a href="{{ url('/categories',$entry->$key) }}">{{ $category_list[$entry->$key] }}</a></td>
                      @elseif($key === 'category_class')
                        <td class="hidden-xs">{{ $classes[$entry->$key] }}</td>
                      @elseif($key === 'category_year')
                        <td class="hidden-xs">{{ $years[$entry->$key] }}</td>
                      @elseif($key === 'category_semester')
                        <td class="hidden-xs">{{ $semesters[$entry->$key] }}</td>
                      @elseif($key === 'category_part')
                        <td class="hidden-xs">{{ $parts[$entry->$key] }}</td>
                      @elseif($key === 'category_session')
                        <td class="hidden-xs">{{ $sessions[$entry->$key] }}</td>
                      @elseif($key === 'category_favorite')
                        <td class="hidden-xs">{{ $favorites[$entry->$key] }}</td>
                      @elseif($key === 'category_relation')
                        <td class="hidden-xs">{{ $relations[$entry->$key] }}</td>
                      @elseif($key === 'book_publisher'||$key === 'publisher_id')
                        <td class="hidden-xs"><a href="{{ url('/publishers',$entry->$key) }}">{{ $publisher_list[$entry->$key] }}</a></td>
                      @elseif($key === 'book_cover')
                          @if($entry->$key!=null)
                            <td class="hidden-xs"><img src="{{asset('/storage/bookcovers/'.$entry->$key)}}" height="300px" width="200px" /></td>
                          @else
                            <td class="hidden-xs"><img src="{{asset('/storage/bookcovers/blankcover.png')}}" height="300px" width="200px" /></td>
                          @endif
                      @elseif($key === 'author_list')
                        <td class="hidden-xs">
                          @foreach ($entry->authors as $author)
                            <li style="list-style:none; white-space:nowrap;"> <a href="{{  url('/authors', $author->id) }}">{{$author->author_name}}</a></li>
                          @endforeach
                        </td>
                      @elseif($key === 'author_image')
                          @if($entry->$key!=null)
                            <td class="hidden-xs"><img src="{{asset('/storage/authors/'.$entry->$key)}}" height="300px" width="300px" /></td>
                          @else
                            <td class="hidden-xs"><img src="{{asset('/storage/authors/blankauthor.png')}}" height="300px" width="300px" /></td>
                          @endif
                      @elseif($key === 'publisher_image')
                          @if($entry->$key!=null)
                            <td class="hidden-xs"><img src="{{asset('/storage/publishers/'.$entry->$key)}}" height="300px" width="300px" /></td>
                          @else
                            <td class="hidden-xs"><img src="{{asset('/storage/publishers/blankpublisher.png')}}" height="300px" width="300px" /></td>
                          @endif
                        @else
                      <td> {{ $entry->$key }}</td>
                      @endif
                    </div>
                    </div>
                @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
