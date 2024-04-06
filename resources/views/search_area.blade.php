@extends('layouts.app')

@section('content')
{{-- @php
    dd($area);
@endphp --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">{{ $area->name }}の銘柄一覧</div>
                <div class="card-body">
                    <ul>
                        @foreach ($area->brands as $brand)
                            <li><a href="{{ route('brand.show', $brand->id) }}">{{ $brand->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection