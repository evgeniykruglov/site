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
					<div class="panel-heading"> № записи:{{$post->id}} </div>
						<div class="panel-body"> 
						<div><img src="{{$post->path}}"></div>
						Место съемки: {{$post->place}}
					</div>
					@if(auth()->id() == $post->user_id)
					<div align="right"> 	
						<a href ="{{route('post.edit', ['post' => $post]) }}" class="btn btn-warning">Изменить</a>
						<form action="{{route('post.destroy', ['post' => $post]) }}" method="post" >
						{{csrf_field() }}
						{{method_field('DELETE')}}
						<button type="submit" class="btn btn-danger">Удалить</button>
						</form>
					</div>
					@endif	
						<hr>						
					
				@endforeach
				
			</div>
		</div>
	</div>
</div>	
</div>
@endsection