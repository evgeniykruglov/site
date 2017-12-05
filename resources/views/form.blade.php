@extends('app')
@section('title') Fibonacci series @endsection

@section ('body')
<form action="/simbirsoft" method="POST">
    <label>Количество</label>
    <input type="text" name="count">
  </p>

  <p>
    <input type="submit" value="Рассчитать" />
  </p>
    {{ csrf_field() }} 
</form>
<?php //print_r ($_POST); ?>
@endsection


