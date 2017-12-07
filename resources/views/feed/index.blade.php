@extends('layouts.app')

@section('content')
@guest
@else
<p align = "center">
	<a href ="{{url('post/create')}}" class="btn btn-primary">Загрузить фото </a>
</p>
@endguest
<div class = "container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
		 	<div class="panel-heading">Лента</div>
			<div class="panel-body">
				@foreach($posts as $post)
					@if(auth()->id() == $post->user_id)
					<div class="panel-heading"> № записи:{{$post->id}} </div>
						<div class="panel-body"> 
						<!--<img src="http://ostap73.ru/old/images/Ricar.png">-->
						<div><img src="{{$post->path}}"></div>
						Место съемки: {{$post->place}}
						</div>
						<hr>						
					@endif
				@endforeach
				
			</div>
		</div>
	</div>
</div>	
</div>
@endsection