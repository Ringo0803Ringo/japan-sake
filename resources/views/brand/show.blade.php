@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header h4">{{ $brand->name }}</div>
                <div class="card-body">
                    <p>酒造：<a href="{{ route('brewery_search', ['breweryId' => $brand->brewery->id]) }}">{{ $brand->brewery->name }}</a></p>
                    <p>産地：<a href="{{ route('area_search', ['areaId' => $brand->brewery->area->id]) }}">{{ $brand->brewery->area->name }}</a></p>
                    @foreach ($brand->flavor_tags as $flavorTag)
                        @if($flavorTag->tag)
                        <p>風味：<a href="{{ route('flavor_search', ['flavorId' => $flavorTag->tag->id]) }}">{{ $flavorTag->tag->tag }}</a></p>
                        @else
                        <p>風味：情報なし</p>
                        @endif  
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-7">
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
        <div class="col-5">
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
                    <input type="hidden" name="brand_id" value="{{$brand->id}}">
                    <button type="submit" class="btn btn-primary btn-block mt-3 float-end">レビュー投稿</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
