@extends('layouts.app')
@section('content')
<div class = "container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@guest
			@else
			<p>
				<a href="{{url('/post/create}}" class="btn btn-primary">Загрузить фото</a>
			</p>
			@endguest
		<div class="panel panel-default">
		 	<div class="panel-heading">Лента</div>
			<div class="panel-body">
				@forelse($posts as $post)
				@if(auth()->id() === $post-user_id) 
					<a href="{{route('post.edit', ['post'=>$post]) }}" class = "btn btn-primary"> Изменить</a>
<form action="{{route('post.destroy', ['post' => $post] }}" method="POST">
{{method_field('DELETE')}}
{{csrf_field()}}
</form>

					
@endsection
