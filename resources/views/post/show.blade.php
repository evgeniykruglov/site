@extends('layouts.app')

@section ('content')
<form action="{{url('/post')}}" method="post" enctype="multipart/form-data">
	<label for="place">Место съемки</label>
	<input type="text" class="form-contol" id="place" name="place">
		{{csrf_field}}
	<button type="submit" class="btn btn-primary">Сохранить</button>
</form> 
@endsection
