@extends('layouts.app')

@section('pagecss')

<link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <h2 class="text-center font-color"><span class=" highlight">日々の晩酌に彩りを与えよう！</span></h2>
        <div class="col-md-12">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach (File::glob(public_path('images/*.png')) as $image)
                    <div class="swiper-slide">
                        <img src="{{ asset('images/' . basename($image)) }}" alt="Image Description">
                    </div>
                    @endforeach
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Navigation -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
        <div class="col-md-8 mt-5">
            <div class="card mt-3">
                <div class="card-header h4">銘柄検索</div>
                <div class="card-body">
                    <form action="{{ route('search') }}" method="GET">
                        <input type="text" name="keyword" placeholder="銘柄を入力してください" class="form-control">
                        <button class="btn btn-success float-end mt-1" type="submit">検索<i class="fa-solid fa-magnifying-glass ms-1"></i></button>
                    </form>
                </div>
            </div>

            <div class="card mt-3 bottom-space">
                <div class="card-header h4 d-flex align-items-center">
                    <span>銘柄一覧</span>
                    <form action="{{ route('order') }}" method="GET" class="d-flex align-items-center ms-4">
                        <select class="form-control-sm mt-1" name="sort" onchange="this.form.submit()">
                            <option value="">銘柄並べ替え</option>
                            <option value="name_asc">名前順（昇順）</option>
                            <option value="name_desc">名前順（降順）</option>
                            <!-- 他の並べ替え基準を追加 -->
                        </select>

                    </form>
                </div>
                <div class="card-body">
                    @foreach ($brands as $brand)
                    <li><a href="{{ route('brand.show', $brand->id) }}">{{ $brand->name }}</a></li>
                    @endforeach
                    <ul class="pagination pagination-sm mt-3">{{ $brands->appends(request()->query())->links() }}</ul>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-5 sidebar">
            <div class="card mt-3">
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
            <div class="card mt-3 mb-5">
                <div class="card-header h4">エリア別検索</div>
                <div class="card-body">
                    <form action="{{ route('search_area') }}" method="GET">
                        <select class="form-control" name="area_id">
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                            @endforeach
                        </select>
                        @if (!empty( $area->id ))
                        <button class="btn btn-success float-end mt-1" type="submit">検索<i class="fa-solid fa-magnifying-glass ms-1"></i></button>
                        @else
                        <a href="{{ route('area_search') }}" class="btn btn-success float-end mt-1">検索<i class="fa-solid fa-magnifying-glass ms-1"></i></a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/swiper.js') }}"></script>
@endsection