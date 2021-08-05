@extends('layouts.app')

@section('content')
@if ($agent -> isMobile())
<div class="grid-container">
	@if($subject == 'science')
	<div class="item1 bg-white"><a href="{{ url('/mbooks/hsc/science') }}" >{{ __('বিজ্ঞান বিভাগ') }}</a></div>
	@elseif($subject == 'humanities')
	<div class="item1"><a href="{{ url('/mbooks/hsc/humanities') }}">{{ __('মানবিক বিভাগ') }}</a></div>
	@elseif($subject == 'business')
	<div class="item1"><a href="{{ url('/mbooks/hsc/business') }}">{{ __('ব্যবসায় শিক্ষা') }}</a></div>
	@else
	<p> Page Not Found </p>
	@endif
	<div class="item2"> <a  href="{{ url('/') }}">{{ __('মুল পাতা') }}</a></div>  
	<div class="item8"> 
		@for ($i=1;$i<=7;$i++)
		<div class="card flex-row bg-secondary text-white flex-wrap">
			<div class="card-header border-0" style="margin-top: 5px;margin-bottom:5px;padding: 0" >
				<img class="img-thumbnail" style="width: 100px" src="{{ asset('/storage/images/hsc/'.$subject.'/'.$i.'.png')}}" alt="Card image cap">
			</div>
			<div style="width: 70%; margin: 0; padding: 0" class="card-block px-2">
				<p class="card-title">{{ $titles[$i] }}</p>
				<a href="tel:+8801643299889" style="margin-left: 10px;"><img style="width: 48px; height:48px" src="{{ asset('/storage/images/hsc/call.png')}}" ></a>
				<a href="sms:+8801726417564,+8801643299889?body=Hi, I'm Interested to Buy Books from Puthibidda."><img style="width: 48px; height:48px" src="{{ asset('/storage/images/hsc/sms.png')}}" ></a>
				<a href="mailto:order@puthibidda.com?subject=Important!&body=Hi, I'm Interested to Buy Books from Puthibidda."><img style="width: 48px; height:48px" src="{{ asset('/storage/images/hsc/mail.png')}}" ></a>
			</div>	
		</div>
		<div style="display: block;margin: 4px 0;"></div>
		@endfor


	</div>
</div>
@endif
@stop
