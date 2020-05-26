@extends('layouts.app')

@section('meta')
{{-- <title>{{$page->meta_title}}</title>
<meta name="description" content="{{$page->meta_description}}" /> --}}
@endsection

@section('content')

<script>
	var animationTime_0 = 1500;
	var animationTime_1 = 2000;
	var animationTime_2 = 2500;
</script>

{{-- <div class="page {{$page->title}}"> --}}

<div class="page">
    <div class="bigtext__container">
		<div class="bigtext__text">
				A studio for <br> product design always <br>
				in search of a balance <br>
				within form, materiality<br>
				and colors to create<br>
				unexpected objects.
		</div>
		<div class="arrow-down"></div>
	</div>

	<div class="page__container">
		<div class="thumb thumb_0">
			<img src="{{ asset('images/first.jpg') }}" />
			<img src="{{ asset('images/second.jpg') }}" />
			<img src="{{ asset('images/third.jpg') }}" />
		</div>
		<div class="text">
			A studio for <br> product design always <br>
			in search of a balance <br>
			within form, materiality<br>
			and colors to create<br>
			unexpected objects.
		</div>
		<div class="thumb thumb_1">
			<img src="{{ asset('images/second.jpg') }}" />
			<img src="{{ asset('images/first.jpg') }}" />
			<img src="{{ asset('images/third.jpg') }}" />
		</div>
		<div class="thumb thumb_2">
			<img src="{{ asset('images/third.jpg') }}" />
			<img src="{{ asset('images/second.jpg') }}" />
			<img src="{{ asset('images/first.jpg') }}" />
		</div>
		<div class="buttons__overlay">
			<div class="thumb"></div>
			<div class="thumb"></div>
			<div class="thumb"></div>
		</div>
		
	</div>
</div>
@endsection
