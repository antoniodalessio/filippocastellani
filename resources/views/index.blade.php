@extends('layouts.app')

@section('meta')
<title>{{$page->meta_title}}</title>
<meta name="description" content="{{$page->meta_description}}" />
@endsection

@section('content')

<script>
	var animationTime_0 = <?=$page->projects[0]->transition_time?>;
	var animationTime_1 = <?=$page->projects[1]->transition_time?>;
	var animationTime_2 = <?=$page->projects[2]->transition_time?>;
</script>


<style>
	.thumb_0.progress:before {
		animation: scale-x-zero-to-max <?=$page->projects[0]->transition_time?>ms linear;
		//animation: scale-x-zero-to-max <?=(intval($page->projects[0]->transition_time) * count($page->projects[0]->images)) + (500 * (count($page->projects[0]->images) - 1))?>ms linear;
	}
	.thumb_1.progress:before {
		animation: scale-x-zero-to-max <?=$page->projects[1]->transition_time?>ms linear;
		//animation: scale-x-zero-to-max <?=(intval($page->projects[1]->transition_time) * count($page->projects[1]->images)) + (500 * (count($page->projects[1]->images) - 1))?>ms linear;
	}
	.thumb_2.progress:before {
		animation: scale-x-zero-to-max <?=$page->projects[2]->transition_time?>ms linear;
		//animation: scale-x-zero-to-max <?=(intval($page->projects[2]->transition_time) * count($page->projects[2]->images)) + (500 * (count($page->projects[2]->images) - 1))?>ms linear;
	}
</style>

<div class="site-loader">
	<div class="loader">
	</div>
</div>

<div class="page">
    <div class="bigtext__container">
		<div class="bigtext__text">
			{!! $page->content !!}
		</div>
		<div class="arrow-down"></div>
	</div>

	<div class="page__container">
		<div class="thumb thumb_0 thumb-image">
			@foreach ($page->projects[0]->images as $image)
				<img src="{{ asset($image->uri) }}" />
			@endforeach
		</div>
		<div class="text">
			{!! $page->content !!}
		</div>
		<div class="thumb thumb_1 thumb-image">
			@foreach ($page->projects[1]->images as $image)
				<img src="{{ asset($image->uri) }}" />
			@endforeach
		</div>
		<div class="logo-trio">
			<div class="image"></div>
		</div>
		<div class="thumb thumb_2 thumb-image">
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
