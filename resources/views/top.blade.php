@extends('layouts.app')

@section('content')

@foreach ($areas["areas"] as $area)
    <li>{{ $area["name"] }}</li>
    
@endforeach

@endsection