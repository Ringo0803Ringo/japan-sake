@extends('layouts.app')

@section('pagecss')

<link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <h2 class="text-center font-color"><span class=" highlight">日々の晩酌に彩りを与えよう！</span></h2>
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header h4">銘柄検索</div>
                <div class="card-body">
                    <form action="{{ route('search') }}" method="GET">
                        <input type="text" name="keyword" placeholder="銘柄を入力してください" class="form-control">
                        <button class="btn btn-success float-end mt-1" type="submit">検索<i class="fa-solid fa-magnifying-glass ms-1"></i></button>
                    </form>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header h4">エリア別検索</div>
                <div class="card-body">
                    <form action="{{ route('search_area') }}" method="GET">
                        <select class="form-control" name="area_id">
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-success float-end mt-1" type="submit">検索<i class="fa-solid fa-magnifying-glass ms-1"></i></button>
                    </form>
                </div>
            </div>

            <div class="card mt-3 bottom-space">
                <div class="card-header h4">銘柄一覧</div>
                <div class="card-body">
                    @foreach ($brands as $brand)
                    <li><a href="{{ route('brand.show', $brand->id) }}">{{ $brand->name }}</a></li>
                    @endforeach
                    <ul class="pagination pagination-sm mt-3">{{ $brands->links() }}</ul>
                </div>
            </div>
        </div>

        <div class="col-md-4 sidebar">
            <div class="card mt-3 bottom-space ">
                <div class="card-header h5">銘柄ランキング</div>
                <div class="card-body">
                    @foreach ($rankings as $ranking)
                    @if ($ranking->id >= 1 && $ranking->id <= 10)
                        <p>{{ $ranking->rank }}位: <a href="{{ route('brand.show', $ranking->brand->id) }}">{{ $ranking->brand->name }}</a> (スコア: {{ round($ranking->score, 2) }})</p>
                    @endif
                    @endforeach
                    <a href="{{ route('ranking') }}" class="btn btn-primary mt-3 h4">11位以下も表示</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
