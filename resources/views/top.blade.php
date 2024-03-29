@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">銘柄検索</div>
                <div class="card-body">
                    <form action="/search" method="GET">
                        <input type="text" name="keyword" placeholder="銘柄を検索">
                        <span class="input-group-btn">
                            <button class="btn btn-success btn-sm" type="submit">検索<i class="fa-solid fa-magnifying-glass ms-1"></i></button>
                        </span>
                    </form>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">銘柄一覧</div>
                <div class="card-body">
                    @foreach ($brands["brands"] as $brand)
                    <li><a href="{{ route('brand.show', $brand["id"]) }}">{{ $brand["name"] }}</li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
