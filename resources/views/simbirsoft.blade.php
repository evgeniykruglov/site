<!-- <?php
echo "<h2>Fibonacci</h2>";
echo($array);
?> 
@yield ('title') -->


@extends('app')

@section('title') Fibonacci series @endsection

@section ('body')
{{$array}}
@endsection



