@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header h4"><a href="{{ route('brand.show', $review->brand->id) }}">{{ $review->brand->name }}</a></div>
                <div class="card-body">
                    <label>{{$review->user->name}} {{$review->created_at->toDateString()}}</label>
                    <br>
                    @for ($i = 0; $i < $review->star; $i++)
                    ★
                    @endfor
                    <p>{{$review->content}}</p>
                    <form action="{{ route('review_destroy', $review->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block mt-3 float-end" onclick='return confirm("本当に削除しますか？")'>レビュー削除</button>
                    </form>               
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
