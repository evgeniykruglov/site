@extends('layouts.app')

@section('content')
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