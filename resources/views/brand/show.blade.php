@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header h4">{{ $brand->name }}</div>
                <div class="card-body">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach ($photos as $photo)
                            <div class="swiper-slide">
                                <img src="data:image/jpeg;base64,{{ $photo->filename }}" alt="Uploaded Image" class="responsive">
                            </div>
                            @endforeach
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                        <!-- Add Navigation -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>

                    <p class="mt-3">酒造：<a href="{{ route('brewery_search', ['breweryId' => $brand->brewery->id]) }}">{{ $brand->brewery->name }}</a></p>
                    <p>産地：<a href="{{ route('area_search', ['areaId' => $brand->brewery->area->id]) }}">{{ $brand->brewery->area->name }}</a></p>
                    @foreach($brand->flavor_tags as $flavorTag)
                        @if($flavorTag->tag)
                        <p>風味：<a href="{{ route('flavor_search', ['flavorId' => $flavorTag->tag->id]) }}">{{ $flavorTag->tag->tag }}</a></p>
                        @else
                        <p>風味：情報なし</p>
                        @endif  
                    @endforeach

                    @if(Auth::check() && empty(Auth::user()->favorites()->where('brand_id', $brand->id)->first()))

                    <form action="{{ route('favorite', $brand->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="brand_id" value="{{ $brand->id }}">
                        <button type="submit" class="btn mt-4 float-end" style="background-color: rgb(255, 0, 162); color: white;">お気に入り登録<i class="fa-solid fa-heart ms-1"></i></button>
                    </form>                
                    @elseif(Auth::check())
                    <form action="{{ route('favorite_destroy', $brand->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="brand_id" value="{{ $brand->id }}">
                        <button type="submit" class="btn mt-4 float-end" style="background-color: rgb(0, 200, 255); color: white;">お気に入り解除<i class="fa-solid fa-heart ms-1"></i></button>
                    </form>  
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-7">
            <div class="card mt-4"">
                <div class="card-header text-center h4">レビュー最新一覧</div>
                <div class="card-body">
                    @foreach($reviews as $review)
                        <label>{{$review->user->name}} {{$review->created_at->toDateString()}}</label>
                        <br>
                        @for ($i = 0; $i < $review->star; $i++)
                        ★
                        @endfor
                        <p>{{$review->content}}</p>
                    @endforeach 
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <form action="{{ route('review_store', $brand->id) }}" method="POST">
                @csrf
                <div class="card mt-4">
                    <div class="card-header text-center h4">レビュー投稿</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="rating" class="h4 mt-4">評価（星）</label>
                            <select class="form-control" id="rating" name="star">
                                <option value="5" class="review-score-color">★★★★★</option>
                                <option value="4" class="review-score-color">★★★★</option>
                                <option value="3" class="review-score-color">★★★</option>
                                <option value="2" class="review-score-color">★★</option>
                                <option value="1" class="review-score-color">★</option>
                            </select>
                        </div>
                        <h4 class="mt-4">レビュー内容</h4>
                        @error('content')
                            <strong class="text-danger">レビュー内容を入力してください</strong>
                        @enderror
                        <textarea name="content" class="form-control"></textarea>
                        <input type="hidden" name="brand_id" value="{{ $brand->id }}">
                        <button type="submit" class="btn btn-primary btn-block mt-3 float-end">レビュー投稿</button>
                    </div>
                </div>
            </form>

            <form action="{{ route('photo_store', $brand->id) }}" method="POST" enctype="multipart/form-data" class="post_form">
                @csrf
                <div class="card mt-4 mb-5">
                    <div class="card-header text-center h4">画像投稿</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="image">画像ファイル:<span class="ms-4">ドラッグ&ドロップできます</span></label>
                            <input type="file" name="image" id="image" class="form-control" required>
                            <input type="hidden" name="brand_id" value="{{ $brand->id }}">
                        </div>
                        <p class="mt-2 small">※.jpeg、.png、.jpg、.gif、.svgのファイルにしてください</p>
                        <button type="submit" class="btn btn-primary btn-block mt-3 float-end">アップロード</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var mySwiper = new Swiper('.swiper-container', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 500,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    });
</script>
@endsection
