@extends('layouts.app')
@section('content')
@foreach($flight as $vuelo)
 {{$vuelo->id}} 
@endforeach
@endsection