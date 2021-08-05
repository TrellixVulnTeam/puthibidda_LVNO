<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">

          @if($headerTitle === 'Update ')
          <a class="col col-xs-6 text-right" href="{{url($hrefLink,$entry->id)}}"> <button type="button" class="btn btn-sm btn-primary btn-create float-left">  {{ __('Cancel') }} </button></a>
          {!! Form::submit($headerTitle , ['class' => 'btn btn-sm btn-primary btn-danger float-right']) !!}
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
          @else
          <a class="col col-xs-6 text-right" href="{{url($hrefLink)}}"> <button type="button" class="btn btn-sm btn-primary btn-create float-left">  {{ __('Cancel') }} </button></a>
          {!! Form::submit($headerTitle , ['class' => 'btn btn-sm btn-primary btn-danger float-right']) !!}
          {{ __($headerTitle.$submitButton) }}
          @endif
        </div>

        <div class="card-body">
          @foreach ($form_fields as $key=>$fields)
          <div class="form-group row">
            {!! Form::label('name', $fields,['class' => 'col-md-4 col-form-label text-md-right font-weight-bold']) !!}
            @if($key === 'password'|| $key === 'password_confirmation')
            <div class="col-md-6">
              {!! Form::password($key, ['class' => 'form-control awesome']); !!}
            </div>
            @elseif($key === 'author_email'||$key === 'buyer_email'||$key === 'publisher_email'||$key === 'reviewer_email'||$key === 'email')
            <div class="col-md-6">
              {!! Form::email($key, null, ['class' => 'form-control awesome']); !!}
            </div>
            @elseif($key === 'book_published_date'|| $key === 'order_start_at' || $key === 'order_end_at' )
            <div class="col-md-6">
              {!! Form::date($key, \Carbon\Carbon::now()) !!}
            </div>
            @elseif($key === 'book_stock' )
            <div class="col-md-6">
              {!! Form::selectRange($key,0,500) !!}
            </div>
            @elseif($key === 'category_id')
            <div class="col-md-6">
              {!! Form::select($key, $category_list, null, ['id'=>$key,'class'=>'form-control','single']) !!}
            </div>
            @elseif($key === 'publisher_id')
            <div class="col-md-6">
              {!! Form::select($key, $publisher_list, null, ['id'=>'publisher_id','class'=>'form-control','single']) !!}
            </div>
            @elseif($key === 'book_country'|| $key === 'author_country')
            <div class="col-md-6">
              {!! Form::select($key, $country, null, ['id'=>'book_country','class'=>'form-control','single']) !!}
            </div>
            @elseif($key === 'book_lang')
            <div class="col-md-6">
              {!! Form::select($key, $language, null, ['id'=>'book_language','class'=>'form-control','single']) !!}
            </div>
            @elseif($key === 'category_title')
            <div class="col-md-6">
              {!! Form::select($key, $categories, null, ['id'=>'category_title','class'=>'form-control','single']) !!}
            </div>
            @elseif($key === 'category_class')
            <div class="col-md-6">
              {!! Form::select($key, $classes, null, ['id'=>'category_class','class'=>'form-control','single']) !!}
            </div>
            @elseif($key === 'category_year')
            <div class="col-md-6">
              {!! Form::select($key, $years, null, ['id'=>'category_year','class'=>'form-control','single']) !!}
            </div>
            @elseif($key === 'category_semester')
            <div class="col-md-6">
              {!! Form::select($key, $semesters, null, ['id'=>'category_semester','class'=>'form-control','single']) !!}
            </div>
            @elseif($key === 'category_part')
            <div class="col-md-6">
              {!! Form::select($key, $parts, null, ['id'=>'category_part','class'=>'form-control','single']) !!}
            </div>
            @elseif($key === 'category_session')
            <div class="col-md-6">
              {!! Form::select($key, $sessions, null, ['id'=>'category_session','class'=>'form-control','single']) !!}
            </div>
            @elseif($key === 'category_favorite')
            <div class="col-md-6">
              {!! Form::select($key, $favorites, null, ['id'=>'category_favorite','class'=>'form-control','single']) !!}
            </div>
            @elseif($key === 'category_relation')
            <div class="col-md-6">
              {!! Form::select($key, $relations, null, ['id'=>'category_relation','class'=>'form-control','single']) !!}
            </div>
            @elseif($key === 'publisher_ranking'|| $key == 'book_ranking')
            <div class="col-md-6">
              {!! Form::select($key, $ranks, null, ['id'=>$key,'class'=>'form-control','single']) !!}
            </div>
            @elseif($key === 'author_image'||$key === 'publisher_image')
            <div class="col-md-6">
              {{ Form::file('image',['accept'=>'image/x-png,image/jpeg','class'=>'form-control btn btn-sm btn-white float-right']) }}
            </div>
            @elseif($key === 'book_cover')
            <div class="col-md-6">
              <div><span> Base Image: </span>{{ Form::file('image',['accept'=>'image/x-png,image/jpeg','class'=>'form-control btn btn-sm btn-white float-right']) }}</div>
              <div><span> Back Image: </span>{{ Form::file('image_back',['accept'=>'image/x-png,image/jpeg','class'=>'form-control btn btn-sm btn-white float-right']) }}</div>
              <div><span> 3D Image: </span>{{ Form::file('image_3d',['accept'=>'image/x-png,image/jpeg','class'=>'form-control btn btn-sm btn-white float-right']) }}</div>
              <div><span> Info Image: </span>{{ Form::file('image_info',['accept'=>'image/x-png,image/jpeg','class'=>'form-control btn btn-sm btn-white float-right']) }}</div>
              <div><span> Thamil Image: </span>{{ Form::file('image_thamil',['accept'=>'image/x-png,image/jpeg','class'=>'form-control btn btn-sm btn-white float-right']) }}</div>
            </div>
          @elseif($key === 'author_list')
              <div class="col-md-6">
                {!! Form::select('authors[]', $author_list, null, ['id'=>$key,'class'=>'form-control','multiple']) !!}
              </div>
            @else
            <div class="col-md-6">
              {!! Form::text($key, null, ['class'=> 'form-control awesome']) !!}
            </div>
            @endif
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
