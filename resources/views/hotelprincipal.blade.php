@extends('layouts.app')
@section('content')
@foreach($hotel as $hotel)
 {{$hotel->id}} 
@endforeach
@endsection