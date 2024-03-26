@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if($brand)
                    <h2 class="mt-3 mb-4">{{ $brand->name }}</h2>
                @else
                    <p>Brand not found.</p>
                @endif
                <p>{{ $brand->brewery->name }}</p>
                <p>{{ $brand->brewery->area->name }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
