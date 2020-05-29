@extends('layouts.app')

@section('meta')
<title>{{$page->meta_title}}</title>
<meta name="description" content="{{$page->meta_description}}" />
@endsection

@section('content')

<script>
	var animationTime_0 = 1500;
	var animationTime_1 = 2000;
	var animationTime_2 = 2500;
</script>


<div class="page">
    <div class="bigtext__container">
		<div class="bigtext__text">
			{!! $page->content !!}
		</div>
		<div class="arrow-down"></div>
	</div>

	<div class="page__container">
		<div class="thumb thumb_0">
			@foreach ($page->projects[0]->images as $image)
				<img src="{{ asset($image->uri) }}" />
			@endforeach
		</div>
		<div class="text">
			{!! $page->content !!}
		</div>
		<div class="thumb thumb_1">
			@foreach ($page->projects[1]->images as $image)
				<img src="{{ asset($image->uri) }}" />
			@endforeach
		</div>
		<div class="logo-trio">
			<div class="image"></div>
		</div>
		<div class="thumb thumb_2">
			@foreach ($page->projects[2]->images as $image)
				<img src="{{ asset($image->uri) }}" />
			@endforeach
		</div>
		<div class="buttons__overlay">
			<div class="thumb"></div>
			<div class="thumb"></div>
			<div class="thumb"></div>
		</div>
		
	</div>
</div>
@endsection
