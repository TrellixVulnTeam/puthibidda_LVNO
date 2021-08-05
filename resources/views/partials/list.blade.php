<style type="text/css">
.panel-table .panel-body{
  padding:0;
  width: 100%;
}

.panel-table .panel-body .table-bordered{
  border-style: none;
  margin:0;
}

.panel-table .panel-body .table-bordered > thead > tr > th:first-of-type {
  text-align:center;
  width: 100px;
}

.panel-table .panel-body .table-bordered > thead > tr > th:last-of-type,
.panel-table .panel-body .table-bordered > tbody > tr > td:last-of-type {
  border-right: 0px;
}

.panel-table .panel-body .table-bordered > thead > tr > th:first-of-type,
.panel-table .panel-body .table-bordered > tbody > tr > td:first-of-type {
  border-left: 0px;
}

.panel-table .panel-body .table-bordered > tbody > tr:first-of-type > td{
  border-bottom: 0px;
}

.panel-table .panel-body .table-bordered > thead > tr:first-of-type > th{
  border-top: 0px;
}

.panel-table .panel-footer .pagination{
  margin:0;
}

/*
used to vertically center elements, may need modification if you're not using default sizes.
*/
.panel-table .panel-footer .col{
  line-height: 34px;
  height: 34px;
}

.panel-table .panel-heading .col h3{
  line-height: 30px;
  height: 30px;
}

.panel-table .panel-body .table-bordered > tbody > tr > td{
  line-height: 34px;
}


</style>
{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
--}}
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12 col-md-offset-1">
      <div class="card">
        <div class="card-header">{{ $headerTitle }}
          <a class="col col-xs-6 text-right" href="{{url( $hrefLink.'/create')}}"> <button type="button" class="btn btn-sm btn-primary btn-create">  {{'Create New'}} </button></a>
        </div>

        <div class="card-body">
          <?php $countRow =1; ?>
          <table class="table table-striped table-bordered table-list">
            <thead>
              <tr>
                {{-- <th><em class="fa fa-cog"></em></th> --}}
                <th class="hidden-xs">SL</th>
                @foreach ($form_fields as $key=>$field)
                  <th> {{ $field }} </th>
                @endforeach
              </tr>
            </thead>
            <tbody>
              @foreach ($entries as $entry)
                <tr>
                  <td> {{ $countRow }} </td>
                  @foreach ($form_fields as $key=>$field)
                    @if($key === 'category_id')
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
                    @elseif($key === 'publisher_id')
                      <td class="hidden-xs"><a href="{{ url('/publishers',$entry->$key) }}">{{ $publisher_list[$entry->$key] }}</a></td>
                    @elseif($key === 'category_title')
                      <td class="hidden-xs"><a href="{{  url($hrefLink,$entry->id) }}">{{ $categories[$entry->$key] }}</a></td>
                    @elseif($key === 'book_title' ||$key === 'author_name' || $key === 'publisher_name' || $key === 'reviewer_name'||$key === 'buyer_name' || $key === 'name')
                      <td class="hidden-xs"><a href="{{ url($hrefLink,$entry->id) }}">{{ $entry->$key }}</a></td>
                    @elseif($key === 'book_cover')
                      @if($entry->$key!=null)
                        <td class="hidden-xs"><img src="{{asset('/storage/bookcovers/'.$entry->$key)}}" height="100px" width="67px" /></td>
                      @else
                        <td class="hidden-xs"><img src="{{asset('/storage/bookcovers/blankcover.png')}}" height="100px" width="67px" /></td>
                      @endif
                    @elseif($key === 'author_list')
                      @unless ($entry->authors->isEmpty())
                        <td class="hidden-xs">
                          @foreach ($entry->authors as $author)
                            <li style="list-style:none; white-space:nowrap;"> <a href="{{  url('/authors', $author->id) }}">{{$author->author_name}}</a></li>
                          @endforeach
                        </td>
                      @endunless
                    @elseif($key === 'author_image')
                      @if($entry->$key!=null)
                        <td class="hidden-xs"><img src="{{asset('/storage/authors/'.$entry->$key)}}" height="100px" width="100px" /></td>
                      @else
                        <td class="hidden-xs"><img src="{{asset('/storage/authors/blankauthor.png')}}" height="100px" width="100px" /></td>
                      @endif
                    @elseif($key === 'publisher_image')
                      @if($entry->$key!=null)
                        <td class="hidden-xs"><img src="{{asset('/storage/publishers/'.$entry->$key)}}" height="100px" width="100px" /></td>
                      @else
                        <td class="hidden-xs"><img src="{{asset('/storage/publishers/blankpublisher.png')}}" height="100px" width="100px" /></td>
                      @endif
                    @else
                      <td> {{ $entry->$key }}</td>
                    @endif

                  @endforeach
                </tr>
                <?php $countRow = $countRow + 1; ?>
              @endforeach
            </tbody>
          </table>

        </div>
      </div></div></div>
