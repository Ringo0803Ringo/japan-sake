@extends('layouts.app')

@section('pagecss')

<link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endsection

@section('content')
{{-- @php
    dd($areas);
@endphp --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">銘柄検索</div>
                <div class="card-body">
                    <form action="{{ route('search') }}" method="GET">
                        <input type="text" name="keyword" placeholder="銘柄を検索">
                        <button class="btn btn-success btn-sm" type="submit">検索<i class="fa-solid fa-magnifying-glass ms-1"></i></button>
                    </form>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">エリア別検索</div>
                <div class="card-body">
                    <form action="{{ route('area_search') }}" method="GET">
                        <select name="area_id">
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit">検索</button>
                    </form>
                </div>
            </div>

            <a href="{{ route('ranking') }}" class="btn btn-primary mt-3">Top100銘柄</a>

            <div class="card mt-3">
                <div class="card-header">銘柄一覧</div>
                <div class="card-body">
                    @foreach ($brands as $brand)
                    <li><a href="{{ route('brand.show', $brand->id) }}">{{ $brand->name }}</a></li>
                    @endforeach
                    <ul class="pagination pagination-sm mt-3">{{ $brands->links() }}</ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
