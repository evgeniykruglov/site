@extends('layouts.app')

@section ('content')
<div class = "container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default" align = "center">
			<form action="{{url('/post')}}" method="post" enctype="multipart/form-data">
				<label for="place">Место съемки</label>
				<input type="text" class="form-contol" id="place" name="place">
				{{csrf_field() }}
				<div class = "form-group">
				<input type = "file" id ="photo" name = "photo" required> 
				</div>
				<button type="submit" class="btn btn-primary">Сохранить</button>
			</form> 
		</div>
	</div>
</div>
@endsection
