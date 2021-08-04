@include('layouts.head')

@include('inc.navbar')

<h2>{{$title}}</h2>

	@if(count($services) >0)
		<ul class="list group">
			@foreach($services as $service)
				<li class="active">{{$service}}</li>
			@endforeach
		</ul>
	@endif

