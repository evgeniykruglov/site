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
			@foreach($posts as $post)
				<div class="panel-body">
					<div class="panel-heading"> № записи:{{$post->id}} 
						<div>Место съемки: {{$post->place}} </div>
						<div>Автор: {{$post->user_id}} </div>
						<div> 
						<div style="margin-bottom: 10px;"><img width="100%" src="{{$post->path}}"></div>
					@if(auth()->id() == $post->user_id)	
						<div class = "col-xs-6">
							<a href ="{{route('post.edit', ['post' => $post]) }}" class="btn btn-warning">Изменить</a>
						</div>
						<div class = "col-xs-6" align="right">
							<form action="{{route('post.destroy', ['post' => $post]) }}" method="post" >
							{{csrf_field() }}
							{{method_field('DELETE')}}
							<button type="submit" class="btn btn-danger">Удалить</button>
							</form>
						</div>
					@endif
						</div>
					</div>					
					<div>
						<strong>Комментарии:</strong>
						@forelse ($post->comments as $comments)
							<div>{{$comments->created_at}}-{{$comments->text}}</div>
						@empty
							<div>Нет комментариев</div>
						@endforelse
					</div>
					<div>
						@guest
						@else
						<blockquote>
						<form action="{{url('/comment')}}" method="post" >
							<label for="text">Новый комментарий</label>
							<input type="text" class="form-contol" id="text" name="text" required>
							<input type="hidden" name="post_id" value="{{$post->id}}">
							{{csrf_field() }}
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Опубликовать</button>
							</div> 
						</form>
						</blockquote>
						@endguest
					</div>
				</div>
				<hr>						
			@endforeach				
		</div>
		</div>
	</div>
</div>	
</div>
@endsection