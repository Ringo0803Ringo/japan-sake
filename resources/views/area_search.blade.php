@extends('layouts.app')

@section('content')
@php
    dd($area->brands);
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">Top100銘柄</div>
                <div class="card-body">
                   
                    <h2>{{ $area->name }}の銘柄一覧</h2>
                    <ul>
                        @foreach ($area->brands as $brand)
                            <li>{{ $brand->name }}</li>
                        @endforeach
                    </ul>
                
                </div>
            </div>
        </div>
    </div>
</div>

@endsection