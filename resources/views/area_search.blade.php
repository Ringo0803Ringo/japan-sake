@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">エリア別検索結果</div>
                <div class="card-body">
                    {{-- @if(isset($area)) --}}
                    <h2>{{ $area->name }}の銘柄一覧</h2>
                    <ul>
                        @foreach ($area->brands as $brand)
                            <li>{{ $brand->name }}</li>
                        @endforeach
                    </ul>
                    {{-- @else
                    <p>$areaがない</p>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection