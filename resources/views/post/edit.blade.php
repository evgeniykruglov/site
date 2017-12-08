@extends('layouts.app')

@section ('content')
<div class = "container">
<h2>Редактирование записи</h2>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default" align = "center">
			<form action="{{route('post.update', ['post' => $post]) }}" method="post" enctype="multipart/form-data">
				<label for="place">Место съемки</label>
				<input type="text" class="form-contol" id="place" name="place" value="{{$post->place}}">
				<div class = "form-group">
				<input type = "file" id ="photo" name = "photo" required> 
				{{csrf_field() }}
					{{method_field('PUT')}}
				</div>
				<button type="submit" class="btn btn-primary">Сохранить</button>
			</form> 
		</div>
	</div>
</div>
@endsection
